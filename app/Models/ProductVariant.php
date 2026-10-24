<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ProductVariant extends Model
{
    protected $fillable = ['sku' , 'size' , 'color' , 'color_hex' , 'stock', 'price'];

    public function product(): BelongsTo{
        return $this->belongsTo(Product::class);
    }
}
