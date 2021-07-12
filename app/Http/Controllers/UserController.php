<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function auth(Login $request) { 
        $credentials = $request->validated();

        (isset($request->remember) ? $remember = true : $remember = false);

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return view('profile');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
