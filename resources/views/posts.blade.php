<x-layout>

    <x-slot:title>{{ $title }}</x-slot>
    
    @foreach ($posts as $post)
        <article>
            <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
                <h2>{{ $post['title']}}</h2>
            </a>
            
            <div class="text-base text-gray-500">
                <a href="#">{{ $post['author']}}</a> | 1 Februaruy 2024
            </div>
            <p class="my-4 font-light">{{ Str::limit($post['body'], 100)}}</p>
            <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline ">Read More &raquo;</a>
        </article><br>
    @endforeach

{{-- {{ $post['title']}} --}}
    

</x-layout>