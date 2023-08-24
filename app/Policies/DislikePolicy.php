<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class DislikePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function dislike(User $user, Post $post)
    {
        return $user->id != $post->user_id;
    }
}
