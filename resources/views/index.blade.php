<x-layout>
    <x-slot:title>
        My Laravel App
    </x-slot>

    <h1>Posts</h1>
    <ul>
        @forelse ($posts as $index => $post)
        <li>
            <a href="{{ route('posts.show', $index) }}">{{ $post }}</a>
        </li>
        @empty
        <li>No post!</li>
        @endforelse
    </ul>
</x-layout>
