<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public" />
    @include('admin.adminCss')
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
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="container">
                <h1 class="post_title">Update post no. {{ $post->id }}</h1>
                <form method="POST" action="{{ url('update_post', $post->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    @csrf
                    @method('PUT')
                    <div class="div_center form-floating mb-3">
                        <label for="floatingTextarea1">Title</label>
                        <input name="title" value="{{ $post->title }}" class="form-control"
                            id="floatingTextarea1"></input>
                    </div>
                    <div class="div_center form-floating mb-3">
                        <label for="floatingTextarea2">Description</label>
                        <textarea name="description" class="form-control" id="floatingTextarea2" style="height: 200px">{{ $post->description }}</textarea>
                    </div>
                    <div class="div_center">
                        <label for="oldImage" class="form-label">old Image</label>
                        <img height="250px" id="oldImage" width="250px" src="/uploads/images/{{ $post->image }}"
                            alt="...">
                    </div>
                    <div class="div_center">
                        <label for="image" class="form-label">Update old Image</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                    <div class="div_center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
            @include('admin.footer')
        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.scripts')
</body>

</html>
