<?php

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

// Route::get('/home', function () {
//     return view('home', ['title' => 'Home Page']);
// });
Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog Page', 'posts' => Post::all()]);
});

Route::get('/posts/{post:slug}', function(Post $post){

    // $post = Post::find($slug);
    // dd($post);
    return view('post', ['title' => 'Single Post','post' => $post]);
});
Route::get('/contact', function () {
    return view('Contact', ['title' => 'Contact Page']);
});

