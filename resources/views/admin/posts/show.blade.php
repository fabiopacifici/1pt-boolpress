@extends('layouts.admin')

@section('content')

<header class="bg-dark text-white py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <h1>
            {{$post->title}}
        </h1>
        <a class="btn btn-primary" href="{{route('admin.posts.index')}}">
            <i class="fas fa-chevron-left fa-sm fa-fw"></i> All Posts</a>
    </div>
</header>


<div class="container mt-5">

    <div class="row">
        <div class="col">
            @if (Str::startsWith($post->cover_image, 'https://'))
            <img loading="lazy" class="card-img-top" src="{{$post->cover_image}}" alt="">
            @else
            <img loading="lazy" class="card-img-top" src="{{ asset('storage/' . $post->cover_image) }}">
            @endif
        </div>
        <div class="col">

            <div class="metadata">
                <strong>Category</strong> {{$post->category ? $post->category->name : 'Uncategorized'}}


                <div class="tags">
                    <strong>Tags: </strong>
                    @forelse ($post->tags as $tag )
                    <span class="badge bg-dark">{{$tag->name}}</span>

                    @empty
                    <span>N/A</span>
                    @endforelse

                </div>

            </div>
            <div>{{$post->content}}</div>

        </div>

    </div>



    @endsection
