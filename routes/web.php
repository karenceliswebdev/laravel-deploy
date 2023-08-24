<?php

namespace App\Models;

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\DislikeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//posts & post
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post.show');

Route::middleware('guest')->group(function () 
{
    //auth
    Route::get('/{page}', [AuthController::class, 'show'])->where('page', 'login|register');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () 
{
    //auth
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //profile
    Route::get('/profile', [UserController::class, 'posts'])->name('profile');
    Route::get('/profile/create', [PostController::class, 'create'])->name('profile.post.create');
    Route::post('/profile/store', [PostController::class, 'store'])->name('profile.post.store');

    Route::get('/profile/{post:slug}/edit', [PostController::class, 'edit'])->name('profile.post.edit');
    Route::patch('/profile/{post:slug}/update', [PostController::class, 'update'])->name('profile.post.update');
    Route::delete('/profile/{post:slug}/delete', [PostController::class, 'delete'])->name('profile.post.delete');

    Route::post('/profile/{post:slug}/comment/store', [CommentController::class, 'store'])->name('profile.comment.store');
    Route::delete('/profile/comment/{comment}/delete', [CommentController::class, 'delete'])->name('profile.comment.delete');

    //like & dislike
    Route::post('/posts/{post:slug}/like', [LikeController::class, 'store'])->name('post.like');
    Route::post('/posts/{post:slug}/dislike', [DislikeController::class, 'store'])->name('post.dislike');
});



