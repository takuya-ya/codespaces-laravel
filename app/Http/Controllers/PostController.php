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
        return view('post.show')->with(['post' => $post]);
    }
}
