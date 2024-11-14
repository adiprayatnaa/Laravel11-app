<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/home', function () {
    return view('home', ['nama' => 'Gilar Adi Prayatna']);
});
Route::get('/blog', function () {
    return view('Blog');
});
Route::get('/contact', function () {
    return view('Contact');
});

