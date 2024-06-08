@extends('layouts.app')


@section('content')

<div class="p-5 mb-4 bg-light">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">Get in touch with</h1>
        <p class="col-md-8 fs-4">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita sequi ut et modi magni velit deleniti ratione, consequatur nulla accusantium reiciendis eveniet reprehenderit itaque nihil! Quaerat laborum ab quia officia!
        </p>
        <a class="btn btn-primary btn-lg" href="#contact-form">
            Contact me
        </a>
    </div>
</div>


<div class="container">
    @include('partials.session-messages')
    @include('partials.errors')
    <!-- Form below -->

    <form action="{{route('contacts.store')}}" id="contact-form" method="post">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelper" placeholder="Luke skywalker" />
            <small id="nameHelper" class="form-text text-muted">Type your full name </small>
        </div>


        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelper" placeholder="abc@mail.com" />
            <small id="emailHelper" class="form-text text-muted">Type your full email addrees </small>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" name="message" id="message" rows="5"></textarea>
        </div>


        <button type="submit" class="btn btn-dark">
            Submit
        </button>



    </form>
</div>


@endsection
