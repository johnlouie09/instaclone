<?php

namespace App\Models;

use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $connection = 'mongodb';
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'profile_image',
        'bio'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the posts created by the user.
     *
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(related: Post::class);
    }

    /**
     * Get the likes made by the user.
     *
     * @return HasMany
     */
    public function likes(): HasMany
    {
        return $this->hasMany(related: Like::class);
    }

    /**
     * Get the comments made by the user.
     *
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(related: Comment::class);
    }
}
