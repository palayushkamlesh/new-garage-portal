<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'address',
        'password',
        'phone',
        'role',
        'profile_image',
        'last_login',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [  // Change this from a function to a property
        'email_verified_at' => 'datetime',
        'password' => 'hashed',  // Laravel 10+ automatically hashes the password
    ];
}
