<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function store(Post $post) 
    {
        $attributes = request()->validate([
            'content' => 'required|string',
        ]);

        $attributes['user_id'] = Auth::id();
        $attributes['post_id'] = $post->id;

        Comment::create($attributes);

        return back()->with('success', 'Comment created!');
    } 

    public function delete(Comment $comment) 
    {
        $user = Auth::user(); 

        if(Gate::allows('delete-comment', [$comment, $user]))
        {
            $comment->forcedelete();

            return back()->with('success', 'Comment deleted!');
        }
        else
        {
            return redirect(route('home'))->with('error', 'You do not have permission to delete this comment.');
        }
    } 
}
