<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    // dump(request('search'));
    $posts = Post::filter(request(['search', 'category', 'author']))->latest();

    // if (request('search')) {
    //     $posts = $posts->where('title', 'like', '%' . request('search') . '%');
    // }
    return view('posts', ['title' => 'Blog Page', 'posts' => $posts->paginate(9)->withQueryString()]);
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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/dashboard', function () {
//     return view('dashboard.index', [
//         'title' => 'Dashboard'
//     ]);
// })->middleware('auth');
Route::get('/dashboard/posts/checkSLug', [DashboardPostController::class, 'checkSlug']);
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
