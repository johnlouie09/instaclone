<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'caption',
        'image_path',
        'image_url',
        'user_id'
    ];

    /**
     * Get the user that owns the post.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(related: User::class);
    }

    /**
     * Get the likes associated with the post.
     *
     * @return HasMany
     */
    public function likes(): HasMany
    {
        return $this->hasMany(related: Like::class);
    }

    /**
     * Get the comments associated with the post.
     *
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(related: Comment::class);
    }
}
