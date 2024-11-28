<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
    $posts = Post::latest()->get();
    return view('posts', ['title' => 'Blog Page', 'posts' => $posts]);
});

Route::get('/posts/{post:slug}', function (Post $post) {

    // $post = Post::find($slug);
    // dd($post);
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});
Route::get('/contact', function () {
    return view('Contact', ['title' => 'Contact Page']);
});

Route::get('/author/{user:username}', function (User $user) {

    // $post = Post::find($slug);
    // $posts = $user->posts->load('category', 'author');
    // $posts = $user->posts;
    return view('posts', ['title' => count($user->posts) . ' Articles By ' .  $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {

    // $post = Post::find($slug);
    // dd($post);
    // $posts = $category->posts->load('category', 'author');
    return view('posts', ['title' => count($category->posts) . ' Articles in Category : ' .  $category->name, 'posts' => $category->posts]);
});
