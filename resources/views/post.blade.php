<x-layout>

    <x-slot:title>{{ $title }}</x-slot>
        <article>
            <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
                <h2>{{ $post['title']}}</h2>
            </a>
            
            <div class="text-base text-gray-500">
                <a href="#">{{ $post['author']}}</a> | 1 Februaruy 2024
            </div>
            <p class="my-4 font-light">{{ $post['body']}}</p>
            <a href="/posts" class="font-medium text-blue-500 hover:underline ">&laquo; Back To Post</a>
        </article><br>
   

{{-- {{ $post['title']}} --}}
    

</x-layout>