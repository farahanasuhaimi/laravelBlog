<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function homepage()
    {
        return view('homepage');
    }

    public function profile(User $user)
    {

        return view('profile-blogposts', ['username' => $user->username, 'blogposts' => $user->blogposts()->latest()->get(), 'postCount' => $user->blogposts()->count()]);
    }

    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'username' => ['required', 'min:3', 'max:30', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'confirmed']

        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/')->with('success', 'You are registered!');
    }

    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);

        if (auth()->attempt(['username' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']])) {
            return redirect('/')->with('success', 'You are logged in');
        } else {
            return redirect('/')->with('error', 'Invalid login credentials');
        };
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'You are logged out');
    }
}
