<x-layout>
    <x-slot:title>
        {{ $post }} | My Laravel App
    </x-slot>

    <h1>{{ $post }}</h1>
    <p class="back-link"><a href="{{ route('posts.index') }}">Back</a></p>
</x-layout>
