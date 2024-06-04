@extends('layouts.admin')

@section('content')



<header class="bg-dark text-white py-4">
    <div class="container">
        <h1>
            Categories
        </h1>
    </div>
</header>


<div class="container mt-4">
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <form action="{{route('admin.categories.store')}}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelper" placeholder="Fullstack" />
                    <small id="nameHelper" class="form-text text-muted">Type a category name </small>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-plus fa-sm fa-fw"></i>
                </button>

            </form>
        </div>
        <div class="col">
            <div class="table-responsive">
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Total Posts</th>
                            <th scope="col">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category )

                        <tr class="">
                            <td scope="row">{{$category->id}}</td>

                            <td>

                                <form action="{{route('admin.categories.update', $category)}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="" value="{{$category->name}}" />
                                    </div>

                                </form>

                            </td>
                            <td>{{$category->slug}}</td>
                            <td>
                                <span class="badge bg-primary">
                                    {{$category->posts->count()}}
                                </span>
                            </td>
                            <td>

                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalId-{{$category->id}}">
                                    <i class="fas fa-trash fa-xs fa-fw"></i> Delete
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{$category->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{$category->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-{{$category->id}}">
                                                    Delete post
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                You are about to desctory this post:
                                                <strong> {{$category->title}}</strong>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>


                                                <form action="{{route('admin.categories.destroy', $category)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        Confirm
                                                    </button>

                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </td>

                        </tr>
                        @empty

                        <tr class="">
                            <td scope="row" colspan="5">No records to show.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>




</div>


@endsection
