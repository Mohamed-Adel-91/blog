@extends('layouts.old_app')
@section('title')
    Update Post
@endsection
@section('content')
    <div class="container">
        <h1>Update post no. {{ $post->id }}</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('posts.update', $post->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            @csrf
            @method('PUT')
            <div class="form-floating mb-3">
                <input name="title" value="{{ $post->title }}" class="form-control" placeholder="Leave a comment here"
                    id="floatingTextarea1"></input>
                <label for="floatingTextarea1">Title</label>
            </div>
            <div class="form-floating mb-3">
                <textarea name="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 200px">{{ $post->description }}</textarea>
                <label for="floatingTextarea2">Description</label>
            </div>
            <div class="mb-3" id="collapseExample1">
                <div class="card card-body">
                    <div class="form-floating mb-3" id="selectUserFromDB">
                        <select name="postCreator" class="form-select" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected>Open to select Username</option>
                            @foreach ($users as $user)
                                <option @if ($user->id == $post->user_id) selected @endif value="{{ $user->id }}"
                                    data-email="{{ $user->email }}">
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input @if ($user->id == $post->user_id) value="{{ $user->email }}" @endif name="email"
                            type="email" class="form-control" id="floatingInputDisabled" placeholder="name@example.com"
                            disabled>
                        <label for="floatingInputDisabled">Email address</label>
                    </div>
                    {{-- <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div> --}}
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script>
        // script for get email from  user list and put it to create user form
        document.getElementById('floatingSelect').addEventListener('change', function() {
            let selectedOption = this.options[this.selectedIndex];
            let emailInput = document.getElementById('floatingInputDisabled');
            emailInput.value = selectedOption.getAttribute('data-email');
        });
    </script>
@endsection
