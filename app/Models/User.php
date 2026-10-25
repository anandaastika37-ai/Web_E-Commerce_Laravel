<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{

    use HasFactory, Notifiable;
    public const ROLE_BUYER = 'buyer';
    public const ROLE_SELLER = 'seller';

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'phone',
        'profile_photo',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function hasrole(string ...$roles):bool{
        return in_array($this->role , $roles,true);
    }

    public function isSeller(): bool {return $this->role === self::ROLE_SELLER;}
    public function isBuyer(): bool {return $this->role === self::ROLE_BUYER;}


    public function store(): HasOne{
        return $this->hasOne(Store::class);
    }

    protected function ProfilePhotoUrl(): Attribute{
        return Attribute::get(fn () => $this->profile_photo ? asset('storage/' . $this->profile_photo) : asset('images/default-avatar.png'));
    }
}
