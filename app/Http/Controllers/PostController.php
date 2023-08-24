<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Policies\PostPolicy;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index() 
    {
        return view('posts.index', [
            'posts' => Post::latest()->simplePaginate(3)
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'comments' => $post->comments()->latest()->simplePaginate(3),
        ]);
    }

    public function create() 
    {
        return view('posts.create');
    } 

    public function store() 
    {
        $attributes = request()->validate([
            'title' => 'required|string|max:255',
            'slug' => ['required', 'string', 'max:255', Rule::unique('posts', 'slug')],
            'picture' => 'required|image|mimes:jpeg,png,bmp',
            'content' => 'required|string',
        ]);

        $attributes['user_id'] = Auth::id();
        $attributes['slug'] = Str::slug($attributes['slug']);
        $attributes['picture'] = request()->file('picture')->store('pictures', 'public');

        Post::create($attributes);

        return redirect(route('profile'))->with('success', 'Post created!');
    } 

    public function edit(Post $post)
    {
        $user = Auth::user(); 

        if(Gate::allows('view-post', [$post, $user]))
        {    
            return view('posts.edit', [
                'post' => $post
            ]);
        } 
        else
        {
            return redirect(route('home'))->with('error', 'You do not have permission to edit this post.');
        }
    }

    public function update(Post $post) 
    {
        $user = Auth::user(); 

        if(Gate::allows('update-post', [$post, $user]))
        {
            $attributes = request()->validate([
                'title' => 'required|string|max:255',
                'slug' => ['required', 'string', 'max:255'],
                'picture' => 'image|mimes:jpeg,png,bmp',
                'content' => 'required|string',
            ]);

            //lange versie doordat-> Rule::unique('posts', 'slug')->ignore($post->slug) niet werkt

            if(!empty($attributes['slug'])&&$post->slug!=$attributes['slug'])
            {
                if($post::where('slug', $attributes['slug'])->exists())
                {
                throw ValidationException::withMessages([
                    'slug' => 'The slug has already been taken.'
                ]);}
            }

            $attributes['user_id'] = $user->id;
            $attributes['slug'] = Str::slug($attributes['slug']);

            if(isset($attributes['picture'])) 
            {
                $attributes['picture'] = request()->file('picture')->store('pictures', 'public');
            }

            $post->update($attributes);

            return redirect(route('profile'))->with('success', 'Post updated!');
        } 
        else 
        {
            return redirect(route('home'))->with('error', 'You do not have permission to edit this post.');
        }
    }

    public function delete(Post $post) 
    {
        $user = Auth::user(); 

        if(Gate::allows('delete-post', [$post, $user]))
        {
            $post->delete();
            $post->likes()->delete();
            $post->dislikes()->delete();
            $post->comments()->delete();

            return redirect(route('profile'))->with('success', 'Post deleted!');
        }
        else
        {
            return redirect(route('home'))->with('error', 'You do not have permission to delete this post.');
        }
    }  
}
