<div class="services_section layout_padding">
    <div class="container">
        <h1 class="services_taital">Blog Posts</h1>
        <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority
            have suffered alteration</p>
        <div class="services_section_2">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4">
                        <div class="card">
                            <div>
                                <img src="uploads/images/{{ $post->image }}" class="services_img" style="height: 250px;"
                                    alt="...">
                            </div>
                            <div class="card-body text-center">
                                <h2 class="card-title" style="height: 70px;">{{ $post->title }}</h2>
                                <footer class="blockquote-footer">Created By :
                                    <cite title="Source Title">{{ $post->name }}</cite>
                                </footer>
                            </div>
                            <div class="btn_main" style="padding-top: 20px;">
                                <a href="{{ url('blog_details', $post->id) }}">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
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
    </div>
</div>
