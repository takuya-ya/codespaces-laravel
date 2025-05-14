<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

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

    public function store(PostRequest $recuest) {

        // PostRequestでバリデーションしたので不要
        // $recuest->validate([
        //     'title' => 'required',
        //     'body' => 'required|min:5',
        // ]);

        $post = new Post();
        $post->title = $recuest->title;
        $post->body = $recuest->body;
        $post->save();

        return redirect()->route('posts.index');
    }

    public function edit(Post $post) {
    // この$postには、URLにあるIDに対応するPostモデルのデータが自動で入る（Implicit Bindingによる）
    // つまり、わざわざ $idを取得して、それからデータベースの中身をPost::findOrFail($id) で探す必要はない
        return view('posts.edit')->with(['post' => $post]);
    }

    // フォームから送信されたデータ（入力値）を$requestで受け取り、URLのIDに対応する$post（Postモデル）をImplicit Bindingで受け取る
    public function update(PostRequest $recuest, Post $post) {

        // PostRequestでバリデーションしたので不要
        // $recuest->validate([
        //     'title' => 'required',
        //     'body' => 'required|min:5',
        // ]);

        // $post = new Post(); $postでインスタンスは受けているので、この行は不要
        $post->title = $recuest->title;
        $post->body = $recuest->body;
        $post->save();
        // リダイレクト先は、編集元である詳細画面の方が親切なので変更
        return redirect()->route('posts.show', $post);
    }

    // この$postは、URLのIDパラメータに基づいてLaravelがPostモデルから該当レコードを自動取得（Implicit Binding）してくれたもの
    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
