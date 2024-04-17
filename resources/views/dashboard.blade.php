<x-app-layout>
    <style>
        .post_title {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            color: #fff;
            padding: 30px;
        }

        .div_center {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 25px;

        }

        label {
            display: inline-block;
            width: 260px;
        }

        .form-control {
            color: #000;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Client Dashboard For add Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session()->has('message'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <h1 class="post_title">Add Posts</h1>
                    <div class="page-content">
                        <form action="{{ route('client_add_post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div
                                style="display: flex;
                            justify-content: flex-start;
                            align-items: center;
                            flex-wrap: nowrap;
                            flex-direction: column;
                            width: 100%;
                            height: 100%">
                                <div class="div_center">
                                    <label style="width: 100px; height: 100%;" for="title"
                                        class="form-label">Title</label>
                                    <input style="width: 900px; " type="text" id="title" name="title" required
                                        class="form-control" value="{{ old('title') }}" placeholder="Enter the title">
                                </div>
                                <div class="div_center">
                                    <label style="width: 100px; height: 100%;" for="description" class="form-label">Post
                                        Description</label>
                                    <textarea style="width: 900px; height: 300px;" id="description" name="description" required class="form-control"
                                        placeholder="Enter the description">{{ old('description') }}</textarea>
                                </div>
                                <div class="div_center">
                                    <label style="width: 100px; height: 100%;" for="image" class="form-label">Add
                                        Image</label>
                                    <input style="width: 900px;" type="file" id="image" name="image"
                                        class="form-control-img">
                                </div>
                            </div>

                            <div class="div_center">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
