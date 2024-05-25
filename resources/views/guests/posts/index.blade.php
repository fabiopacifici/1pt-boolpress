@extends('layouts.app')

@section('content')


<div class="jumbotron p-5 mb-4" style="background-image: url({{ asset('storage/' . $posts[0]->cover_image)}}); background-size: cover; ">
    <div class="container py-5 text-white">
        <h1 class="display-5 fw-bold">
            Posts
        </h1>

        <p class="col-md-8 fs-4">Read our amazing blog</p>

        <a class="btn btn-outline-dark" href="#posts">
            <i class="fas fa-chevron-down"></i>
        </a>

    </div>
</div>

<section id="posts">
    <div class="container mt-4">

        <div class="row row-cols-1 row-cols-sm-3 g-4">
            @forelse ($posts as $post )
            @include('partials.post-card')

            @empty
            <div class="col-12">
                <p>No posts here.</p>
            </div>
            @endforelse
        </div>

        {{$posts->links('pagination::bootstrap-5')}}
    </div>
</section>


@endsection