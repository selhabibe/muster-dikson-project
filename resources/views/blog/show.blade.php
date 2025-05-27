@extends('.__base_main')

@section('meta')
    <meta name="description" content="{{ Str::limit(strip_tags($post->content), 160) }}">
    <meta name="keywords" content="blog beauté, coiffure professionnelle, {{ implode(', ', $post->tags->pluck('name')->toArray()) }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $post->title }} - Muster & Dikson">
    <meta property="og:description" content="{{ Str::limit(strip_tags($post->content), 160) }}">
    <meta property="og:image" content="{{ asset('storage/' . $post->image) }}">
    <meta property="article:published_time" content="{{ $post->published_at->toIso8601String() }}">
    <meta property="article:author" content="{{ $post->author->name }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $post->title }} - Muster & Dikson">
    <meta property="twitter:description" content="{{ Str::limit(strip_tags($post->content), 160) }}">
    <meta property="twitter:image" content="{{ asset('storage/' . $post->image) }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
@endsection

@section('content')
    <div class="page-wrapper">
        <main class="main">
            <!-- Hero Section -->
            <section class="post-hero-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('index')}}"><i class="fas fa-home"></i> Accueil</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('blog')}}">Blog</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>

            <div class="page-content with-sidebar">
                <div class="container">
                    <div class="row gutter-lg">
                        <div class="col-lg-9">

                            <article class="post-single">
                                <header class="post-header">
                                    <h1 class="post-title">{{ $post->title }}</h1>
                                    <div class="post-meta">
                                        <div class="post-meta-item">
                                            <i class="fas fa-user"></i>
                                            <span class="post-author">{{ $post->author->name }}</span>
                                        </div>
                                        <div class="post-meta-item">
                                            <i class="far fa-calendar-alt"></i>
                                            <span class="post-date">{{ $post->published_at->format('d M Y') }}</span>
                                        </div>
                                        <div class="post-meta-item">
                                            <i class="far fa-clock"></i>
                                            <span class="post-reading-time">{{ ceil(str_word_count($post->content) / 200) }} min de lecture</span>
                                        </div>
                                    </div>
                                </header>

                                <figure class="post-media">
                                    <img src="{{ asset('storage/' . $post->image) }}"
                                         alt="{{ $post->title }}"
                                         class="img-fluid rounded" />
                                    @if($post->category)
                                        <div class="post-category-badge">
                                            <span>{{ $post->category->name }}</span>
                                        </div>
                                    @endif
                                </figure>

                                <div class="post-content">
                                    <div class="post-body">
                                        <p>{{ $post->content }}</p>
                                    </div>

                                    <div class="post-tags">
                                        @foreach ($post->tags as $tag)
                                            <a href="#" class="post-tag">{{ $tag->name }}</a>
                                        @endforeach
                                    </div>

                                    <div class="post-share">
                                        <span class="share-label">Partager:</span>
                                        <div class="social-icons">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="social-icon facebook">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}" target="_blank" class="social-icon twitter">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" class="social-icon linkedin">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                            <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(url()->current()) }}&media={{ urlencode(asset('storage/' . $post->image)) }}&description={{ urlencode($post->title) }}" target="_blank" class="social-icon pinterest">
                                                <i class="fab fa-pinterest-p"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="post-author-box">
                                    <figure class="author-avatar">
                                        <i class="fas fa-user-circle"></i>
                                    </figure>
                                    <div class="author-info">
                                        <h4 class="author-name">{{ $post->author->name }}</h4>
                                        <p class="author-bio">Rédacteur professionnel spécialisé dans le domaine de la beauté et de la coiffure.</p>
                                    </div>
                                </div>
                            </article>

                            <!-- Related Posts Section -->
                            <section class="related-posts-section">
                                <h3 class="section-title">Articles similaires</h3>
                                <div class="row">
                                    @foreach ($relatedPosts as $relatedPost)
                                        <div class="col-md-4 mb-4">
                                            <div class="related-post-card">
                                                <div class="post-image">
                                                    <a href="{{ route('posts.show', $relatedPost->id) }}">
                                                        <img src="{{ asset('storage/' . $relatedPost->image) }}"
                                                            alt="{{ $relatedPost->title }}"
                                                            class="img-fluid rounded"
                                                            loading="lazy" />
                                                    </a>
                                                    <div class="post-date">
                                                        <span class="day">{{ $relatedPost->created_at->format('d') }}</span>
                                                        <span class="month">{{ $relatedPost->created_at->format('M') }}</span>
                                                    </div>
                                                </div>
                                                <div class="post-content">
                                                    <h4 class="post-title">
                                                        <a href="{{ route('posts.show', $relatedPost->id) }}">{{ $relatedPost->title }}</a>
                                                    </h4>
                                                    <p class="post-excerpt">{{ Str::limit($relatedPost->content, 80) }}</p>
                                                    <a href="{{ route('posts.show', $relatedPost->id) }}" class="read-more">
                                                        Lire la suite <i class="fas fa-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </section>


                        </div>
                        <aside class="col-lg-3">
                            <div class="blog-sidebar">
                                <!-- Search Widget -->
                                <div class="sidebar-widget search-widget">
                                    <form action="#" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Rechercher..." aria-label="Search">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Popular Posts Widget -->
                                <div class="sidebar-widget popular-posts-widget">
                                    <h3 class="widget-title">Articles populaires</h3>
                                    <div class="widget-content">
                                        @foreach ($popularPosts as $popularPost)
                                            <div class="popular-post">
                                                <div class="post-image">
                                                    <a href="{{ route('posts.show', $popularPost->id) }}">
                                                        <img src="{{ asset('storage/' . $popularPost->image) }}"
                                                             alt="{{ $popularPost->title }}"
                                                             class="img-fluid rounded"
                                                             loading="lazy" />
                                                    </a>
                                                </div>
                                                <div class="post-info">
                                                    <h4 class="post-title">
                                                        <a href="{{ route('posts.show', $popularPost->id) }}">{{ $popularPost->title }}</a>
                                                    </h4>
                                                    <div class="post-meta">
                                                        <span class="post-date">
                                                            <i class="far fa-calendar-alt"></i> {{ $popularPost->created_at->format('d M Y') }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Tags Widget -->
                                <div class="sidebar-widget tags-widget">
                                    <h3 class="widget-title">Tags</h3>
                                    <div class="widget-content">
                                        <div class="tags-cloud">
                                            @foreach ($post->tags as $tag)
                                                <a href="#" class="tag-link">{{ $tag->name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <!-- Newsletter Widget -->
                                <div class="sidebar-widget newsletter-widget">
                                    <h3 class="widget-title">Newsletter</h3>
                                    <div class="widget-content">
                                        <p>Abonnez-vous pour recevoir nos derniers articles et actualités.</p>
                                        <form action="{{ route('newsletter.subscribe') }}" method="post">
                                            @csrf
                                            <div class="input-group">
                                                <input type="email" class="form-control" name="email" placeholder="Votre email" required>
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fas fa-paper-plane"></i>
                                                </button>
                                            </div>
                                        </form>
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

    <style>
        /* Post Hero Section */
        .post-hero-section {
            padding: 2rem 0;
            background-color: #f8f9fa;
            margin-bottom: 3rem;
        }

        .breadcrumb {
            background-color: transparent;
            padding: 0;
            margin-bottom: 0;
        }

        .breadcrumb-item a {
            color: #1A2A3A;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb-item a:hover {
            color: #20c7d9;
        }

        .breadcrumb-item.active {
            color: #666;
        }

        /*.breadcrumb-item + .breadcrumb-item::before {*/
        /*    content: ">";*/
        /*    color: #999;*/
        /*}*/

        /* Post Single Styles */
        .post-single {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            margin-bottom: 3rem;
        }

        .post-header {
            padding: 2rem 2rem 1rem;
        }

        .post-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #1A2A3A;
            line-height: 1.3;
        }

        .post-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            color: #666;
        }

        .post-meta-item {
            display: flex;
            align-items: center;
            font-size: 1rem;
        }

        .post-meta-item i {
            margin-right: 0.5rem;
            color: #20c7d9;
        }

        .post-media {
            position: relative;
            margin-bottom: 2rem;
        }

        .post-media img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
        }

        .post-category-badge {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            color: #1A2A3A;
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: 600;
            z-index: 2;
        }

        .post-content {
            padding: 0 2rem 2rem;
        }

        .post-body {
            font-size: 1.2rem;
            line-height: 1.8;
            color: #444;
            margin-bottom: 2rem;
        }

        .post-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 2rem;
        }

        .post-tag {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #f5f5f5;
            color: #333;
            border-radius: 30px;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .post-tag:hover {
            background-color: #1A2A3A;
            color: white;
            transform: translateY(-2px);
        }

        .post-share {
            display: flex;
            align-items: center;
            padding-top: 1.5rem;
            border-top: 1px solid #eee;
        }

        .share-label {
            font-weight: 600;
            margin-right: 1rem;
            color: #1A2A3A;
        }

        .social-icons {
            display: flex;
            gap: 0.75rem;
        }

        .social-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-icon.facebook {
            background-color: #3b5998;
        }

        .social-icon.twitter {
            background-color: #1da1f2;
        }

        .social-icon.linkedin {
            background-color: #0077b5;
        }

        .social-icon.pinterest {
            background-color: #bd081c;
        }

        .social-icon:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        /* Author Box Styles */
        .post-author-box {
            display: flex;
            align-items: center;
            background-color: #f8f9fa;
            border-radius: 12px;
            padding: 2rem;
            margin-top: 3rem;
        }

        .author-avatar {
            flex-shrink: 0;
            margin-right: 1.5rem;
            font-size: 3.5rem;
            color: #1A2A3A;
        }

        .author-info {
            flex-grow: 1;
        }

        .author-name {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #1A2A3A;
        }

        .author-bio {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 0;
        }

        /* Related Posts Section */
        .related-posts-section {
            margin-top: 4rem;
            margin-bottom: 3rem;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color: #1A2A3A;
            position: relative;
            padding-bottom: 1rem;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 3px;
            background-color: #20c7d9;
        }

        .related-post-card {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            height: 100%;
            transition: all 0.3s ease;
        }

        .related-post-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .post-image {
            position: relative;
            overflow: hidden;
        }

        .post-image img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .related-post-card:hover .post-image img {
            transform: scale(1.05);
        }

        .post-date {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: #1A2A3A;
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            text-align: center;
            line-height: 1.2;
            z-index: 2;
        }

        .post-date .day {
            display: block;
            font-size: 1.3rem;
            font-weight: 700;
        }

        .post-date .month {
            display: block;
            font-size: 0.8rem;
            text-transform: uppercase;
        }

        .post-content {
            padding: 1.5rem;
        }

        .post-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .post-title a {
            color: #1A2A3A;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .post-title a:hover {
            color: #20c7d9;
        }

        .post-excerpt {
            font-size: 1rem;
            line-height: 1.6;
            color: #666;
            margin-bottom: 1.5rem;
        }

        .read-more {
            color: #1A2A3A;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .read-more i {
            margin-left: 0.5rem;
            transition: transform 0.3s ease;
        }

        .read-more:hover {
            color: #20c7d9;
        }

        .read-more:hover i {
            transform: translateX(5px);
        }

        /* Sidebar Styles */
        .blog-sidebar {
            position: sticky;
            top: 30px;
        }

        .sidebar-widget {
            background-color: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .widget-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #1A2A3A;
            position: relative;
            padding-bottom: 0.75rem;
        }

        .widget-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: #20c7d9;
        }

        .search-widget .input-group {
            border-radius: 30px;
            overflow: hidden;
        }

        .search-widget .form-control {
            border: none;
            padding: 0.75rem 1.5rem;
            background-color: #f5f5f5;
        }

        .search-widget .btn {
            background-color: #1A2A3A;
            border-color: #1A2A3A;
            padding: 0.75rem 1.25rem;
        }

        .search-widget .btn:hover {
            background-color: #20c7d9;
            border-color: #20c7d9;
        }

        .popular-post {
            display: flex;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #eee;
        }

        .popular-post:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .popular-post .post-image {
            flex-shrink: 0;
            width: 80px;
            height: 80px;
            margin-right: 1rem;
        }

        .popular-post .post-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .popular-post .post-info {
            flex-grow: 1;
        }

        .popular-post .post-title {
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .popular-post .post-meta {
            font-size: 0.8rem;
            margin-bottom: 0;
        }

        .tags-cloud {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .tag-link {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #f5f5f5;
            color: #333;
            border-radius: 30px;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .tag-link:hover {
            background-color: #1A2A3A;
            color: white;
            transform: translateY(-2px);
        }

        .newsletter-widget p {
            margin-bottom: 1rem;
            font-size: 1rem;
            color: #666;
        }

        .newsletter-widget .input-group {
            border-radius: 30px;
            overflow: hidden;
        }

        .newsletter-widget .form-control {
            border: none;
            padding: 0.75rem 1.5rem;
            background-color: #f5f5f5;
        }

        .newsletter-widget .btn {
            background-color: #1A2A3A;
            border-color: #1A2A3A;
            padding: 0.75rem 1.25rem;
        }

        .newsletter-widget .btn:hover {
            background-color: #20c7d9;
            border-color: #20c7d9;
        }

        /* Responsive Styles */
        @media (max-width: 991px) {
            .post-title {
                font-size: 2rem;
            }

            .post-body {
                font-size: 1.1rem;
            }

            .blog-sidebar {
                margin-top: 3rem;
            }
        }

        @media (max-width: 767px) {
            .post-title {
                font-size: 1.8rem;
            }

            .post-meta {
                flex-direction: column;
                gap: 0.5rem;
            }

            .post-header, .post-content {
                padding: 1.5rem;
            }

            .post-author-box {
                flex-direction: column;
                text-align: center;
            }

            .author-avatar {
                margin-right: 0;
                margin-bottom: 1rem;
            }

            .section-title {
                font-size: 1.5rem;
            }
        }
    </style>
@endsection('content')
