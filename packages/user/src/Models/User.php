<?php

namespace datnguyen\user\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'name',
        'email',
        'role',
        'email_verified_at',
        'password',
        'remember_token',
        'confirmation_token',
        'created_at',
        'updated_at',
        'spins_left',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'spins_left' => 'integer',
    ];

    // Tự động gán giá trị ngẫu nhiên cho spins_left khi tạo user mới
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            if (is_null($user->spins_left)) {
                $user->spins_left = rand(1, 5); // Gán giá trị random từ 1 đến 5
            }
        });
    }
}
