@extends('.__base')

@section('meta')
    <meta name="description" content="Découvrez les dernières tendances et actualités du monde de la coiffure et de la beauté sur le blog Muster & Dikson.">
    <meta name="keywords" content="blog beauté, coiffure professionnelle, produits capillaires, tendances beauté, Muster, Dikson">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Blog - Muster & Dikson">
    <meta property="og:description" content="Découvrez les dernières tendances et actualités du monde de la coiffure et de la beauté sur le blog Muster & Dikson.">
    <meta property="og:image" content="{{ asset('images/front/blog-og-image.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Blog - Muster & Dikson">
    <meta property="twitter:description" content="Découvrez les dernières tendances et actualités du monde de la coiffure et de la beauté sur le blog Muster & Dikson.">
    <meta property="twitter:image" content="{{ asset('images/front/blog-og-image.jpg') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
@endsection

@section('content')
    <div class="page-wrapper">
        <main class="main">
            <!-- Hero Section -->
            <section class="blog-hero-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h1 class="blog-hero-title">Notre Blog</h1>
                            <p class="blog-hero-subtitle">Découvrez les dernières tendances et actualités du monde de la coiffure et de la beauté</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Category Filter Section -->
            <section class="blog-category-section">
                <div class="container">
                    <div class="blog-categories">
                        <a href="{{ route('blog') }}" class="blog-category-item active">Tous</a>
                        <a href="#" class="blog-category-item">Coiffure</a>
                        <a href="#" class="blog-category-item">Soins</a>
                        <a href="#" class="blog-category-item">Tendances</a>
                        <a href="#" class="blog-category-item">Conseils</a>
                    </div>
                </div>
            </section>

            <!-- Blog Posts Section -->
            <section class="blog-posts-section">
                <div class="container">
                    <div class="row blog-grid">
                        @foreach($posts as $post)
                            <div class="col-lg-4 col-md-6 mb-4 blog-grid-item">
                                <article class="blog-card">
                                    <div class="blog-image">
                                        <a href="{{ route('posts.show', $post->id) }}">
                                            <img src="{{ asset('storage/' . $post->image) }}"
                                                 alt="{{ $post->title }}"
                                                 class="img-fluid lazy-load"
                                                 loading="lazy">
                                        </a>
                                        <div class="blog-date">
                                            <span class="day">{{ $post->created_at->format('d') }}</span>
                                            <span class="month">{{ $post->created_at->format('M') }}</span>
                                        </div>
                                        @if($post->category)
                                            <div class="blog-category-badge">
                                                <span>{{ $post->category->name }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="blog-content">
                                        <h2 class="blog-title">
                                            <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                                        </h2>
                                        <div class="blog-meta">
                                            <span class="blog-author">
                                                <i class="fas fa-user"></i> {{ $post->author->name }}
                                            </span>
                                            <span class="blog-reading-time">
                                                <i class="far fa-clock"></i> {{ ceil(str_word_count($post->content) / 200) }} min
                                            </span>
                                        </div>
                                        <p class="blog-excerpt">{{ Str::limit($post->content, 150) }}</p>
                                        <a href="{{ route('posts.show', $post->id) }}" class="blog-link">
                                            En savoir plus <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-wrapper">
                        {{ $posts->links() }}
                    </div>
                </div>
            </section>

            <!-- Newsletter Section -->
            <section class="blog-newsletter-section">
                <div class="container">
                    <div class="newsletter-container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="newsletter-content">
                                    <h2 class="newsletter-title">Restez informé</h2>
                                    <p class="newsletter-description">Abonnez-vous à notre newsletter pour recevoir les dernières nouvelles, conseils professionnels et offres exclusives.</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <form action="{{ route('newsletter.subscribe') }}" method="post" class="px-4">
                                    @csrf
                                    <div class="d-flex gap-2">
                                        <input type="email" class="form-control stylish-input flex-grow-1" name="email" id="newsletter-email"
                                            placeholder="Votre adresse email" required value="{{ old('email') }}">
                                        <button class="btn btn-primary stylish-button" type="submit">S'abonner</button>
                                    </div>
                                    <div class="form-check mt-3 text-start">
                                        <input class="form-check-input" type="checkbox" id="privacy-check" name="privacy_check" required>
                                        <label class="form-check-label small text-white" for="privacy-check">
                                            J'accepte de recevoir des informations par email
                                        </label>
                                    </div>

                                    @if ($errors->any())
                                        <div class="alert alert-danger mt-3">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @if (session('success'))
                                        <div class="alert alert-success mt-3">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if (session('info'))
                                        <div class="alert alert-info mt-3">
                                            {{ session('info') }}
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

    <style>
        /* Blog Hero Section Styles */
        .blog-hero-section {
            padding: 6rem 0;
            background-color: #1A2A3A;
            background-image: linear-gradient(rgba(26, 42, 58, 0.85), rgba(26, 42, 58, 0.85)), url('{{asset('images/demos/demo-beauty/page-header.jpg')}}');
            background-size: cover;
            background-position: center;
            color: white;
            margin-bottom: 3rem;
        }

        .blog-hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: white;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .blog-hero-subtitle {
            font-size: 1.5rem;
            max-width: 700px;
            margin: 0 auto;
            opacity: 0.9;
        }

        /* Category Filter Styles */
        .blog-category-section {
            margin-bottom: 3rem;
        }

        .blog-categories {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .blog-category-item {
            display: inline-block;
            padding: 0.6rem 1.5rem;
            border-radius: 30px;
            background-color: #f5f5f5;
            color: #333;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .blog-category-item:hover, .blog-category-item.active {
            background-color: #1A2A3A;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        /* Blog Grid Styles */
        .blog-grid {
            margin-bottom: 4rem;
        }

        .blog-grid-item {
            margin-bottom: 2rem;
        }

        /* Blog Card Styles */
        .blog-card {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            height: 100%;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .blog-image {
            position: relative;
            overflow: hidden;
        }

        .blog-image img {
            width: 100%;
            height: 240px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .blog-card:hover .blog-image img {
            transform: scale(1.05);
        }

        .blog-date {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: #1A2A3A;
            color: white;
            padding: 10px 15px;
            border-radius: 8px;
            text-align: center;
            line-height: 1.2;
            z-index: 2;
        }

        .blog-date .day {
            display: block;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .blog-date .month {
            display: block;
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        .blog-category-badge {
            position: absolute;
            bottom: 15px;
            right: 15px;
            background-color: rgba(255, 255, 255, 0.9);
            color: #1A2A3A;
            padding: 5px 15px;
            border-radius: 30px;
            font-size: 0.9rem;
            font-weight: 600;
            z-index: 2;
        }

        .blog-content {
            padding: 1.8rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .blog-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .blog-title a {
            color: #1A2A3A;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .blog-title a:hover {
            color: #20c7d9;
        }

        .blog-meta {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            color: #666;
        }

        .blog-meta i {
            margin-right: 0.5rem;
            color: #20c7d9;
        }

        .blog-excerpt {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #666;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        .blog-link {
            color: #1A2A3A;
            font-weight: 600;
            font-size: 1.1rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
            margin-top: auto;
        }

        .blog-link i {
            margin-left: 0.5rem;
            transition: transform 0.3s ease;
        }

        .blog-link:hover {
            color: #20c7d9;
        }

        .blog-link:hover i {
            transform: translateX(5px);
        }

        /* Pagination Styles */
        .pagination-wrapper {
            margin-top: 3rem;
            display: flex;
            justify-content: center;
        }

        .pagination {
            display: flex;
            gap: 0.5rem;
        }

        .page-item .page-link {
            border-radius: 8px;
            padding: 0.75rem 1.25rem;
            color: #1A2A3A;
            font-weight: 600;
            border: none;
            background-color: #f5f5f5;
            transition: all 0.3s ease;
        }

        .page-item.active .page-link, .page-item .page-link:hover {
            background-color: #1A2A3A;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        /* Newsletter Section Styles */
        .blog-newsletter-section {
            padding: 5rem 0;
            background-color: #f8f9fa;
        }

        .newsletter-container {
            background-color: #1A2A3A;
            border-radius: 12px;
            padding: 3rem;
            color: white;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .newsletter-title {
            font-size: 2.4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: white;
            text-shadow: 0 1px 3px rgba(0,0,0,0.2);
        }

        .newsletter-description {
            font-size: 1.3rem;
            line-height: 1.6;
            margin-bottom: 0;
            color: white;
            opacity: 0.95;
        }

        .stylish-input {
            height: 50px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            padding: 0 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .stylish-input:focus {
            background-color: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.1);
            color: white;
        }

        .stylish-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .stylish-button {
            height: 50px;
            border-radius: 8px;
            padding: 0 25px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            background-color: #20c7d9;
            border-color: #20c7d9;
        }

        .stylish-button:hover {
            background-color: #1ab5c6;
            border-color: #1ab5c6;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .gap-2 {
            gap: 0.75rem;
        }

        .small {
            font-size: 0.875rem;
        }

        /* Responsive Styles */
        @media (max-width: 991px) {
            .blog-hero-title {
                font-size: 3rem;
            }

            .blog-hero-subtitle {
                font-size: 1.3rem;
            }

            .newsletter-content {
                margin-bottom: 2rem;
                text-align: center;
            }

            .d-flex.gap-2 {
                flex-direction: column;
            }

            .stylish-button {
                margin-top: 10px;
                width: 100%;
            }
        }

        @media (max-width: 767px) {
            .blog-hero-section {
                padding: 4rem 0;
            }

            .blog-hero-title {
                font-size: 2.5rem;
            }

            .blog-hero-subtitle {
                font-size: 1.2rem;
            }

            .blog-categories {
                flex-wrap: nowrap;
                overflow-x: auto;
                padding-bottom: 1rem;
                justify-content: flex-start;
            }

            .blog-category-item {
                white-space: nowrap;
            }

            .newsletter-container {
                padding: 2rem;
            }

            .newsletter-title {
                font-size: 2rem;
            }

            .newsletter-description {
                font-size: 1.1rem;
            }
        }

        /* Animation Styles */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .blog-grid-item {
            animation: fadeIn 0.6s ease-out forwards;
            opacity: 0;
        }

        .blog-grid-item:nth-child(1) { animation-delay: 0.1s; }
        .blog-grid-item:nth-child(2) { animation-delay: 0.2s; }
        .blog-grid-item:nth-child(3) { animation-delay: 0.3s; }
        .blog-grid-item:nth-child(4) { animation-delay: 0.4s; }
        .blog-grid-item:nth-child(5) { animation-delay: 0.5s; }
        .blog-grid-item:nth-child(6) { animation-delay: 0.6s; }
        .blog-grid-item:nth-child(7) { animation-delay: 0.7s; }
        .blog-grid-item:nth-child(8) { animation-delay: 0.8s; }
        .blog-grid-item:nth-child(9) { animation-delay: 0.9s; }
    </style>

    <script>
        // Lazy loading for images
        document.addEventListener("DOMContentLoaded", function() {
            const lazyImages = [].slice.call(document.querySelectorAll("img.lazy-load"));

            if ("IntersectionObserver" in window) {
                let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            let lazyImage = entry.target;
                            lazyImage.src = lazyImage.dataset.src;
                            lazyImage.classList.remove("lazy-load");
                            lazyImageObserver.unobserve(lazyImage);
                        }
                    });
                });

                lazyImages.forEach(function(lazyImage) {
                    lazyImageObserver.observe(lazyImage);
                });
            }
        });
    </script>
@endsection('content')
