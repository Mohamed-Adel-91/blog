@extends('layouts.app')
@section('title')
    Create Post
@endsection
@section('content')
    <div class="container">
        <div class="container mb-3 d-inline-flex justify-content-between col">
            <h1>Create a new post</h1>
        </div>
        <form id="postForm" method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="form-floating mb-3">
                <input name="title" class="form-control" placeholder="Leave a comment here" id="floatingTextarea1"></input>
                <label for="floatingTextarea1">Title</label>
            </div>

            <div class="form-floating mb-3">
                <textarea name="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 200px"></textarea>
                <label for="floatingTextarea2">Description</label>
            </div>

            <p class="d-inline-flex gap-1 mb-3">
                <button class="btn btn-primary" type="button" onclick="toggleCollapse('collapseExample1')">
                    Select Username</button>
            </p>
            <p class="d-inline-flex gap-1 mb-3">
                <button class="btn btn-primary" type="button" onclick="toggleCollapse('collapseExample2')">
                    Create New Username</button>
            </p>

            <!-- Collapsible wrapper -->
            <div class="collapse mb-3" id="collapseExample1">
                <div class="card card-body">
                    <div class="form-floating mb-3" id="selectUserFromDB">
                        <select name="postCreator" class="form-select" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected>Open to select Username</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" data-email="{{ $user->email }}">
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control" id="floatingInputDisabled"
                            placeholder="name@example.com" disabled>
                        <label for="floatingInputDisabled">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control" id="floatingPassword"
                            placeholder="Password">
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
                                <input name="newUsername" type="text" class="form-control" id="floatingInputGroup1"
                                    placeholder="Username">
                                <label for="floatingInputGroup1">Username</label>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="newEmail" type="email" class="form-control" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="newPassword" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                    </section>
                </div>
            </div>
            <button type="submit" id="submitButton" class="btn btn-success">Submit</button>
            <button type="button" id="signupAndPostButton" class="btn btn-success d-none">Signup and Post</button>
        </form>
    </div>
    <script>
        // script for get email from  user list and put it to create user form
        document.getElementById('floatingSelect').addEventListener('change', function() {
            let selectedOption = this.options[this.selectedIndex];
            let emailInput = document.getElementById('floatingInputDisabled');
            emailInput.value = selectedOption.getAttribute('data-email');
        });

        // script to handle login or create new account button action
        function toggleCollapse(id) {
            let collapseElement = document.getElementById(id);
            let otherCollapseElement = id === 'collapseExample1' ? document.getElementById('collapseExample2') : document
                .getElementById('collapseExample1');
            if (collapseElement.classList.contains('show')) {
                return;
            }
            collapseElement.classList.toggle('show');
            otherCollapseElement.classList.remove('show');

            // Show or hide buttons based on collapse state
            if (id === 'collapseExample2') {
                document.getElementById('submitButton').classList.add('d-none');
                document.getElementById('signupAndPostButton').classList.remove('d-none');
            } else {
                document.getElementById('submitButton').classList.remove('d-none');
                document.getElementById('signupAndPostButton').classList.add('d-none');
            }
        }
    </script>
@endsection
