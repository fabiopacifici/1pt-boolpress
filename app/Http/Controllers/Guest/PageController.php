<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
    public function index()
    {

        return view('welcome', ['latest_posts' => Post::orderByDesc('id')->take(4)->get()]);
    }
}
