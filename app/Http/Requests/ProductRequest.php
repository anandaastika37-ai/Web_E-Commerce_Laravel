<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        $store = $this->user()?->store;
        $product = $this->route('product');

        return $store !== null && ($product === null || $product->store_id === $store->id);
    }

    protected function prepareForValidation(): void
    {
        $variants = collect($this->input('variants', []))
            ->map(function ($variant) {
                if (is_array($variant) && isset($variant['sku'])) {
                    $variant['sku'] = strtoupper($variant['sku']);
                }
                return $variant;
            })
            ->all();

        $this->merge([
            'sku'      => strtoupper((string) $this->input('sku')),
            'variants' => $variants,
        ]);
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $combos = collect($this->input('variants', []))
                ->filter(fn($v) => is_array($v))
                ->map(fn($v) => mb_strtolower(trim($v['color'] ?? '')) . '|' . mb_strtolower(trim($v['size'] ?? '')));

            if ($combos->count() !== $combos->unique()->count()) {
                $validator->errors()->add('variants', 'Ada kombinasi warna dan ukuran yang sama lebih dari sekali.');
            }
        });
    }

    public function rules(): array
    {
        $product = $this->route('product');
        return [
            'name'           => ['required', 'string', 'max:255'],
            'sku'            => ['required', 'string', 'max:50', Rule::unique('products', 'sku')->ignore($product?->id)],
            'category_id'    => ['required', 'exists:categories,id'],
            'description'    => ['nullable', 'string', 'max:1000'],
            'gender'         => ['required', Rule::in(['pria', 'wanita', 'unisex', 'anak'])],
            'material'       => ['nullable', 'string', 'max:100'],
            'thumbnail'      => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'remove_thumbnail' => ['boolean'],
            'price'          => ['required', 'integer', 'min:0', 'max:4294967295'],
            'discount_price' => ['nullable', 'integer', 'min:0', 'lt:price'],
            'weight'         => ['required', 'integer', 'min:0', 'max:65535'],
            'is_active'      => ['boolean'],
            'is_featured'    => ['boolean'],
            'variants'             => ['required', 'array', 'min:1'],
            'variants.*.id'        => ['nullable', 'integer'],
            'variants.*.color'     => ['required', 'string', 'max:30'],
            'variants.*.color_hex' => ['nullable', 'hex_color'],
            'variants.*.size'      => ['required', 'string', 'max:10'],
            'variants.*.sku'       => ['required', 'string', 'max:60', 'distinct', Rule::unique('product_variants', 'sku')->ignore($product?->id, 'product_id'),],
            'variants.*.stock'     => ['required', 'integer', 'min:0', 'max:4294967295'],
            'variants.*.price'     => ['nullable', 'integer', 'min:0', 'max:4294967295'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nama produk',
            'sku' => 'SKU',
            'category_id' => 'kategori',
            'description' => 'deskripsi',
            'material' => 'bahan',
            'thumbnail' => 'foto utama',
            'price' => 'harga',
            'discount_price' => 'harga diskon',
            'weight' => 'berat',
            'variants' => 'varian',
            'variants.*.color' => 'warna varian',
            'variants.*.color_hex' => 'kode warna',
            'variants.*.size' => 'ukuran varian',
            'variants.*.sku' => 'SKU varian',
            'variants.*.stock' => 'stok varian',
            'variants.*.price' => 'harga varian',
        ];
    }
}
