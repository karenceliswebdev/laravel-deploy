<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function show($page) 
    {
        $path = 'auth.' . $page;
        return view($path);
    } 

    public function register() 
    {
        $attributes = request()->validate([
            'email' => 'required|email:rfc,dns|max:255|unique:users,email',
            'password' => 'required|string|max:255'
        ]);

        $attributes['password'] = Hash::make($attributes['password']);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect(route('home'))->with('success', 'You logged in!');
    } 

    public function login()
    {
        $attributes = request()->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|max:255'
        ]);

        if(Auth::attempt($attributes)) {
            session()->regenerate();
            return redirect(route('home'))->with('success', 'You logged in!');
        } 

        //if auth failed
        throw ValidationException::withMessages([
            'password' => 'incorrect login credentials'
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route('home'))->with('success', 'You logged out!');
    }
}
