<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function posts() 
    {
        $user = Auth::user();

        return view('users.posts', [
            'posts' => $user->posts()->latest()->simplePaginate(3)
        ]);    
    } 
}