<?php

namespace App\Providers;
use App\Models\Post;
use App\Models\Comment;
use App\Policies\PostPolicy;
use App\Models\Like;
use App\Models\Dislike;
use App\Policies\LikePolicy;
use App\Policies\DislikePolicy;
use App\Policies\CommentPolicy;
use Illuminate\Support\Facades\Gate;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Post::class => PostPolicy::class,
        Like::class => LikePolicy::class,
        Dislike::class => DislikePolicy::class,
        Comment::class => CommentPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('like-post', [LikePolicy::class, 'like']);
        Gate::define('dislike-post', [DIslikePolicy::class, 'dislike']);

        Gate::define('view-post', [PostPolicy::class, 'view']);
        Gate::define('update-post', [PostPolicy::class, 'update']);
        Gate::define('delete-post', [PostPolicy::class, 'delete']);

        Gate::define('delete-comment', [CommentPolicy::class, 'delete']);
    }
}
