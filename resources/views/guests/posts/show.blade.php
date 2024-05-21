@extends('layouts.admin')

@section('content')

<header class="bg-dark text-white py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <h1>
            {{$post->title}}
        </h1>
        <a class="btn btn-primary" href="{{route('admin.posts.index')}}">All Posts</a>
    </div>
</header>


<div class="container mt-5">

    <div class="row">
        <div class="col">
            <img src="{{$post->cover_image}}" alt="">
        </div>
        <div class="col">

            <div>{{$post->content}}</div>

        </div>

    </div>


</div>


@endsection
