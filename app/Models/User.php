<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'password',
        'role'
    ];

    public function profile() {
        return $this->belongsTo(Profile::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function favorites() {
        return $this->hasMany(Favorites::class);
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public $timestamps = false;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
