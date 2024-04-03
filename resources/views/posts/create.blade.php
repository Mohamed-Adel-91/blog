@extends('layouts.app')
@section('title')
    Create Post
@endsection
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="form-floating mb-3">
                <input name="title" class="form-control" placeholder="Leave a comment here" id="floatingTextarea1"></input>
                <label for="floatingTextarea1">Title</label>
                <div id="titleHelp" class="form-text">Enter at least 5 characters.</div>
            </div>
            <div class="form-floating mb-3">
                <textarea name="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 200px"></textarea>
                <label for="floatingTextarea2">Description</label>
                <div id="descHelp" class="form-text">Enter at least 50 characters.</div>
            </div>
            <div class="input-group mb-3">
                <div class="form-floating">
                    <input name="author" type="text" class="form-control" id="floatingInputGroup1"
                        placeholder="Username">
                    <label for="floatingInputGroup1">Username</label>
                    <div id="descHelp" class="form-text">Enter at least 3 characters.</div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
