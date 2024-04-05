@extends('layouts.app')
@section('title')
    Post View
@endsection
@section('content')
    <!-- one Post Page content -->
    <section class="pt-4 pb-4">
        <div class='container pt-4 pb-4'>
            <div class="card">
                <div class="card-header">
                    Post Info No. {{ $post->id }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Title : {{ $post->title }} </h5>
                    <p class="card-text">Description: {{ $post->description }}</p>
                </div>
            </div>
        </div>
        <div class='container pt-4 pb-4'>
            <div class="card">
                <div class="card-header">
                    Post Creator Info
                </div>
                <div class="card-body">
                    <h5 class="card-title">Name : {{ $post->user }}</h5>
                    <p class="card-title">Email : {{ $post->email }}</p>
                    <p class="card-text">Created At : {{ $post->created_at }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
