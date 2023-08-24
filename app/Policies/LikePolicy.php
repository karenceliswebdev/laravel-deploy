<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class LikePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function like(User $user, Post $post)
    {
        return $user->id != $post->user_id;
    }
}
