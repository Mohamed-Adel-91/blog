<nav id="sidebar">
    <!-- Sidebar Header-->
    <x-dropdown-link :href="route('profile.edit')">
        <div class="sidebar-header d-flex align-items-center">
            <div class="avatar">
                <img src="adminTemplate/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle" />
            </div>
            <div class="title mt-3 mb-0">
                <h1 class="h6">Mike Smith</h1>
                <p>Web Designer</p>
            </div>
        </div>
    </x-dropdown-link>
    <!-- Sidebar Navidation Menus-->
    <span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="active">
            <a href="index.html"> <i class="icon-home"></i>Home </a>
        </li>
        <li>
            <a href="{{ route('posts.index') }}">
                <i class="icon-padnote"></i>old version Posts
            </a>
        </li>
        <li>
            <a href="{{ url('post_page') }}">
                <i class="bi bi-building-add"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-building-add" viewBox="0 0 16 16">
                        <path
                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                        <path
                            d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1z" />
                        <path
                            d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                    </svg></i>Add Post
            </a>
        </li>
        <li>
            <a href="tables.html">
                <i class="icon-grid"></i>Tables
            </a>
        </li>
        <li>
            <a href="charts.html">
                <i class="fa fa-bar-chart"></i>Charts
            </a>
        </li>
        <li>
            <a href="forms.html">
                <i class="icon-padnote"></i>Forms
            </a>
        </li>
        <li>
            <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse">
                <i class="icon-windows"></i>Example dropdown
            </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled">
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
            </ul>
        </li>
        <li>
            <a href="login.html">
                <i class="icon-logout"></i>Login page
            </a>
        </li>
    </ul>
    <span class="heading">Extras</span>
    <ul class="list-unstyled">
        <li>
            <a href="#"> <i class="icon-settings"></i>Demo </a>
        </li>
        <li>
            <a href="#">
                <i class="icon-writing-whiteboard"></i>Demo
            </a>
        </li>
        <li>
            <a href="#"> <i class="icon-chart"></i>Demo </a>
        </li>
    </ul>
</nav>
