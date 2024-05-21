@extends('layouts.admin')



@section('content')

<header class="bg-dark text-white py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <h1>
            Create a wonderful post
        </h1>
        <a class="btn btn-secondary" href="{{route('admin.posts.index')}}">Cancel</a>
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
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="content" rows="5"></textarea>
        </div>


        <button type="submit" class="btn btn-primary">
            Create
        </button>





    </form>
</div>


@endsection
