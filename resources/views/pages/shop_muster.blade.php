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
                                    , Müster Beauty Technology accompagne les professionnels de la beauté avec des technologies esthétiques hautement innovantes conçues pour des résultats visibles et une expérience de bien-être authentique. Notre mission est d'offrir des outils technologiques d'excellence, qui valorisent le talent des esthéticiennes, améliorent la qualité de la peau et offrent des moments de transformation profonde.
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
                                                <p class="mb-0"><i class="fas fa-heart"></i> Bienvenue dans l'univers Muster Beauty Tech !</p>
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
                            welcomeMessage.innerHTML = '<p class="mb-0"><i class="fas fa-heart"></i> Bienvenue dans l\'univers Muster Beauty Tech !</p>';

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

            // Handle add to cart button clicks
            document.querySelectorAll('.btn-cart').forEach(button => {
                button.addEventListener('click', async function(e) {
                    e.preventDefault();

                    const productId = this.getAttribute('data-product-id');
                    const quantity = parseInt(this.getAttribute('data-quantity'));
                    const originalIcon = this.innerHTML;

                    // Show loading state
                    this.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                    this.disabled = true;

                    try {
                        // Use global cart function for consistent behavior
                        const success = await window.addToCartGlobal(productId, quantity);

                        if (success) {
                            // Show success state
                            this.innerHTML = '<i class="fas fa-check"></i>';
                            this.style.backgroundColor = '#28a745';

                            // Reset button after 2 seconds
                            setTimeout(() => {
                                this.innerHTML = originalIcon;
                                this.disabled = false;
                                this.style.backgroundColor = '';
                            }, 2000);
                        } else {
                            throw new Error('Failed to add to cart');
                        }
                    } catch (error) {
                        console.error('Error:', error);

                        // Show error state
                        this.innerHTML = '<i class="fas fa-times"></i>';
                        this.style.backgroundColor = '#dc3545';

                        // Reset button after 2 seconds
                        setTimeout(() => {
                            this.innerHTML = originalIcon;
                            this.disabled = false;
                            this.style.backgroundColor = '';
                        }, 2000);
                    }
                });
            });
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
            padding: 3rem 0 4rem;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        }

        .shop-intro-content {
            max-width: 1000px;
            margin: 0 auto;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1A2A3A;
            margin-bottom: 2rem;
        }

        .shop-intro-text {
            font-size: 1.2rem;
            line-height: 1.8;
            color: #555;
            margin-bottom: 1.5rem;
        }

        .shop-intro-text-secondary {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #666;
            font-style: italic;
            margin-bottom: 2rem;
        }

        .shop-intro-text-secondary strong {
            color: #20c7d9;
            font-weight: 700;
        }

        .btn-discover {
            display: inline-flex;
            align-items: center;
            padding: 1rem 2rem;
            background-color: #1A2A3A;
            color: white;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-right: 1rem;
            margin-bottom: 1rem;
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

        .btn-catalog {
            display: inline-flex;
            align-items: center;
            padding: 1rem 2rem;
            background-color: transparent;
            color: #1A2A3A;
            border: 2px solid #1A2A3A;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
        }

        .btn-catalog i {
            margin-right: 0.5rem;
            color: #e74c3c;
        }

        .btn-catalog:hover {
            background-color: #1A2A3A;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .btn-catalog:hover i {
            color: white;
        }

        /* Shop Filter Section Styles */
        .shop-filter-section {
            padding-bottom: 2rem;
            border-bottom: 1px solid #eee;
            margin-bottom: 3rem;
        }

        .shop-section-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1A2A3A;
            margin-bottom: 0.5rem;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 0;
            font-style: italic;
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
            padding: 4rem 0;
            background-color: #f8f9fa;
            margin-top: 4rem;
        }

        .brand-story-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: #1A2A3A;
            margin-bottom: 1.5rem;
        }

        .brand-story-text {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #555;
            margin-bottom: 2rem;
        }

        .brand-features {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1rem;
            font-weight: 500;
            color: #333;
        }

        .feature-item i {
            color: #20c7d9;
            font-size: 1.2rem;
            width: 20px;
        }

        .brand-story-image {
            text-align: center;
        }

        .brand-story-image img {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
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
                padding: 3rem 0 2rem;
            }

            .brand-story-title {
                font-size: 1.8rem;
            }

            .brand-features {
                margin-top: 1.5rem;
            }

            .btn-discover, .btn-catalog {
                display: block;
                text-align: center;
                margin: 0.5rem auto;
                max-width: 280px;
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
