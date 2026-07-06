<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\SavedPost;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'user_id'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    // check if any user get like the post
    public function isLikedByUser($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }
    public function isSavedByUser($userId)
    {
        if (!$userId) return false;
        return SavedPost::where('user_id', $userId)->where('post_id', $this->id)->exists();
    }
}
