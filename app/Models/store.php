<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class store extends model{

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'logo',
        'phone',
        'city',
        'address',
        'is_active',
    ];

    public function Product(): HasMany{
        return $this->hasMany(Product::class);
    }
}
