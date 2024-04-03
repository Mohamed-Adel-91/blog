@extends('layouts.app')
@section('title')
    All Posts
@endsection
@section('content')
    <!-- All Posts Page content -->
    <div class="container mt-1">
        <div class="text-center py-4">
            <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
        </div>
        {{-- @dd($posts) --}}
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post['id'] }}</th>
                        <td>{{ $post['title'] }}</td>
                        <td>{{ $post['author'] }}</td>
                        <td>{{ $post['created_at'] }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post['id']) }}" class="btn btn-info">View</a>
                            <a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
