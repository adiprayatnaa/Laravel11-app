<x-layout>

    <x-slot:title>{{ $title }}</x-slot>
    <article>
        <a href="#" class="hover:underline">
            <h2 class="mb-1 text-3xl tracking-light font-bold text-gray-900">{{ $post['title'] }}</h2>
        </a>

        <div>
            <a href="#" class="hover:underline text-base text-gray-500">{{ $post->author->name }}</a> in <a
                href="#" class="hover:underline text-base text-gray-500">{{ $post->category->name }}</a>|
            {{ $post->created_at->diffForHumans() }}
        </div>
        <p class="my-4 font-light">{{ $post['body'] }}</p>
        <a href="/posts" class="font-medium text-blue-500 hover:underline ">&laquo; Back To Post</a>
    </article><br>


    {{-- {{ $post['title']}} --}}


</x-layout>
