@extends('.__base_main')

@section('content')
    <div class="page-wrapper">
        <main class="main">
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}"><i class="d-icon-home"></i></a></li>
                        <li><a href="#" class="active">Blog</a></li>
                        <li>Post</li>
                    </ul>
                </div>
            </nav>
            <div class="page-content with-sidebar">
                <div class="container">
                    <div class="row gutter-lg">
                        <div class="col-lg-9">

                            <article class="post-single">
                                <figure class="post-media">
                                    <a href="#">
                                        <img src="{{ asset('storage/' . $post->image) }}"
                                             alt="{{ $post->title }}"
                                             style="object-fit: contain; width: 880px; height: 450px;" />
                                    </a>
                                </figure>
                                <div class="post-details">
                                    <div class="post-meta">
                                        par <a href="#" class="post-author">{{ $post->author->name }}</a>
                                        le <a href="#" class="post-date">{{ $post->published_at }}</a>
                                        {{-- | <a href="#" class="post-comment"><span>2</span> Commentaires</a> --}}
                                    </div>
                                    <h4 class="post-title"><a href="#">{{ $post->title }}</a></h4>
                                    <div class="post-body mb-7">
                                        <p class="mb-5">{{ $post->content }}</p>
                                    </div>
                                </div>

                                <div class="post-author-detail">
                                    <figure class="author-media">
                                        <i class="d-icon-user"></i>
                                    </figure>
                                    <div class="author-body">
                                        <div class="author-header d-flex justify-content-between align-items-center">
                                            <div>
                                                <span class="author-title">AUTEUR</span>
                                                <h4 class="author-name font-weight-bold mb-0">{{ $post->author->name }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <!-- End Page Navigation -->
                            <div class="related-posts">
                                <h3 class="title title-simple text-left text-normal font-weight-bold ls-normal">Related Posts</h3>
                                <div class="owl-carousel owl-theme row cols-lg-3 cols-sm-2" data-owl-options="{
        'items': 3,  // 3 posts to show at once
        'margin': 20,
        'loop': false,
        'responsive': {
            '576': {
                'items': 2  // Show 2 posts on mobile devices
            },
            '768': {
                'items': 3  // Show 3 posts on tablets and above
            }
        }
    }">
                                    @foreach ($relatedPosts as $relatedPost)
                                        <div class="post">
                                            <figure class="post-media">
                                                <a href="{{ route('posts.show', $relatedPost->id) }}">
                                                    <img
                                                        src="{{ asset('storage/' . $relatedPost->image) }}"
                                                        alt="{{ $relatedPost->title }}"
                                                        style="width: 380px; height: 250px; object-fit: contain;"
                                                    />
                                                </a>
                                                <div class="post-calendar">
                                                    <span class="post-day">{{ $relatedPost->created_at->format('d') }}</span>
                                                    <span class="post-month">{{ $relatedPost->created_at->format('M') }}</span>
                                                </div>
                                            </figure>
                                            <div class="post-details">
                                                <h4 class="post-title">
                                                    <a href="{{ route('posts.show', $relatedPost->id) }}">{{ $relatedPost->title }}</a>
                                                </h4>
                                                <p class="post-content">{{ Str::limit($relatedPost->body, 100) }}</p>
                                                <a href="{{ route('posts.show', $relatedPost->id) }}" class="btn btn-link btn-underline btn-primary">Read more<i class="d-icon-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                        </div>
                        <aside class="col-lg-3 right-sidebar sidebar-fixed sticky-sidebar-wrapper">
                            <div class="sidebar-overlay">
                            </div>
                            <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
                            <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-left"></i></a>
                            <div class="sidebar-content">
                                <div class="sticky-sidebar" data-sticky-options="{'top': 89, 'bottom': 70}">
                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title">Popular Posts</h3>
                                        <div class="widget-body">
                                            <div class="post-col">
                                                @foreach ($popularPosts as $popularPost)
                                                    <div class="post post-list-sm">
                                                        <figure class="post-media">
                                                            <a href="{{ route('posts.show', $popularPost->id) }}">
                                                                <img src="{{ asset('storage/' . $popularPost->image) }}" width="90" height="90" alt="{{ $popularPost->title }}" />
                                                            </a>
                                                        </figure>
                                                        <div class="post-details">
                                                            <div class="post-meta">
                                                                <a href="{{ route('posts.show', $popularPost->id) }}" class="post-date">{{ $popularPost->created_at->format('M d, Y') }}</a>
                                                            </div>
                                                            <h4 class="post-title">
                                                                <a href="{{ route('posts.show', $popularPost->id) }}">{{ $popularPost->title }}</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget widget-posts widget-collapsible">
                                        <h3 class="widget-title">Les tag</h3>
                                        <div class="widget-body">
                                            @foreach ($post->tags as $tag)
                                                <a href="" class="tag">{{ $tag->name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>

        </main>
        <!-- End Main -->
    </div>

@endsection('content')
