<!DOCTYPE html>
<html lang="en">

<head>
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
            display: inline-block;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 25px;
            width: fit-content;
        }
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch ">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <h1 class="post_title">Show All Posts</h1>
            <div class="page-content div_center">
                <section class="no-padding-top">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="block">
                                    <div class="title">
                                        <strong>All Posts Table</strong>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Post title</th>
                                                    <th>Description</th>
                                                    <th>Posted By</th>
                                                    <th>Post Status</th>
                                                    <th>User Type</th>
                                                    <th>Image</th>
                                                    <th>Email</th>
                                                    <th>Created At</th>
                                                    <th>Updated At</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($posts as $post)
                                                    <tr>
                                                        <th scope="row">{{ $post->id }}</th>
                                                        <td>{{ $post->title }}</td>
                                                        <td>{{ $post->description }}</td>
                                                        <td>{{ $post->name }}</td>
                                                        <td>{{ $post->post_status }}</td>
                                                        <td>{{ $post->user_type }}</td>
                                                        <td>
                                                            <img src="uploads/images/{{ $post->image }}" alt=""
                                                                width=50 height=50 />
                                                        </td>
                                                        <td>{{ $post->email }}</td>
                                                        <td>{{ $post->created_at->format('Y-m-d') }}</td>
                                                        <td>{{ $post->updated_at->format('Y-m-d') }}</td>
                                                        <td style="display: inline-flex;">
                                                            <a href="{{ route('posts.show', $post->id) }}"
                                                                class="btn btn-info ">View</a>
                                                            <a href="{{ route('posts.edit', $post->id) }}"
                                                                class="btn btn-primary ">Edit</a>
                                                            <form action="{{ route('posts.destroy', $post->id) }}"
                                                                method="POST" class="d-inline delete_form">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button onclick="checker()" type="submit"
                                                                    class="btn btn-danger confirm_delete p-2">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <script>
                                                        function checker() {
                                                            var result = confirm("Are you sure to delete this post?");
                                                            if (result == false) {
                                                                event.preventDefault();
                                                            } else {
                                                                $('.delete_form').submit();
                                                            }
                                                        }
                                                    </script>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @include('admin.footer')
        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.scripts')
</body>

</html>
