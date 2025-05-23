@extends('.__base_main')

@section('meta')
    <meta name="description" content="Découvrez notre gamme complète de produits Muster Electric 4 Hair. Des produits capillaires professionnels de haute qualité pour tous les types de cheveux.">
    <meta name="keywords" content="Muster Electric 4 Hair, produits capillaires professionnels, coloration professionnelle, soins capillaires, coiffure professionnelle, acheter Muster">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Produits Muster Electric 4 Hair | Muster & Dikson">
    <meta property="og:description" content="Découvrez notre gamme complète de produits Muster Electric 4 Hair. Des produits capillaires professionnels de haute qualité pour tous les types de cheveux.">
    <meta property="og:image" content="{{ asset('images/demos/demo-beauty/page-header.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Produits Muster Electric 4 Hair | Muster & Dikson">
    <meta property="twitter:description" content="Découvrez notre gamme complète de produits Muster Electric 4 Hair. Des produits capillaires professionnels de haute qualité pour tous les types de cheveux.">
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
                                    <li class="breadcrumb-item"><a href="{{route('brand.electric')}}">Muster Electric 4 Hair</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Produits</li>
                                </ol>
                            </nav>
                            <div class="shop-hero-content text-center">
                                <span class="shop-hero-subtitle">Collection professionnelle</span>
                                <h1 class="shop-hero-title">Produits Muster Electric 4 Hair</h1>
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
                                        Muster Electric 4 Hair propose une gamme complète de produits capillaires professionnels pour tous les types de cheveux. Des colorations permanentes aux soins réparateurs, en passant par les produits de coiffage et de finition, Muster offre des solutions professionnelles pour chaque besoin.
                                    </p>
                                    <div class="text-center mt-4">
                                        <a href="{{route('shop.dikson')}}" class="btn-discover">
                                            Découvrir nos produits <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
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
                                                <a href="{{ route('cart.show') }}" class="btn-product-icon btn-cart" title="Select Options">
                                                    <i class="d-icon-bag"></i>
                                                </a>
                                            </div>
                                        </figure>
                                        <div class="product-details" style="padding: 10px; text-align: center;">
                                            <h3 class="product-name">
                                                <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                            </h3>
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

                    <!-- Brand Story Section will be added later -->

                    <!-- Newsletter Section -->
                    <section class="shop-newsletter-section">
                        <div class="newsletter-container">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="newsletter-content">
                                        <h2 class="newsletter-title">Restez informé</h2>
                                        <p class="newsletter-description">Abonnez-vous à notre newsletter pour recevoir les dernières nouveautés et offres exclusives de Muster Electric 4 Hair.</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="newsletter-form" id="muster-newsletter-form">
                                        @csrf
                                        <input type="hidden" name="form_source" value="muster_page">
                                        <input type="hidden" name="privacy_check" value="1">

                                        @if (session('success'))
                                            <div class="newsletter-message mb-3 text-white">
                                                <p class="mb-0"><i class="fas fa-heart"></i> Nous sommes ravis que vous vous abonniez à notre newsletter</p>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const newsletterForm = document.getElementById('muster-newsletter-form');

            if (newsletterForm) {
                newsletterForm.addEventListener('submit', function(e) {
                    e.preventDefault(); // Prevent default form submission

                    const submitButton = document.getElementById('muster-newsletter-submit');
                    const emailInput = document.getElementById('muster-newsletter-email');
                    const email = emailInput.value.trim();

                    // Validate email
                    if (!email) {
                        alert('Veuillez entrer votre adresse email.');
                        emailInput.focus();
                        return false;
                    }

                    // Show loading state
                    submitButton.innerHTML = 'Envoi en cours...';
                    submitButton.disabled = true;

                    // Create form data
                    const formData = new FormData(newsletterForm);

                    // Get CSRF token
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                    // Make sure we have the CSRF token
                    if (!csrfToken) {
                        console.error('CSRF token not found');
                        // Fall back to traditional form submission if no CSRF token
                        newsletterForm.submit();
                        return false;
                    }

                    // Submit form using fetch API
                    fetch(newsletterForm.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        credentials: 'same-origin'
                    })
                    .then(response => {
                        // Check if the response is JSON
                        const contentType = response.headers.get('content-type');
                        if (contentType && contentType.includes('application/json')) {
                            return response.json();
                        } else {
                            // If not JSON, reload the page to show the server's response
                            window.location.reload();
                            throw new Error('Not JSON response');
                        }
                    })
                    .then(data => {
                        // Create success message
                        const messageContainer = document.createElement('div');

                        if (data.success) {
                            // Show success message
                            const welcomeMessage = document.createElement('div');
                            welcomeMessage.className = 'newsletter-message mb-3 text-white';
                            welcomeMessage.innerHTML = '<p class="mb-0"><i class="fas fa-heart"></i> Nous sommes ravis que vous vous abonniez à notre newsletter</p>';

                            const successMessage = document.createElement('div');
                            successMessage.className = 'alert alert-success mt-3';
                            successMessage.textContent = data.message || 'Merci de vous être inscrit à notre newsletter !';

                            // Clear form and show messages
                            newsletterForm.innerHTML = '';
                            newsletterForm.appendChild(welcomeMessage);
                            newsletterForm.appendChild(successMessage);
                        } else {
                            // Show error message
                            const errorMessage = document.createElement('div');
                            errorMessage.className = 'alert alert-danger mt-3';
                            errorMessage.textContent = data.message || 'Une erreur est survenue. Veuillez réessayer.';

                            // Insert error message before the input
                            const inputContainer = emailInput.parentElement;
                            newsletterForm.insertBefore(errorMessage, inputContainer);

                            // Reset button
                            submitButton.innerHTML = 'S\'abonner <i class="fas fa-paper-plane"></i>';
                            submitButton.disabled = false;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        submitButton.innerHTML = 'S\'abonner <i class="fas fa-paper-plane"></i>';
                        submitButton.disabled = false;

                        // Show error message
                        const errorMessage = document.createElement('div');
                        errorMessage.className = 'alert alert-danger mt-3';
                        errorMessage.textContent = 'Une erreur est survenue. Veuillez réessayer.';

                        // Insert error message before the input
                        const inputContainer = emailInput.parentElement;
                        newsletterForm.insertBefore(errorMessage, inputContainer);
                    });

                    return false;
                });
            }
        });
    </script>

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

        .btn-discover {
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

        .btn-discover i {
            margin-left: 0.5rem;
            transition: transform 0.3s ease;
        }

        .btn-discover:hover {
            background-color: #20c7d9;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            color: white;
        }

        .btn-discover:hover i {
            transform: translateX(5px);
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

        /* Brand Story Section Styles will be added later */

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

        /* Newsletter message styles */
        .newsletter-message {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 10px 15px;
            font-size: 1rem;
            border-left: 3px solid #20c7d9;
            animation: fadeInDown 0.5s ease-in-out;
        }

        .newsletter-message i {
            color: #20c7d9;
            margin-right: 8px;
            animation: pulse 1.5s infinite;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }

        /* Alert styles */
        .alert {
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease-in-out;
            font-size: 1rem;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .alert-success {
            color: #ffffff;
            background-color: #28a745;
            border-left: 4px solid #1e7e34;
        }

        .alert-info {
            color: #ffffff;
            background-color: #17a2b8;
            border-left: 4px solid #117a8b;
        }

        .alert-danger {
            color: #ffffff;
            background-color: #dc3545;
            border-left: 4px solid #bd2130;
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
@endsection('content')
