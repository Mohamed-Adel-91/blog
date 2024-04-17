<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    @include('home.homeCss')
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
        @include('home.header')
        <!-- banner section start -->
        @include('home.banner')
        <!-- banner section end -->
    </div>
    <!-- header section end -->
    <!-- blogs section start -->
    @include('home.blogs')
    <!-- blogs section end -->
    <!-- about section start -->
    @include('home.about')
    <!-- about section end -->
    <!-- video section start -->
    @include('home.video')
    <!-- video section end -->
    <!-- client section start -->
    @include('home.client')
    <!-- client section end -->
    <!-- choose section start -->
    @include('home.choose')
    <!-- choose section end -->
    <!-- footer section start -->
    @include('home.footer')
    <!-- footer section end -->
    <!-- copyright section start -->
    @include('home.copyRight')
    <!-- copyright section end -->
    <!-- Javascript files-->
    @include('home.scripts')
</body>

</html>
