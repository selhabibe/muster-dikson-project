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
                            <nav aria-label="breadcrumb">
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

    <style>
        /* Shop Hero Section Styles */
        .shop-hero-section {
            padding: 6rem 0 4rem;
            background-color: #1A2A3A;
            background-image: linear-gradient(rgba(26, 42, 58, 0.85), rgba(26, 42, 58, 0.85)), url('{{asset('images/demos/demo-beauty/page-header.jpg')}}');
            background-size: cover;
            background-position: center;
            color: white;
            margin-bottom: 3rem;
        }

        .breadcrumb {
            background-color: transparent;
            padding: 0;
            margin-bottom: 2rem;
        }

        .breadcrumb-item a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb-item a:hover {
            color: #20c7d9;
        }

        .breadcrumb-item.active {
            color: rgba(255, 255, 255, 0.7);
        }

        .breadcrumb-item + .breadcrumb-item::before {
            content: ">";
            color: rgba(255, 255, 255, 0.5);
        }

        .shop-hero-content {
            padding: 2rem 0;
        }

        .shop-hero-subtitle {
            display: inline-block;
            font-size: 1.2rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
            color: #20c7d9;
            letter-spacing: 1px;
        }

        .shop-hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: white;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .shop-hero-description {
            font-size: 1.4rem;
            max-width: 800px;
            margin: 0 auto;
            color: rgba(255, 255, 255, 0.9);
        }

        /* Shop Intro Section Styles */
        .shop-intro-section {
            padding: 2rem 0 3rem;
        }

        .shop-intro-content {
            max-width: 900px;
            margin: 0 auto;
        }

        .shop-intro-text {
            font-size: 1.3rem;
            line-height: 1.8;
            color: #555;
        }

        /* Shop Filter Section Styles */
        .shop-filter-section {
            padding-bottom: 2rem;
            border-bottom: 1px solid #eee;
            margin-bottom: 3rem;
        }

        .shop-section-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1A2A3A;
            margin-bottom: 0;
        }

        /* Product Card Styles */
        .product-wrap {
            transition: all 0.3s ease;
        }

        .product-wrap:hover {
            transform: translateY(-10px);
        }

        .product {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }

        .product:hover {
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .product-media {
            border-radius: 12px 12px 0 0;
            overflow: hidden;
        }

        .product-media img {
            transition: transform 0.5s ease;
        }

        .product:hover .product-media img {
            transform: scale(1.05);
        }

        .product-action-vertical {
            position: absolute;
            top: 10px;
            right: 10px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .product:hover .product-action-vertical {
            opacity: 1;
        }

        .btn-product-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: white;
            color: #1A2A3A;
            border-radius: 50%;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .btn-product-icon:hover {
            background-color: #20c7d9;
            color: white;
            transform: translateY(-3px);
        }

        .product-details {
            background-color: white;
            border-radius: 0 0 12px 12px;
        }

        .product-name {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            line-height: 1.4;
        }

        .product-name a {
            color: #1A2A3A;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .product-name a:hover {
            color: #20c7d9;
        }

        .product-price {
            margin-bottom: 0.75rem;
        }

        .new-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1A2A3A;
            margin-right: 0.5rem;
        }

        .old-price {
            font-size: 1.1rem;
            color: #999;
            text-decoration: line-through;
        }

        .ratings-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 0.5rem;
        }

        .ratings-full {
            position: relative;
            margin-right: 0.5rem;
        }

        .ratings {
            position: relative;
            display: inline-block;
            font-family: 'Font Awesome 5 Free';
            font-size: 13px;
            letter-spacing: 0.1em;
            color: #FFD700;
        }

        .ratings::before {
            content: '\f005\f005\f005\f005\f005';
            font-weight: 900;
            color: rgba(0,0,0,0.16);
        }

        .ratings-full .ratings {
            position: absolute;
            top: 0;
            left: 0;
            white-space: nowrap;
            overflow: hidden;
        }

        .ratings-full .ratings::before {
            content: '\f005\f005\f005\f005\f005';
            font-weight: 900;
            color: #FFD700;
        }

        .rating-reviews {
            font-size: 0.9rem;
            color: #777;
            text-decoration: none;
        }

        .rating-reviews:hover {
            color: #20c7d9;
        }

        /* Brand Story Section Styles */
        .brand-story-section {
            padding: 5rem 0;
            background-color: #f8f9fa;
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

        /* Newsletter Section Styles */
        .shop-newsletter-section {
            padding: 3rem 0 5rem;
        }

        .newsletter-container {
            background-color: #1A2A3A;
            border-radius: 12px;
            padding: 3rem;
            color: white;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .newsletter-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: white;
        }

        .newsletter-description {
            font-size: 1.4rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 0;
        }

        .newsletter-form .form-control {
            height: 50px;
            border-radius: 8px;
            border: none;
            padding: 0.75rem 1.25rem;
            font-size: 1.1rem;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            transition: all 0.3s ease;
        }

        .newsletter-form .form-control:focus {
            background-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 0 0.2rem rgba(32, 199, 217, 0.25);
        }

        .newsletter-form .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .form-check-label {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
            padding-left: 0.5rem;
        }

        .btn-subscribe {
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            background-color: #20c7d9;
            color: white;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-subscribe i {
            margin-left: 0.5rem;
            transition: transform 0.3s ease;
        }

        .btn-subscribe:hover {
            background-color: white;
            color: #1A2A3A;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .btn-subscribe:hover i {
            transform: translateX(5px);
        }

        /* Responsive Styles */
        @media (max-width: 991px) {
            .shop-hero-title {
                font-size: 2.8rem;
            }

            .shop-hero-description {
                font-size: 1.3rem;
            }

            .section-title {
                font-size: 2.4rem;
            }

            .newsletter-container {
                padding: 2rem;
            }

            .newsletter-content {
                margin-bottom: 2rem;
            }
        }

        @media (max-width: 767px) {
            .shop-hero-section {
                padding: 4rem 0 3rem;
            }

            .shop-hero-title {
                font-size: 2.2rem;
            }

            .shop-hero-description {
                font-size: 1.2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .brand-story-section {
                padding: 2rem;
            }

            .newsletter-title {
                font-size: 1.8rem;
            }

            .newsletter-description {
                font-size: 1.2rem;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Handle add to cart form submissions with modern cart drawer
            document.querySelectorAll('.add-to-cart-form').forEach(form => {
                form.addEventListener('submit', async function(e) {
                    e.preventDefault();

                    const button = this.querySelector('.btn-cart');
                    const originalIcon = button.innerHTML;
                    const productId = this.querySelector('input[name="product_id"]').value;
                    const quantity = parseInt(this.querySelector('input[name="quantity"]').value);

                    // Show loading state
                    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                    button.disabled = true;

                    try {
                        // Use global cart function for consistent behavior
                        const success = await window.addToCartGlobal(productId, quantity);

                        if (success) {
                            // Show success state
                            button.innerHTML = '<i class="fas fa-check"></i>';
                            button.style.backgroundColor = '#28a745';

                            // Reset button after 2 seconds
                            setTimeout(() => {
                                button.innerHTML = originalIcon;
                                button.disabled = false;
                                button.style.backgroundColor = '';
                            }, 2000);
                        } else {
                            throw new Error('Failed to add to cart');
                        }
                    } catch (error) {
                        console.error('Error:', error);

                        // Show error state
                        button.innerHTML = '<i class="fas fa-times"></i>';
                        button.style.backgroundColor = '#dc3545';

                        // Reset button after 2 seconds
                        setTimeout(() => {
                            button.innerHTML = originalIcon;
                            button.disabled = false;
                            button.style.backgroundColor = '';
                        }, 2000);
                    }
                });
            });
        });
    </script>
@endsection('content')
