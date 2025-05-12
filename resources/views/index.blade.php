<x-layout>
    <x-slot:title>
        My Laravel App
    </x-slot>

    <h1>Posts</h1>
    <ul>
        @forelse ($posts as $post)
        <li>
            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
        </li>
        @empty
        <li>No post!</li>
        @endforelse
    </ul>
</x-layout>
