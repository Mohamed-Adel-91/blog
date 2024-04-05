@extends('layouts.app')
@section('title')
    Create Post
@endsection
@section('content')
    <div class="container">
        <div class="container mb-3 d-inline-flex justify-content-between col">
            <h1>Create a new post</h1>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="form-floating mb-3">
                <input name="title" class="form-control" placeholder="Leave a comment here" id="floatingTextarea1"></input>
                <label for="floatingTextarea1">Title</label>
                {{-- <div id="titleHelp" class="form-text">Enter at least 5 characters.</div> --}}
            </div>

            <div class="form-floating mb-3">
                <textarea name="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 200px"></textarea>
                <label for="floatingTextarea2">Description</label>
                {{-- <div id="descHelp" class="form-text">Enter at least 50 characters.</div> --}}
            </div>

            <p class="d-inline-flex gap-1 mb-3">
                <button class="btn btn-primary" type="button" onclick="toggleCollapse('collapseExample1')">Select
                    Username</button>
            </p>
            <p class="d-inline-flex gap-1 mb-3">
                <button class="btn btn-primary" type="button" onclick="toggleCollapse('collapseExample2')">Create New
                    Username</button>
            </p>

            <!-- Collapsible wrapper -->
            <div class="collapse mb-3" id="collapseExample1">
                <div class="card card-body">
                    <div class="form-floating mb-3" id="selectUserFromDB">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Open to select Username</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" data-email="{{ $user->email }}">{{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInputDisabled" placeholder="name@example.com"
                            disabled>
                        <label for="floatingInputDisabled">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                </div>
            </div>

            <div class="collapse mb-3" id="collapseExample2">
                <div class="card card-body">
                    {{-- Create New User --}}
                    <section class="mb-3" id="createUserForm">
                        <div class="input-group mb-3">
                            <div class="form-floating">
                                <input name="author" type="text" class="form-control" id="floatingInputGroup1"
                                    placeholder="Username">
                                <label for="floatingInputGroup1">Username</label>
                                {{-- <div id="descHelp" class="form-text">Enter at least 3 characters.</div> --}}
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="email" type="email" class="form-control" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                    </section>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('floatingSelect').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var emailInput = document.getElementById('floatingInputDisabled');
            emailInput.value = selectedOption.getAttribute('data-email');
        });
    </script>
    <script>
        function toggleCollapse(id) {
            var collapseElement = document.getElementById(id);
            var otherCollapseElement = id === 'collapseExample1' ? document.getElementById('collapseExample2') : document
                .getElementById('collapseExample1');
            if (collapseElement.classList.contains('show')) {
                return;
            }
            collapseElement.classList.toggle('show');
            otherCollapseElement.classList.remove('show');
        }
    </script>
@endsection
