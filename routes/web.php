<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('posts.index');
// idを渡すcontrollerのメソッド urlのパラメーターの引数をshowメソッドに渡す
Route::get('/post/{id}', [PostController::class, 'show'])->name('posts.show');
