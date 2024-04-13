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
            <h1 class="post_title">add posts</h1>
            <div class="page-content">
                <form action="{{ url('add_post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_center">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title" required class="form-control"
                            placeholder="Enter the title">
                    </div>
                    <div class="div_center">
                        <label for="description" class="form-label">Post Description</label>
                        <textarea id="description" name="description" required class="form-control" placeholder="Enter the description"></textarea>
                    </div>
                    <div class="div_center">
                        <label for="image" class="form-label">Add Image</label>
                        <input type="file" id="image" name="image" required class="form-control">
                    </div>
                    <div class="div_center">
                        <input type="submit" class="btn btn-primary">
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