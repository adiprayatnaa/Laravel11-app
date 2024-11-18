<?php 

namespace App\Models;

use Illuminate\Support\Arr;

class Post{
    public static function all(){
        return [    
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
            ];
    }

    // public static function find($slug){
    //     $post = Arr::first(static::all(), function ($post) use ($slug) {
    //         return $post['slug'] == $slug;
    //     });
    // }

    public static function find($slug): ?array
    {
        $post = Arr::first(static::all(), fn($post) => $post['slug'] == $slug);
        if(!$post){
            abort(404);
        } 
        return $post;
    }

    
}