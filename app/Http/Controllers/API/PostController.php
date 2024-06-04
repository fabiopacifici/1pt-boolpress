<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{


    public function index () {
    return response()->json(
        [
            'success' => true,
            'results' => Post::with(['category', 'user', 'tags'])->orderByDesc('id')->paginate(),
        ]
        );
    }

   public function show ($id) {


    $post = Post::with(['category', 'user', 'tags'])->where('id', $id)->first();
    if($post) {
        return response()->json([
            'success'=> true,
            'results'=> $post
        ]);
    } else {
        return response()->json([
            'success'=> false,
            'results'=> "404 Not found"
        ]);
    }
}

}
