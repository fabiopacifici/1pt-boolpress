@extends('layouts.admin')



@section('content')

<header class="bg-dark text-white py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <h1>
            Editing: {{$post->title}}
        </h1>
        <a class="btn btn-secondary" href="{{route('admin.posts.index')}}">Cancel</a>
    </div>
</header>


<div class="container mt-4">
    @include('partials.errors')

    <form action="{{route('admin.posts.update', $post)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelper" placeholder="Learn php" value="{{old('title', $post->title)}}" />
            <small id="titleHelper" class="form-text text-muted">Add the post title here</small>
        </div>


        <div class="d-flex gap-3">
            <img width="140" src="{{asset('storage/' . $post->cover_image)}}" alt="">
            <div class="mb-3">
                <label for="cover_image" class="form-label">Upload another cover image</label>
                <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder="cover image" aria-describedby="coverImageHelper" />
                <div id="coverImageHelper" class="form-text">Upload a cover image for this post</div>
            </div>
        </div>



        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="content" rows="5">{{old('content', $post->content)}}</textarea>
        </div>


        <button type="submit" class="btn btn-primary">
            Update
        </button>


    </form>
</div>


@endsection
