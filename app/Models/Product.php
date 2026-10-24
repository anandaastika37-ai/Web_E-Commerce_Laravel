<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
     protected $fillable = [
        'name',
        'slug',
        'description',
        'gender',
        'material',
        'price',
        'discount_price',
        'weight',
        'thumbnail',
        'is_active',
        'is_featured',
        'category_id',
        'store_id',
     ];

     protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean'
     ];

    public function Category(): BelongsTo{
        return $this->belongsTo(category::class);
    }

    public function Variant(): HasMany{
        return $this->hasMany(ProductVariant::class);
    }
    public function Store(): BelongsTo{
        return $this->belongsTo(store::class);
    }
}
