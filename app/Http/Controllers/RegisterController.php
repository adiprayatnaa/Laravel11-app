<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Support\ValidatedData;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        // return $request->all();
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:255',
            'username' => 'required|min:5|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        // $request->session()->flash('success','Registration Successfully! please Login!');
        // session()->flash('success', 'Your data has been saved successfully!');
        // return redirect('/login');
        return redirect('/login')->with('success', 'Your data has been saved successfully!');

            
        // return back()->with('success', 'Registration successful!');
        // dd('Registrasi berhasil');
        // return $request->all();
    }
}
