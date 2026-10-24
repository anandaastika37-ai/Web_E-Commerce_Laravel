<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{

    public function index()
    {
        $products = $this->currentStore()->products()->with('category')
        ->withSum('variants as total_stock' , 'stock')
        ->latest()
        ->paginate(15);

        return view('dashboard.store' , compact('products'));
    }

    public function create()
    {
        $this->currentStore();

        return view('dashboard.add-product' , [ 'product' => new Product(['gender' => 'unisex' , 'is_active' => true]) , 'categories' => Category::orderBy('name')->get()]);
    }

    public function store(ProductRequest $request)
    {
        $store = $this->currentStore();
        $data =  $request->validated();
        DB::transaction(function () use ($request , $store , $data) {
            $product = $store->products()->create([
                ...$this->productAttributes($data , $store),'thumbnail' => $request->file('thumbnail')?->store('products', 'public')
            ]);
            $product->variants()->createMany($data['variants']);
        });

        return redirect()->route('dashboard.store')->with('Berhasil' , 'Produk Berhasil Ditambahkan');
    }


    public function edit(Product $product)
    {
        $this->owned($product);

        return view('dashboard.edit-product' ,
        [
            'product' => $product->load('variants'),
            'categories' => Category::orderBy('name')->get()
        ]);
    }


    public function update(ProductRequest $request, Product $product)
    {
        $store = $this->currentStore();
        $data = $request->validated();

        $oldThumbnail = $product->thumbnail;
        $newThumbnail = $oldThumbnail;

        if ($request->hasFile('thumbnail')){
            $newThumbnail = $request->file('thumbnail')->store('products' , 'public');
        }elseif ($request->boolean('remove_thumbnail')){
            $newThumbnail = null;
        }

        DB::transaction(function () use ($product , $store , $data , $newThumbnail){
            $product->update([
                ...$this->productAttributes($data , $store),'thumbnail' => $newThumbnail
            ]);

            $keep = [];
            foreach($data['variants'] as $row){
                $variant = $product->variants()->findOrNew($row['id'] ?? null);
                $variant->fill(Arr::except($row, 'id'))->save();
                $keep[] = $variant->id;
            }
            $product->variants()->whereNotIn('id' , $keep)->delete();
        });

        if($oldThumbnail && $oldThumbnail !== $newThumbnail){
            Storage::disk('public')->delete($oldThumbnail);
        }
        return redirect()->route('dashboard.store')->with('Berhasil' , 'Product Berhasil Diperbarui.');
    }

    public function destroy(Product $product)
    {
        $this->owned($product);
        $product->delete();
        if($product->thumbnail){
            Storage::disk('public')->delete($product->thumbnail);
        }

        return redirect()->route('dashboard.store')
        ->with('success', 'Produk berhasil dihapus.');
    }

    private function currentStore(): Store
    {
        $user = request()->user();
        return $user?->store ?? abort(403, 'Buat toko terlebih dahulu.');

    }

    private function owned(Product $product): void{
        abort_unless($product->store_id === $this->currentStore()->id, 404);
    }

    private function productAttributes(array $data, Store $store): array{
        return [
            ...Arr::except($data, ['variants' , 'thumbnail' , 'remove_thumbnail']),'brand' => $store->name
        ];
    }
}
