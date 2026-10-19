<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
     protected $fillable = ['name' , 'slug' , 'description' , 'gender', 'material' , 'price' , 'discount_price' , 'weight' , 'thumbnail' , 'is_active' , 'is_featured' , 'sku' , 'size' , 'color' , 'color_hex' , 'stock' , 'price'];

     protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean'
     ];

    

}
