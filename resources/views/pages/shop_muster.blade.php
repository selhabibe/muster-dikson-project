@extends('.__base_main')

@section('meta')
    <meta name="description" content="Découvrez Muster Beauty Tech - Technologies esthétiques innovantes. Solutions professionnelles pour une expérience beauté unique et complète.">
    <meta name="keywords" content="Muster Beauty Tech, technologies esthétiques, équipements beauté professionnels, innovation beauté, appareils esthétiques, bien-être authentique">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Muster Beauty Tech - Technologies Esthétiques Innovantes | Muster & Dikson">
    <meta property="og:description" content="Découvrez Muster Beauty Tech - Technologies esthétiques innovantes. Solutions professionnelles pour une expérience beauté unique et complète.">
    <meta property="og:image" content="{{ asset('images/demos/demo-beauty/page-header.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Muster Beauty Tech - Technologies Esthétiques Innovantes | Muster & Dikson">
    <meta property="twitter:description" content="Découvrez Muster Beauty Tech - Technologies esthétiques innovantes. Solutions professionnelles pour une expérience beauté unique et complète.">
    <meta property="twitter:image" content="{{ asset('images/demos/demo-beauty/page-header.jpg') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
@endsection

@section('content')

    <div class="page-wrapper">
        <main class="main">
            <!-- Hero Section -->
            <section class="shop-hero-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav aria-label="breadcrumb" class="inline-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('index')}}"><i class="fas fa-home"></i> Accueil</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('ourbrands')}}">Nos Marques</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Muster Beauty Tech</li>
                                </ol>
                            </nav>
                            <div class="shop-hero-content text-center">
                                <span class="shop-hero-subtitle">Excellence et Innovation</span>
                                <h1 class="shop-hero-title">Muster Beauty Tech</h1>
                                <p class="shop-hero-description">Nous évoluons vers l'avenir de la beauté professionnelle, transformant la technologie en art et les esthéticiennes en véritables consultantes du changement</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Shop Content -->
            <div class="page-content">
                <div class="container">
                    <div class="shop-intro-section">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="shop-intro-content text-center">
                                    <h2 class="section-title mb-4">Célébrez l'Art de la Beauté</h2>
                                    <p class="shop-intro-text">
                                    Müster Beauty Technology accompagne les professionnels de la beauté avec des technologies esthétiques hautement innovantes conçues pour des résultats visibles et une expérience de bien-être authentique. Notre mission est d'offrir des outils technologiques d'excellence, qui valorisent le talent des esthéticiennes, améliorent la qualité de la peau et offrent des moments de transformation profonde.
                                    </p>
                                    <p class="shop-intro-text-secondary">
                                        Nous croyons en la beauté comme renaissance et en la technologie comme alliée du changement. Un monde exclusif d'<strong>INNOVATION</strong>, d'<strong>EFFICACITÉ</strong> et de <strong>FONCTIONNALITÉ</strong>, pour faire vivre au client une <strong>EXPÉRIENCE BEAUTÉ UNIQUE ET COMPLÈTE</strong>.
                                    </p>
                                    <div class="text-center mt-5">
                                        <a href="#products-section" class="btn-discover">
                                            Découvrir nos technologies <i class="fas fa-arrow-down"></i>
                                        </a>
                                        <a href="https://cdn.prod.website-files.com/67cecb7a3a28462cd4502f56/6821ca0c9018799b0e5ac56b_Muster-Beauty-Tech_Brand-Book_2025.pdf" class="btn-catalog" target="_blank">
                                            <i class="fas fa-file-pdf"></i> Catalogue 2025
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="shop-filter-section" id="products-section">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h2 class="shop-section-title">Nos Technologies Esthétiques</h2>
                                <p class="section-subtitle">Solutions innovantes pour des résultats exceptionnels</p>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <div class="shop-filter-options">
                                    <!-- Filter options can be added here if needed -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="shop-products-section">
                        <div class="row cols-2 cols-sm-3 cols-md-4 product-wrapper" style="display: flex; flex-wrap: wrap;">
                        @foreach($products as $product)
                            @if ($product->is_visible)
                                <div class="product-wrap" style="flex: 1 1 calc(25% - 1rem); margin: 0.5rem; display: flex; flex-direction: column;">
                                    <div class="product text-center" style="flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between;">
                                        <figure class="product-media" style="position: relative; padding-bottom: 100%; overflow: hidden;">
                                            <a href="{{ route('products.show', $product->id) }}">
                                                @if ($product->getFirstMediaUrl('product-images'))
                                                    <img src="{{ $product->getFirstMediaUrl('product-images') }}" alt="{{ $product->name }}"
                                                         style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain;">
                                                    <img src="{{ $product->getFirstMediaUrl('product-images') }}" alt="{{ $product->name }}"
                                                         style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain;">
                                                @endif
                                            </a>
                                            <div class="product-action-vertical">
                                                <button class="btn-product-icon btn-cart"
                                                        data-product-id="{{ $product->id }}"
                                                        data-quantity="1"
                                                        title="Ajouter au panier">
                                                    <i class="d-icon-bag"></i>
                                                </button>
                                            </div>
                                        </figure>
                                        <div class="product-details" style="padding: 10px; text-align: center;">
                                            <h3 class="product-name">
                                                <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                            </h3>

                                            <!-- Stock Alert for Product Cards -->
                                            @if($product->qty <= 0)
                                                <div class="stock-alert-card out-of-stock">
                                                    <i class="fas fa-clock"></i>
                                                    <span>Bientôt disponible</span>
                                                </div>
                                            @elseif($product->qty <= $product->security_stock)
                                                <div class="stock-alert-card low-stock">
                                                    <i class="fas fa-info-circle"></i>
                                                    <span>Dernières pièces</span>
                                                </div>
                                            @endif

                                            <div class="product-price">
                                                <ins class="new-price">{{ number_format($product->price, 2) }} MAD</ins>
                                                <del class="old-price">{{ number_format($product->old_price, 2) }} MAD</del>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width:90%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a href="{{ route('products.show', $product->id) }}" class="rating-reviews">({{ $product->reviews_count }} Avis)</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="shop-pagination">
                        <!-- Pagination can be added here if needed -->
                    </div>

                    <!-- Brand Story Section -->
                    <section class="brand-story-section">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="brand-story-content">
                                        <h2 class="brand-story-title">Innovation & Excellence</h2>
                                        <p class="brand-story-text">
                                            Müster Beauty Technology transforme la technologie en art et fait des esthéticiennes de véritables consultantes du changement. Avec des solutions innovantes, personnalisées et efficaces, nous offrons un nouveau standard de bien-être et d'authenticité pour chaque individu.
                                        </p>
                                        <div class="brand-features">
                                            <div class="feature-item">
                                                <i class="fas fa-lightbulb"></i>
                                                <span>Innovation constante</span>
                                            </div>
                                            <div class="feature-item">
                                                <i class="fas fa-award"></i>
                                                <span>Excellence reconnue</span>
                                            </div>
                                            <div class="feature-item">
                                                <i class="fas fa-users"></i>
                                                <span>Support professionnel</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="brand-story-image">
                                        <img src="{{ asset('images/demos/demo-beauty/beauty-tech-hero.jpg') }}" alt="Muster Beauty Tech" class="img-fluid rounded">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Newsletter Section -->
                    <section class="shop-newsletter-section">
                        <div class="newsletter-container">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="newsletter-content">
                                        <h2 class="newsletter-title">Restez à la pointe de l'innovation</h2>
                                        <p class="newsletter-description">Abonnez-vous à notre newsletter pour découvrir les dernières technologies esthétiques Muster Beauty Tech et nos formations exclusives.</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="newsletter-form" id="muster-newsletter-form">
                                        @csrf
                                        <input type="hidden" name="form_source" value="muster_page">
                                        <input type="hidden" name="privacy_check" value="1">

                                        @if (session('success'))
                                            <div class="newsletter-message mb-3 text-white">
                                                <p class="mb-0 text-white"><i class="fas fa-heart"></i> Bienvenue dans l'univers Muster Beauty Tech !</p>
                                            </div>
                                            <div class="alert alert-success mt-3">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        @if (session('info'))
                                            <div class="alert alert-info mt-3">
                                                {{ session('info') }}
                                            </div>
                                        @endif

                                        @if ($errors->any())
                                            <div class="alert alert-danger mt-3">
                                                <ul class="mb-0">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="form-group mb-3">
                                            <input type="email" class="form-control" name="email" id="muster-newsletter-email" placeholder="Votre adresse email" required>
                                        </div>
                                        <button type="submit" class="btn-subscribe" id="muster-newsletter-submit">
                                            S'abonner <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End Newsletter Section -->
                </div>
            </div>
        </main>
        <!-- End Main -->
    </div>
    <!-- Load unified JavaScript files -->
    <script src="{{ asset('js/custom/newsletter.js') }}"></script>
    <script src="{{ asset('js/custom/shop-cart.js') }}"></script>

    <!-- Add background image style for this specific page -->
    <style>
        .shop-hero-section {
            background-image: linear-gradient(rgba(26, 42, 58, 0.85), rgba(26, 42, 58, 0.85)), url('{{asset('images/demos/demo-beauty/page-header.jpg')}}');
        }
    </style>
@endsection('content')
