<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.index', ['categories' => Category::orderByDesc('id')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //dd($request->all());
        // validate
        $val_data = $request->validated();
        $val_data['slug'] = Str::slug($request->name, '-');
        // create
        Category::create($val_data);
        // update
        return to_route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //dd($request->all());

        $val_data = $request->validated();
        $val_data['slug'] = Str::slug($request->name, '-');

        $category->update($val_data);
        return to_route('admin.categories.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('admin.categories.index');

    }
}
