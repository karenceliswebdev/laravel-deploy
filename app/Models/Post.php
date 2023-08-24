<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Comment;
use App\Models\Dislike;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'picture',
        'content',
    ];

    public function user()
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

    public function dislikes()
    {
        return $this->hasMany(Dislike::class);
    }

    public function isLikedByUser()
    {        
        return $this->likes()->where('user_id', Auth::id())->exists();
    }

    public function isDislikedByUser()
    {        
        return $this->dislikes()->where('user_id', Auth::id())->exists();
    }

    public function numOfLikes()
    {
        return $this->likes()->count();
    }

    public function numOfDislikes()
    {
        return $this->dislikes()->count();
    }
}
