<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected $attributes = ['is_active' => true];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }

    public function products(): HasMany{
        return $this->hasMany(Product::class , 'store_id');
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    protected function logoUrl(): Attribute{
        return Attribute::get(fn () => $this->logo ? asset('storage/' . $this->logo) : asset('image/default-store.png'));
    }
}
