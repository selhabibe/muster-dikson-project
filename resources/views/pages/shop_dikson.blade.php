@extends('.__base_main')

@section('meta')
    <meta name="description" content="Découvrez notre gamme complète de produits Dikson Professionelle. Des produits capillaires professionnels de haute qualité pour tous les types de cheveux.">
    <meta name="keywords" content="Dikson Professionelle, produits capillaires professionnels, coloration professionnelle, soins capillaires, coiffure professionnelle, acheter Dikson">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Produits Dikson Professionelle | Muster & Dikson">
    <meta property="og:description" content="Découvrez notre gamme complète de produits Dikson Professionelle. Des produits capillaires professionnels de haute qualité pour tous les types de cheveux.">
    <meta property="og:image" content="{{ asset('images/demos/demo-beauty/page-header.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Produits Dikson Professionelle | Muster & Dikson">
    <meta property="twitter:description" content="Découvrez notre gamme complète de produits Dikson Professionelle. Des produits capillaires professionnels de haute qualité pour tous les types de cheveux.">
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
                                    <li class="breadcrumb-item"><a href="{{route('brand.dikson')}}">Dikson Professionelle</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Produits</li>
                                </ol>
                            </nav>
                            <div class="shop-hero-content text-center">
                                <span class="shop-hero-subtitle">Collection professionnelle</span>
                                <h1 class="shop-hero-title">Produits Dikson Professionelle</h1>
                                <p class="shop-hero-description">Découvrez notre gamme complète de produits capillaires professionnels</p>
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
                                    <p class="shop-intro-text">
                                        Dikson Professionelle propose une gamme complète de produits capillaires professionnels pour tous les types de cheveux. Des colorations permanentes aux soins réparateurs, en passant par les produits de coiffage et de finition, Dikson offre des solutions professionnelles pour chaque besoin.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="shop-filter-section">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h2 class="shop-section-title">Nos produits</h2>
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
                            @if(isset($products) && $products->count() > 0)
                                @foreach($products as $product)
                                    @if ($product->is_visible)
                                        <div class="product-wrap" style="flex: 1 1 calc(25% - 1rem); margin: 0.5rem; display: flex; flex-direction: column;">
                                        <div class="product text-center" style="flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between;">
                                            <figure class="product-media" style="position: relative; padding-bottom: 100%; overflow: hidden;">
                                                <a href="{{ route('products.show', $product->id) }}">
                                                    @if ($product->getFirstMediaUrl('product-images'))
                                                        <img src="{{ $product->getFirstMediaUrl('product-images') }}" alt="{{ $product->name }}"
                                                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain;">
                                                    @else
                                                        <img src="{{ asset('images/placeholder.jpg') }}" alt="{{ $product->name }}"
                                                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain;">
                                                    @endif
                                                </a>
                                                <div class="product-action-vertical">
                                                    <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <input type="hidden" name="quantity" value="1">
                                                        <button type="submit" class="btn-product-icon btn-cart" title="Ajouter au panier">
                                                            <i class="d-icon-bag"></i>
                                                        </button>
                                                    </form>
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
                                                    @if($product->old_price && $product->old_price > $product->price)
                                                        <del class="old-price">{{ number_format($product->old_price, 2) }} MAD</del>
                                                    @endif
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width:{{ $product->rating ?? 0 }}%"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <a href="{{ route('products.show', $product->id) }}" class="rating-reviews">
                                                        ({{ $product->reviews_count ?? 0 }} Avis)
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            @else
                                <div class="col-12">
                                    <div class="no-products-message text-center" style="padding: 3rem 0;">
                                        <i class="fas fa-box-open" style="font-size: 4rem; color: #ccc; margin-bottom: 1rem;"></i>
                                        <h3 style="color: #666; margin-bottom: 1rem;">Aucun produit disponible</h3>
                                        <p style="color: #999;">Nous travaillons à ajouter de nouveaux produits Dikson Professionelle. Revenez bientôt !</p>
                                        <a href="{{ route('index') }}" class="btn-learn-more" style="margin-top: 1rem;">
                                            Retour à l'accueil <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="shop-pagination">
                            <!-- Pagination can be added here if needed -->
                        </div>
                    </div>

                    <!-- Brand Story Section -->
                    <section class="brand-story-section">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <div class="brand-story-content">
                                    <span class="section-subtitle">Notre histoire</span>
                                    <h2 class="section-title">Dikson Professionelle</h2>
                                    <p class="section-description">
                                        Depuis sa création, Dikson s'est engagé à développer des produits de haute qualité pour les professionnels de la coiffure. La marque combine tradition italienne et innovation technologique pour offrir des solutions capillaires exceptionnelles.
                                    </p>
                                    <p class="section-description">
                                        Chaque produit est formulé avec des ingrédients soigneusement sélectionnés et testé pour garantir des résultats professionnels. Dikson est aujourd'hui reconnu dans le monde entier pour la qualité et l'efficacité de ses produits.
                                    </p>
                                    <a href="{{route('brand.dikson')}}" class="btn-learn-more">
                                        En savoir plus <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="brand-story-image">
                                    <img src="https://cdn.prod.website-files.com/67cecb7a3a28462cd4502f56/67dacee215113144868eaad2_01_HP_BOX_BRAND_DKPRO.webp" alt="Dikson Professionelle" class="img-fluid rounded">
                                    <div class="image-overlay"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End Brand Story Section -->

                    <!-- Newsletter Section -->
                    <section class="shop-newsletter-section">
                        <div class="newsletter-container">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="newsletter-content">
                                        <h2 class="newsletter-title">Restez informé</h2>
                                        <p class="newsletter-description">Abonnez-vous à notre newsletter pour recevoir les dernières nouveautés et offres exclusives de Dikson Professionelle.</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <form action="{{ route('newsletter.subscribe') }}" method="post" class="newsletter-form">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <input type="email" class="form-control" name="email" placeholder="Votre adresse email" required>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" name="privacy_check" id="privacy_check" required>
                                            <label class="form-check-label" for="privacy_check">
                                                J'accepte de recevoir des informations par email
                                            </label>
                                        </div>
                                        <button type="submit" class="btn-subscribe">
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

    <!-- Add background image style for this specific page -->
    <style>
        .shop-hero-section {
            background-image: linear-gradient(rgba(26, 42, 58, 0.85), rgba(26, 42, 58, 0.85)), url('{{asset('images/demos/demo-beauty/page-header.jpg')}}');
        }

        /* Dikson-specific styles that differ from the unified components */
        .shop-intro-section {
            padding: 2rem 0 3rem;
        }

        .shop-intro-content {
            max-width: 900px;
            margin: 0 auto;
        }

        .shop-section-title {
            font-size: 1.8rem;
            margin-bottom: 0;
        }

        .brand-story-section {
            padding: 5rem 0;
            border-radius: 12px;
            margin: 3rem 0;
            padding: 3rem;
        }

        .section-subtitle {
            display: inline-block;
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #20c7d9;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .section-title {
            font-size: 2.7rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #1A2A3A;
            line-height: 1.3;
        }

        .section-description {
            font-size: 1.3rem;
            line-height: 1.8;
            color: #555;
            margin-bottom: 1.5rem;
        }

        .btn-learn-more {
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            background-color: #1A2A3A;
            color: white;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.1rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-learn-more i {
            margin-left: 0.5rem;
            transition: transform 0.3s ease;
        }

        .btn-learn-more:hover {
            background-color: #20c7d9;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            color: white;
        }

        .btn-learn-more:hover i {
            transform: translateX(5px);
        }

        .brand-story-image {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .brand-story-image img {
            width: 100%;
            height: auto;
            transition: transform 0.5s ease;
        }

        .brand-story-image:hover img {
            transform: scale(1.05);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.3));
        }

        @media (max-width: 767px) {
            .brand-story-section {
                padding: 2rem;
            }
        }
    </style>

    <!-- Load unified JavaScript files -->
    <script src="{{ asset('js/custom/newsletter.js') }}"></script>
    <script src="{{ asset('js/custom/shop-cart.js') }}"></script>
@endsection('content')
