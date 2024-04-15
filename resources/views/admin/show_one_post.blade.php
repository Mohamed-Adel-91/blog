<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public" />
    @include('admin.adminCss')
    <style>
        .div_center {
            display: inline-block;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 25px;
            width: fit-content;
        }
    </style>
    <script>
        function toggleDescription() {
            var description = document.getElementById('fullDescription');
            var toggleButton = document.getElementById('toggleDescriptionButton');
            var descriptionText = description.textContent.trim();

            if (toggleButton.textContent === 'Show Less') {
                description.style.whiteSpace = 'nowrap';
                description.style.overflow = 'hidden';
                toggleButton.textContent = 'Show More';
            } else {
                description.style.whiteSpace = 'wrap';
                description.style.overflow = 'visible';
                toggleButton.textContent = 'Show Less';
            }
        };
        // Check description length on page load
        window.onload = function() {
            var description = document.getElementById('fullDescription');
            var toggleButton = document.getElementById('toggleDescriptionButton');
            var descriptionText = description.textContent.trim();

            if (descriptionText.length >= 120) {
                toggleButton.style.display = 'inline-block'; // Show the button
            }
        };
    </script>
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
            @if (session()->has('message'))
                <div class="alert alert-info" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <section class="pt-4 pb-4">
                <div class='container pt-4 pb-4'>
                    <div class="card">
                        <div class="card-header">
                            Post Info No. {{ $post->id }}
                        </div>
                        <div class="card mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="/uploads/images/{{ $post->image }}" class="img-fluid rounded-start"
                                        height="350px" width="350px" alt="...">
                                </div>
                                <div class="card-body" style="overflow: hidden; padding: 35px;">
                                    <h5 class="card-title">
                                        <strong>Title: </strong> {{ $post->title }}
                                    </h5>
                                    <div class="card-text d-inline " style="overflow: hidden;">
                                        <p id="fullDescription" class="card-text"
                                            style="white-space: nowrap;
                                                overflow: hidden;
                                                text-overflow: ellipsis;
                                                padding-bottom: 0px;">
                                            <strong>Description: </strong> {{ $post->description }}
                                        </p>
                                        <button id="toggleDescriptionButton" class="btn btn-link"
                                            onclick="toggleDescription()"
                                            style="display: none; outline:none; box-shadow:none; padding-top:0px;">Show
                                            More</button>
                                    </div>
                                    <p class="card-text"><strong>Created At: </strong> {{ $post->created_at }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='container pt-4 pb-4'>
                    <div class="card">
                        <div class="card-header">
                            Post Creator Info
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><strong>Name: </strong>
                                {{ $post->user ? $post->user->name : 'not found' }}</h5>
                            <p class="card-title"><strong>Email: </strong>
                                {{ $post->user ? $post->user->email : 'not found' }}</p>
                            <p class="card-text"><strong>Updated At: </strong> {{ $post->updated_at }}</p>
                        </div>
                    </div>
                    <div class="div_center" style="display: inline-flex;">
                        <div class="div_center" style="padding: 5px;">
                            <a href="{{ url('show_post') }}" class="btn btn-info ">Show All Posts</a>
                        </div>
                        <div style="padding: 5px;">
                            <a href="{{ url('edit_page', $post->id) }}" class="btn btn-success ">Edit</a>
                        </div>
                        <div style=" padding: 5px;">
                            <form id="delete_form_{{ $post->id }}" action="{{ url('delete_post', $post->id) }}"
                                method="POST" class="d-inline delete_form">
                                @csrf
                                @method('DELETE')
                                <button onclick="checker(event,{{ $post->id }})" type="submit"
                                    class="btn btn-danger confirm_delete p-2">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            @include('admin.footer')
        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.scripts')
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
</body>

</html>
