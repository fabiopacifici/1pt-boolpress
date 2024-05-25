<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{


    public function index()
    {
        return view('guests.posts.index', ['posts' => Post::orderByDesc('id')->paginate()]);
    }


    public function show(Post $post)
    {
        //dd($post);
        return view('guests.posts.show', compact('post'));
    }
}
