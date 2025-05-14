<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest()->get();
        return view('index')->with(['posts' => $posts]);
    }

    public function show(Post $post) {
        // 下記はshow($id)でアクセスされたページに対応したid(postテーブルのカラム)を個別に抽出しているが、implicit Bindingにて自動でurlに対応した個別のidと紐づく
        // $post = Post::findOrFail($id);
        return view('posts.show')->with(['post' => $post]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $recuest) {

        $recuest->validate([
            'title' => 'required',
            'body' => 'required|min:5',
        ]);

        $post = new Post();
        $post->title = $recuest->title;
        $post->body = $recuest->body;
        $post->save();

        return redirect()->route('posts.index');
    }
}
