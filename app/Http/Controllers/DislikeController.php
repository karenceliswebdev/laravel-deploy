<?php

namespace App\Http\Controllers;

use App\Models\Dislike;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DislikeController extends Controller
{
    public function store(Post $post) 
    {
        $user = Auth::user();

        if(Gate::allows('dislike-post', [$post, $user]))
        {
            $attributes = [
                'user_id' => $user->id,
                'post_id' => $post->id,
            ];

            $like = $post->likes()->where('user_id', $user->id);
            $dislike = $post->dislikes()->where('user_id', $user->id);
           
            if($dislike->exists())
            {
                $dislike->forceDelete($attributes);
                return back();
            }

            if($like->exists())
            {
                $like->forceDelete($attributes);
            }

            Dislike::create($attributes);
            return back();
        }
        else 
        {
            return back()->with('error', "You can't dislike your own post.");
        }
    }
}
