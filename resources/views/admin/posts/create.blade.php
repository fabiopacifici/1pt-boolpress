@extends('layouts.admin')



@section('content')

<header class="bg-dark text-white py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <h1>
            Create a wonderful post
        </h1>
        <a class="btn btn-secondary" href="{{route('admin.posts.index')}}"><i class="fas fa-times fa-sm fa-fw"></i> Cancel</a>
    </div>
</header>

<div class="container mt-4">

    @include('partials.errors')

    <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelper" placeholder="Learn php" />
            <small id="titleHelper" class="form-text text-muted">Add the post title here</small>
        </div>


        <div class="mb-3">
            <label for="cover_image" class="form-label">Upload cover image</label>
            <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder="cover image" aria-describedby="coverImageHelper" />
            <div id="coverImageHelper" class="form-text">Upload a cover image for this post</div>
        </div>


        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" name="category_id" id="category_id">
                <option selected disabled>Select one</option>

                @foreach ($categories as $category )
                <option value="{{$category->id}}" {{ $category->id == old('category_id') ? 'selected' :'' }}>{{$category->name}}</option>
                @endforeach


            </select>
        </div>

        <div class="mb-3 d-flex gap-3">
            @foreach ($tags as $tag )
            <div class="form-check ">
                <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="tag-{{$tag->id}}" name="tags[]" {{ in_array($tag->id, old('tags',[]))  ? 'checked' : '' }} />
                <label class="form-check-label" for="tag-{{$tag->id}}">{{$tag->name}}</label>
            </div>
            @endforeach
        </div>




        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="content" rows="5">{{old('content')}}</textarea>
        </div>


        <button type="submit" class="btn btn-primary">
            Create
        </button>





    </form>
</div>


@endsection
