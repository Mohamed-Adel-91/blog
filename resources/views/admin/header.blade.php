{{-- @extends('admin.homeAdmin') --}}
{{-- @section('header') --}}
<header class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
            <div class="search-inner d-flex align-items-center justify-content-center">
                <div class="close-btn">
                    Close <i class="fa fa-close"></i>
                </div>
                <form id="searchForm" action="#">
                    <div class="form-group">
                        <input type="search" name="search" placeholder="What are you searching for..." />
                        <button type="submit" class="submit">
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="navbar-header">
                <!-- Navbar Header--><a href="/dashboardAdmin" class="navbar-brand">
                    <div class="brand-text brand-big visible text-uppercase">
                        <strong class="text-primary">Admin</strong><strong>Dashboard</strong>
                    </div>
                    <div class="brand-text brand-sm">
                        <strong class="text-primary">A</strong><strong>D</strong>
                    </div>
                </a>
                <!-- Sidebar Toggle Btn-->
                <button class="sidebar-toggle">
                    <i class="fa fa-long-arrow-left"></i>
                </button>
            </div>
            <div class="right-menu list-inline no-margin-bottom">
                <div class="list-inline-item">
                    <a href="#" class="search-open nav-link"><i class="icon-magnifying-glass-browser"></i></a>
                </div>
                <div class="list-inline-item dropdown">
                    <a id="navbarDropdownMenuLink1" href="#" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" class="nav-link messages-toggle">
                        <i class="icon-email"></i><span class="badge dashbg-1">{{ $pendingPosts->count() }}</span>
                    </a>
                    <div aria-labelledby="navbarDropdownMenuLink1" class="dropdown-menu messages">
                        @foreach ($pendingPosts as $post)
                            <a href="#" class="dropdown-item message d-flex align-items-center">
                                <div class="profile">
                                    <img src="/img/user.png" alt="..." class="img-fluid" />
                                    <div class="status online"></div>
                                </div>
                                <div class="content">
                                    <strong class="d-block">{{ $post->name }}</strong>
                                    <span class="d-block">{{ $post->title }}</span>
                                    <small class="date d-block">{{ $post->created_at->format('h:i a') }}</small>
                                </div>
                            </a>
                        @endforeach
                        <a href="{{ url('show_post') }}" class="dropdown-item text-center message">
                            <strong>See All Pending Posts
                                <i class="fa fa-angle-right"></i></strong>
                        </a>
                    </div>
                </div>


                <!-- Tasks-->
                {{-- <div class="list-inline-item dropdown">
                    <a id="navbarDropdownMenuLink2" href="http://example.com" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" class="nav-link tasks-toggle"><i
                            class="icon-new-file"></i><span class="badge dashbg-3">9</span></a>
                    <div aria-labelledby="navbarDropdownMenuLink2" class="dropdown-menu tasks-list">
                        <a href="#" class="dropdown-item">
                            <div class="text d-flex justify-content-between">
                                <strong>Task 1</strong><span>40% complete</span>
                            </div>
                            <div class="progress">
                                <div role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0"
                                    aria-valuemax="100" class="progress-bar dashbg-1"></div>
                            </div>
                        </a><a href="#" class="dropdown-item">
                            <div class="text d-flex justify-content-between">
                                <strong>Task 2</strong><span>20% complete</span>
                            </div>
                            <div class="progress">
                                <div role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                    aria-valuemax="100" class="progress-bar dashbg-3"></div>
                            </div>
                        </a><a href="#" class="dropdown-item">
                            <div class="text d-flex justify-content-between">
                                <strong>Task 3</strong><span>70% complete</span>
                            </div>
                            <div class="progress">
                                <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0"
                                    aria-valuemax="100" class="progress-bar dashbg-2"></div>
                            </div>
                        </a><a href="#" class="dropdown-item">
                            <div class="text d-flex justify-content-between">
                                <strong>Task 4</strong><span>30% complete</span>
                            </div>
                            <div class="progress">
                                <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0"
                                    aria-valuemax="100" class="progress-bar dashbg-4"></div>
                            </div>
                        </a><a href="#" class="dropdown-item">
                            <div class="text d-flex justify-content-between">
                                <strong>Task 5</strong><span>65% complete</span>
                            </div>
                            <div class="progress">
                                <div role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                                    aria-valuemax="100" class="progress-bar dashbg-1"></div>
                            </div>
                        </a><a href="#" class="dropdown-item text-center">
                            <strong>See All Tasks
                                <i class="fa fa-angle-right"></i></strong></a>
                    </div>
                </div> --}}
                <!-- Tasks end-->
                <!-- Megamenu-->
                {{-- <div class="list-inline-item dropdown menu-large">
                    <a href="#" data-toggle="dropdown" class="nav-link">Mega <i class="fa fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu megamenu">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <strong class="text-uppercase">Elements Heading</strong>
                                <ul class="list-unstyled mb-3">
                                    <li>
                                        <a href="#">Lorem ipsum dolor</a>
                                    </li>
                                    <li>
                                        <a href="#">Sed ut perspiciatis</a>
                                    </li>
                                    <li>
                                        <a href="#">Voluptatum deleniti</a>
                                    </li>
                                    <li><a href="#">At vero eos</a></li>
                                    <li>
                                        <a href="#">Consectetur adipiscing</a>
                                    </li>
                                    <li>
                                        <a href="#">Duis aute irure</a>
                                    </li>
                                    <li>
                                        <a href="#">Necessitatibus saepe</a>
                                    </li>
                                    <li>
                                        <a href="#">Maiores alias</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <strong class="text-uppercase">Elements Heading</strong>
                                <ul class="list-unstyled mb-3">
                                    <li>
                                        <a href="#">Lorem ipsum dolor</a>
                                    </li>
                                    <li>
                                        <a href="#">Sed ut perspiciatis</a>
                                    </li>
                                    <li>
                                        <a href="#">Voluptatum deleniti</a>
                                    </li>
                                    <li><a href="#">At vero eos</a></li>
                                    <li>
                                        <a href="#">Consectetur adipiscing</a>
                                    </li>
                                    <li>
                                        <a href="#">Duis aute irure</a>
                                    </li>
                                    <li>
                                        <a href="#">Necessitatibus saepe</a>
                                    </li>
                                    <li>
                                        <a href="#">Maiores alias</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <strong class="text-uppercase">Elements Heading</strong>
                                <ul class="list-unstyled mb-3">
                                    <li>
                                        <a href="#">Lorem ipsum dolor</a>
                                    </li>
                                    <li>
                                        <a href="#">Sed ut perspiciatis</a>
                                    </li>
                                    <li>
                                        <a href="#">Voluptatum deleniti</a>
                                    </li>
                                    <li><a href="#">At vero eos</a></li>
                                    <li>
                                        <a href="#">Consectetur adipiscing</a>
                                    </li>
                                    <li>
                                        <a href="#">Duis aute irure</a>
                                    </li>
                                    <li>
                                        <a href="#">Necessitatibus saepe</a>
                                    </li>
                                    <li>
                                        <a href="#">Maiores alias</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <strong class="text-uppercase">Elements Heading</strong>
                                <ul class="list-unstyled mb-3">
                                    <li>
                                        <a href="#">Lorem ipsum dolor</a>
                                    </li>
                                    <li>
                                        <a href="#">Sed ut perspiciatis</a>
                                    </li>
                                    <li>
                                        <a href="#">Voluptatum deleniti</a>
                                    </li>
                                    <li><a href="#">At vero eos</a></li>
                                    <li>
                                        <a href="#">Consectetur adipiscing</a>
                                    </li>
                                    <li>
                                        <a href="#">Duis aute irure</a>
                                    </li>
                                    <li>
                                        <a href="#">Necessitatibus saepe</a>
                                    </li>
                                    <li>
                                        <a href="#">Maiores alias</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row megamenu-buttons text-center">
                            <div class="col-lg-2 col-md-4">
                                <a href="#" class="d-block megamenu-button-link dashbg-1"><i
                                        class="fa fa-clock-o"></i><strong>Demo 1</strong></a>
                            </div>
                            <div class="col-lg-2 col-md-4">
                                <a href="#" class="d-block megamenu-button-link dashbg-2"><i
                                        class="fa fa-clock-o"></i><strong>Demo 2</strong></a>
                            </div>
                            <div class="col-lg-2 col-md-4">
                                <a href="#" class="d-block megamenu-button-link dashbg-3"><i
                                        class="fa fa-clock-o"></i><strong>Demo 3</strong></a>
                            </div>
                            <div class="col-lg-2 col-md-4">
                                <a href="#" class="d-block megamenu-button-link dashbg-4"><i
                                        class="fa fa-clock-o"></i><strong>Demo 4</strong></a>
                            </div>
                            <div class="col-lg-2 col-md-4">
                                <a href="#" class="d-block megamenu-button-link bg-danger"><i
                                        class="fa fa-clock-o"></i><strong>Demo 5</strong></a>
                            </div>
                            <div class="col-lg-2 col-md-4">
                                <a href="#" class="d-block megamenu-button-link bg-info"><i
                                        class="fa fa-clock-o"></i><strong>Demo 6</strong></a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- Megamenu end     -->
                <!-- Languages dropdown    -->
                <div class="list-inline-item dropdown">
                    <a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img
                            style="width: 20px; height: 20px;" src="adminTemplate/img/flags/united-states.png"
                            alt="English" /><span class="d-none d-sm-inline-block ">English</span></a>
                    <div aria-labelledby="languages" class="dropdown-menu">
                        <a rel="nofollow" href="#" class="dropdown-item">
                            <img src="adminTemplate/img/flags/germany.png" style="width: 20px; height: 20px;"
                                alt="German" class="mr-2" /><span>German</span></a><a rel="nofollow" href="#"
                            class="dropdown-item">
                            <img src="adminTemplate/img/flags/france.png" style="width: 20px; height: 20px;"
                                alt="French" class="mr-2" /><span>French
                            </span></a><a rel="nofollow" href="#" class="dropdown-item">
                            <img src="adminTemplate/img/flags/egypt.png" style="width: 20px; height: 20px;"
                                alt="Arabic" class="mr-2" /><span>Arabic
                            </span></a>
                    </div>
                </div>
                <!-- Log out               -->
                <div class="list-inline-item logout">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</header>
{{-- @endsection --}}
