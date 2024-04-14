<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.adminCss')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                <div class="alert alert-danger" role="alert">
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
                                                            <div style="padding: 5px;">
                                                                <a href="{{ url('edit_page', $post->id) }}"
                                                                    class="btn btn-success ">Edit</a>
                                                            </div>
                                                            <div style=" padding: 5px;">
                                                                <form id="delete_form_{{ $post->id }}"
                                                                    action="{{ url('delete_post', $post->id) }}"
                                                                    method="POST" class="d-inline delete_form">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button
                                                                        onclick="checker(event,{{ $post->id }})"
                                                                        type="submit"
                                                                        class="btn btn-danger confirm_delete p-2">Delete</button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <script type="text/javascript">
                                                        function checker(ev, postId) {
                                                            ev.preventDefault();
                                                            var urlToRedirect = ev.currentTarget.getAttribute('href');
                                                            swal({
                                                                title: 'Are you sure to delete this post?',
                                                                text: "You won't be able to revert this!",
                                                                icon: 'warning',
                                                                buttons: true,
                                                                dangerMode: true,
                                                            }).then((willDelete) => {
                                                                if (willDelete) {
                                                                    var form = $('#delete_form_' + postId);
                                                                    form.submit();
                                                                } else {
                                                                    swal("Your data is safe!");
                                                                }
                                                            });
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
                <div class="div_center">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item {{ $posts->currentPage() == 1 ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $posts->previousPageUrl() }}">Previous</a>
                            </li>
                            @for ($i = 1; $i <= $posts->lastPage(); $i++)
                                <li class="page-item {{ $posts->currentPage() == $i ? ' active' : '' }}">
                                    <a class="page-link" href="{{ $posts->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item {{ $posts->currentPage() == $posts->lastPage() ? ' disabled' : '' }}">
                                <a class="page-link" href="{{ $posts->nextPageUrl() }}">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            @include('admin.footer')
        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.scripts')
</body>

</html>
