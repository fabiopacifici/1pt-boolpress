<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{


    public function index(Request $request)
    {

        if ($request->has('search')) {

            return response()->json([
                'success' => true,
                'results' => Post::with(['category', 'user', 'tags'])->orderByDesc('id')->where('title', 'LIKE', '%' . $request->search . '%')->paginate(),
            ]);
        }

        return response()->json(
            [
                'success' => true,
                'results' => Post::with(['category', 'user', 'tags'])->orderByDesc('id')->paginate(),
            ]
        );
    }

    public function show($id)
    {


        $post = Post::with(['category', 'user', 'tags'])->where('id', $id)->first();
        if ($post) {
            return response()->json([
                'success' => true,
                'results' => $post
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => "404 Not found"
            ]);
        }
    }
}
