<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LikeController extends Controller
{
    public function store(Post $post) 
    {
        $user = Auth::user();

        if(Gate::allows('like-post', [$post, $user]))
        {
            $attributes = [
                'user_id' => $user->id,
                'post_id' => $post->id,
            ];

            $like = $post->likes()->where('user_id', $user->id);
            $dislike = $post->dislikes()->where('user_id', $user->id);

            if($like->exists())
            {
                $like->forceDelete($attributes);
                return back();
            }

            if($dislike->exists())
            {
                $dislike->forceDelete($attributes);
            }

            Like::create($attributes);
            return back();
        }
        else 
        {
            return back()->with('error', "You can't like your own post.");
        }
    }
}
