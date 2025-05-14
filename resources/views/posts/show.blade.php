<x-layout>
    <x-slot:title>
        {{ $post->title }} | My Laravel App
    </x-slot>

    <h1>
        {{ $post->title }}
        <a href="{{ route('posts.edit', $post) }}">Edit</a>
        <form method="post" action="{{ route('posts.destroy', $post)}}" id="delete-form">
            @method('DELETE')
            @csrf
            <button>Delete</button>
        </form>
    </h1>
    <p>{!! nl2br(e($post->body)) !!}</p>
    <p class="back-link"><a href="{{ route('posts.index', $post) }}">Back</a></p>

    <script>
        'use strict';

        {
            const form = document.querySelector('#delete-form');
            form.addEventListener('submit', (e) => {
                // submitを一時停止
                e.preventDefault();

                if (confirm('Sure?') === false) {
                    // ポップアップが消えて、元の画面に戻る
                    return;
                }
                // データが削除
                // <form method="post" action="{{ route('posts.destroy', $post)}}" id="delete-form">　が実行される
                form.submit();
            })
        }
    </script>
</x-layout>
