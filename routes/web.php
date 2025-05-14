<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('posts.index');
// idを渡すcontrollerのメソッド urlのパラメーターの引数をshowメソッドに渡す
//このルートにアクセスすると PostController の show() メソッドが実行される
// 名前付きルートにすることで、ビューやリダイレクトで URL をハードコーディングせずに済む
// Route::get('/post/{post}', [PostController::class, 'show'])->name('posts.show');
Route::resource('posts', PostController::class)->except(['index']);
