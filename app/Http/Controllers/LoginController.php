<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        // Validate the form data
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:255',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('loginError', 'Login Failed');
        // Check if the user credentials are correct
        // $credentials = $request->only('username', 'password');
        // if (auth()->attempt($credentials)) {
        //     // If the user is authenticated, redirect to the intended page
        //     return redirect()->intended(route('dashboard'));
        // } else {
        //     // If the credentials are incorrect, return an error message
        //     return back()->withErrors(['username' => 'Invalid username or password.']);
        // }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/login')->with('success', 'You have been logged out!');
        // return redirect()->route('login')->with('success', 'You have been logged out!');
    }
}
