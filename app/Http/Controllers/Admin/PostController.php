<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        return view('admin.posts.index', ['posts' => Post::orderByDesc('id')->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //dd($request->all());
        // validate
        $val_data = $request->validated();
        //dd($val_data);
        $val_data['slug'] = Str::slug($request->title, '-'); // this is a title this-is-a-title

        $image_path = Storage::put('uploads', $request->cover_image);
        //dd($image_path);
        $val_data['cover_image'] = $image_path;

        //dd($val_data);
        // create
        Post::create($val_data);

        // redirect
        return to_route('admin.posts.index')->with('message', 'Post Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories  = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //dd($request->all());

        // validate
        $val_data = $request->validated();

        $val_data['slug'] = Str::slug($request->title, '-');
        //dd($val_data);

        if ($request->has('cover_image')) {

            // check if the current post has a cover image
            if ($post->cover_image) {
                //dd('here now');
                // if so, delete it
                Storage::delete($post->cover_image);
            }

            // upload the new image
            $image_path = Storage::put('uploads', $request->cover_image);
            //dd($image_path);
            $val_data['cover_image'] = $image_path;
        }

        //dd($val_data);
        // update
        $post->update($val_data);

        // redirect
        return to_route('admin.posts.index')->with('message', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        if ($post->cover_image) {
            //dd('here now');
            // if so, delete it
            Storage::delete($post->cover_image);
        }

        // delete the resourece
        $post->delete();

        // redirect
        return to_route('admin.posts.index')->with('message', 'Post Deleted forever and ever');
    }
}
