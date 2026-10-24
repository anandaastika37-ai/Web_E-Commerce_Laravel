<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Store extends model{

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

    public function products(): HasMany{
        return $this->hasMany(Product::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
