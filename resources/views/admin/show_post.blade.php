<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.adminCss')
    @include('admin.show_post_css')
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch ">
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
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <h1 class="post_title">Show All Posts</h1>
            <div class="page-content div_center">
                <div class="sidebar">
                    <!-- Existing sidebar content (e.g., navigation links, user profile) -->

                    <!-- Add the filter form here -->
                    <form action="{{ route('filter_posts') }}" method="GET">
                        @csrf
                        @method('GET')
                        <div class="form-row">
                            <div class="form-group col-md-2"> <!-- Adjusted the width to fit the sidebar -->
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ old('title') }}">
                            </div>
                            <div class="form-group col-md-2"> <!-- Adjusted the width to fit the sidebar -->
                                <label for="post_status">Post Status</label>
                                <select class="form-control" id="post_status" name="post_status">
                                    <option value="" {{ old('post_status') == '' ? 'selected' : '' }}>Show all
                                        Status</option>
                                    <option value="Active" {{ old('post_status') == 'Active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="Pending" {{ old('post_status') == 'Pending' ? 'selected' : '' }}>
                                        Pending</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2"> <!-- Adjusted the width to fit the sidebar -->
                                <label for="sort_by">Sort By</label>
                                <select class="form-control" id="sort_by" name="sort_by">
                                    <option value="created_at" {{ old('sort_by') == 'created_at' ? 'selected' : '' }}>
                                        Created At</option>
                                    <option value="updated_at" {{ old('sort_by') == 'updated_at' ? 'selected' : '' }}>
                                        Updated At</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2"> <!-- Adjusted the width to fit the sidebar -->
                                <label for="sort_order">Sort Order</label>
                                <select class="form-control" id="sort_order" name="sort_order">
                                    <option value="desc" {{ old('sort_order') == 'desc' ? 'selected' : '' }}>
                                        Descending</option>
                                    <option value="asc" {{ old('sort_order') == 'asc' ? 'selected' : '' }}>Ascending
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-2"> <!-- Adjusted the width to fit the sidebar -->
                                <label for="start_date">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date"
                                    value="{{ old('start_date') }}">
                            </div>
                            <div class="form-group col-md-2"> <!-- Adjusted the width to fit the sidebar -->
                                <label for="end_date">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date"
                                    value="{{ old('end_date') }}">
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-info btn-lg mt-4">Filter</button>
                            </div>
                        </div>
                    </form>

                    <!-- Existing sidebar content -->
                </div>
                <section class="no-padding-top">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="block">
                                    <div class="title">
                                        <strong>All Posts Table</strong>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-sm">
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
                                                        <td>{{ Str::limit($post->description, 50) }}</td>
                                                        <td>{{ $post->name }}</td>
                                                        <td
                                                            style="color: {{ $post->post_status == 'Active' ? 'green' : ($post->post_status == 'Pending' ? 'red' : 'black') }}">
                                                            {{ $post->post_status }}</td>
                                                        <td>{{ $post->user_type }}</td>
                                                        <td>
                                                            <img src="uploads/images/{{ $post->image }}"
                                                                alt="" width=50 height=50 />
                                                        </td>
                                                        <td>{{ $post->email }}</td>
                                                        <td>{{ $post->created_at->format('Y-m-d') }}</td>
                                                        <td>{{ $post->updated_at->format('Y-m-d') }}</td>
                                                        <td>
                                                            <div style=" padding: 5px;">
                                                                <!-- Dropdown list to select an action -->
                                                                <select class="form-control action-select"
                                                                    onchange="showButton(this, {{ $post->id }})">
                                                                    <option value="" selected disabled>Select
                                                                        action</option>
                                                                    <option value="view">View</option>
                                                                    <option value="edit">Edit</option>
                                                                    <option value="delete">Delete</option>
                                                                    <option value="accept">Accept</option>
                                                                    <option value="reject">Reject</option>
                                                                </select>
                                                            </div>
                                                            <!-- Buttons for different actions, initially hidden -->
                                                            <div id="viewButton_{{ $post->id }}"
                                                                class="btn-wrapper" style="display: none;">
                                                                <a href="{{ url('show_one_post', $post->id) }}"
                                                                    class="btn btn-info">View</a>
                                                            </div>
                                                            <div id="editButton_{{ $post->id }}"
                                                                class="btn-wrapper" style="display: none;">
                                                                <a href="{{ url('edit_page', $post->id) }}"
                                                                    class="btn btn-primary">Edit</a>
                                                            </div>
                                                            <div id="deleteButton_{{ $post->id }}"
                                                                class="btn-wrapper" style="display: none;">
                                                                <form id="delete_form_{{ $post->id }}"
                                                                    action="{{ url('delete_post', $post->id) }}"
                                                                    method="POST" class="d-inline delete_form">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button
                                                                        onclick="checker(event, {{ $post->id }})"
                                                                        type="submit"
                                                                        class="btn btn-danger confirm_delete p-2">Delete</button>
                                                                </form>
                                                            </div>
                                                            <form id="acceptButton_{{ $post->id }}"
                                                                class="btn-wrapper" method="POST"
                                                                style="display: none;"
                                                                action="{{ url('accept_post', $post->id) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <button class="btn btn-success">Accept</button>
                                                            </form>
                                                            <form id="rejectButton_{{ $post->id }}"
                                                                class="btn-wrapper" method="POST"
                                                                style="display: none;"
                                                                action="{{ url('reject_post', $post->id) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <button class="btn btn-danger">Reject</button>
                                                            </form>
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
                                                        // Function to show the selected button and hide the others
                                                        function showButton(selectElement, postId) {
                                                            // Get the selected value from the dropdown list
                                                            var selectedAction = selectElement.value;

                                                            // Define the button wrapper IDs for each action
                                                            var buttonWrappers = ['viewButton_', 'editButton_', 'deleteButton_', 'acceptButton_', 'rejectButton_'];

                                                            // Hide all button wrappers
                                                            buttonWrappers.forEach(function(buttonWrapper) {
                                                                document.getElementById(buttonWrapper + postId).style.display = 'none';
                                                            });

                                                            // Show the selected button wrapper
                                                            if (selectedAction) {
                                                                document.getElementById(selectedAction + 'Button_' + postId).style.display = 'block';
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
                            <li
                                class="page-item {{ $posts->currentPage() == $posts->lastPage() ? ' disabled' : '' }}">
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
