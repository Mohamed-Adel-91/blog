<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.adminCss')
    {{-- @yield('css') --}}
</head>

<body>
    @include('admin.header')
    {{-- @yield('header') --}}
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        {{-- @yield('sidebar') --}}
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            @include('admin.body')
            {{-- @yield('main_content') --}}
            @include('admin.footer')
            {{-- @yield('footer') --}}
        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.scripts')
    {{-- @yield('script') --}}
</body>

</html>
