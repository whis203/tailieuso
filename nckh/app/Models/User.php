<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Products;
use Usamamuneerchaudhary\Commentify\Traits\HasUserAvatar;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasUserAvatar;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public function favorites()
    {
        return $this->belongsToMany(Products::class, 'favorites');
    }
    protected $fillable = [
        'username',
        'password',
        'name',
        'email',
        'phone',
        'img',
        'gender',
        'role'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
