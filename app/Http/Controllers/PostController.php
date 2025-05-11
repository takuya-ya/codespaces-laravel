<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $posts = [
        'Title 0',
        'Title 1',
        'Title 2',
    ];

    public function index() {
        return view('index')->with(['posts' => $this->posts]);
    }

    public function show($id) {
        return view('post.show')->with(['post' => $this->posts[$id]]);
    }
}
