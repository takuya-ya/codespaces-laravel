<x-layout>
    <x-slot:title>
        {{ $post->title }} | My Laravel App
    </x-slot>

    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <p class="back-link"><a href="{{ route('posts.index') }}">Back</a></p>
</x-layout>
