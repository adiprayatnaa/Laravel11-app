<?php

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
    return view('posts', ['title' => 'Blog Page', 'posts' =>[    
        [
        'id'   => '1',
        'slug' => 'judul-artikel-1',
        'title' => 'Intelijen',
        'author' => 'Gilar Adi Prayatna',
        'body' => 'Intelijen adalah bidang yang melibatkan pengumpulan, analisis, dan penggunaan informasi yang relevan untuk mendukung pengambilan keputusan, terutama dalam konteks keamanan nasional, politik, dan militer. Intelijen dapat mencakup berbagai kegiatan mulai dari pengintaian hingga analisis data strategis. Berikut beberapa poin penting tentang dunia intelijen'
        ], 
        [
            'id'   => '2',
            'slug' => 'judul-artikel-2',
            'title' => 'Kriprografi',
            'author' => 'Gilar Adi Prayatna',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum iste doloribus officiis quas, optio exercitationem, similique impedit quo quibusdam fuga ea eaque cupiditate quaerat! Similique hic dolore alias doloribus aspernatur.'
    
        ] 
   ]]);
});

Route::get('/posts/{slug}', function($slug){
    $posts = [
            [
            'id'   => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Intelijen',
            'author' => 'Gilar Adi Prayatna',
            'body' => 'Intelijen adalah bidang yang melibatkan pengumpulan, analisis, dan penggunaan informasi yang relevan untuk mendukung pengambilan keputusan, terutama dalam konteks keamanan nasional, politik, dan militer. Intelijen dapat mencakup berbagai kegiatan mulai dari pengintaian hingga analisis data strategis. Berikut beberapa poin penting tentang dunia intelijen'
            ], 
            [
                'id'   => 2,
                'slug' => 'judul-artikel-2',
                'title' => 'Kriprografi',
                'author' => 'Gilar Adi Prayatna',
                'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum iste doloribus officiis quas, optio exercitationem, similique impedit quo quibusdam fuga ea eaque cupiditate quaerat! Similique hic dolore alias doloribus aspernatur.'
        
            ] 
    ];

    $post = Arr::first($posts, function ($post) use ($slug) {
        return $post['slug'] == $slug;
    });
    // dd($post);
    return view('post', ['title' => 'Single Post','post' => $post]);
});
Route::get('/contact', function () {
    return view('Contact', ['title' => 'Contact Page']);
});

