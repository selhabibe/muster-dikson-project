@extends('.__base_main')

@section('meta')
    <meta name="description" content="Découvrez Dikson Professionelle, une marque italienne de produits capillaires professionnels qui combine tradition et innovation pour les professionnels de la coiffure.">
    <meta name="keywords" content="Dikson Professionelle, produits capillaires professionnels, coloration professionnelle, soins capillaires, coiffure professionnelle">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Dikson Professionelle | Muster & Dikson">
    <meta property="og:description" content="Découvrez Dikson Professionelle, une marque italienne de produits capillaires professionnels qui combine tradition et innovation pour les professionnels de la coiffure.">
    <meta property="og:image" content="{{ asset('images/demos/demo-beauty/page-header.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Dikson Professionelle | Muster & Dikson">
    <meta property="twitter:description" content="Découvrez Dikson Professionelle, une marque italienne de produits capillaires professionnels qui combine tradition et innovation pour les professionnels de la coiffure.">
    <meta property="twitter:image" content="{{ asset('images/demos/demo-beauty/page-header.jpg') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
@endsection

@section('content')
    <div class="page-wrapper">
        <main class="main">
            <!-- Hero Section -->
            <section class="brand-hero-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav aria-label="breadcrumb" class="inline-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('index')}}"><i class="fas fa-home"></i> Accueil</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('ourbrands')}}">Nos marques</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dikson Professionelle</li>
                                </ol>
                            </nav>
                            <div class="brand-hero-content text-center">
                                <span class="brand-hero-subtitle">Excellence capillaire</span>
                                <h1 class="brand-hero-title">Dikson Professionelle</h1>
                                <p class="brand-hero-description">Une marque italienne de produits professionnels pour les cheveux, reconnue pour sa qualité et son innovation</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Brand Content -->
            <div class="page-content">
                <section class="brand-intro-section">
                    <div class="container">
                    <div class="row">
                        <div class="col-lg-5 mb-4">
                            <div class="brand-image-container">
                                <img src="https://cdn.prod.website-files.com/67cecb7a3a28462cd4502f56/67dacee215113144868eaad2_01_HP_BOX_BRAND_DKPRO.webp" alt="Dikson Professionelle" class="img-fluid rounded shadow-sm">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="brand-description">
                                <h2 class="title">Dikson Professionelle</h2>
                                <p class="lead">Une marque italienne de produits professionnels pour les cheveux, reconnue pour sa qualité et son innovation.</p>

                                <p>Dikson Professionelle est une marque italienne de produits capillaires professionnels qui combine tradition et innovation. Depuis sa création, Dikson s'est engagé à développer des produits de haute qualité pour les professionnels de la coiffure.</p>

                                <p>La marque propose une gamme complète de produits pour tous les types de cheveux et pour répondre à tous les besoins des salons de coiffure modernes. Des colorations permanentes aux soins réparateurs, en passant par les produits de coiffage et de finition, Dikson offre des solutions professionnelles pour chaque étape du service en salon.</p>

                                <div class="brand-features mt-4">
                                    <h4>Points forts de la marque:</h4>
                                    <ul class="list list-type-check">
                                        <li>Produits formulés avec des ingrédients de haute qualité</li>
                                        <li>Gamme complète pour tous les types de cheveux</li>
                                        <li>Solutions professionnelles pour les coloristes</li>
                                        <li>Produits de coiffage innovants</li>
                                        <li>Engagement envers la recherche et le développement</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-6">
                        <div class="col-12">
                            <h3 class="title title-border mb-4">Gammes de produits</h3>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="product-category-card">
                                <h4>Coloration</h4>
                                <p>Des colorations permanentes et semi-permanentes pour des résultats professionnels. Formules riches en pigments pour une couverture parfaite des cheveux blancs et une tenue longue durée.</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="product-category-card">
                                <h4>Soins</h4>
                                <p>Shampoings, après-shampoings et masques adaptés à tous les types de cheveux. Des formules enrichies en actifs naturels pour nourrir, réparer et protéger la fibre capillaire.</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="product-category-card">
                                <h4>Coiffage</h4>
                                <p>Gels, mousses, laques et cires pour créer tous les styles. Des produits professionnels qui offrent maintien, volume et brillance sans alourdir les cheveux.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-6">
                        <div class="col-12">
                            <h3 class="title title-border mb-4">Pourquoi choisir Dikson Professionelle?</h3>
                            <p>Dikson Professionelle est le choix idéal pour les professionnels qui recherchent des produits de haute qualité, efficaces et faciles à utiliser. La marque s'engage à fournir des solutions innovantes qui répondent aux besoins des coiffeurs modernes et de leurs clients.</p>
                            <p>Avec plus de 50 ans d'expérience dans l'industrie de la coiffure, Dikson continue d'évoluer et d'innover pour offrir les meilleurs produits et services à ses clients professionnels.</p>

                            <div class="text-center mt-5">
                                <a href="{{route('shop.dikson')}}" class="btn-shop">
                                    Découvrir nos produits Dikson <i class="fas fa-arrow-right"></i>
                                </a>
                                <a href="{{asset('documents/brands/dikson-catalog.pdf')}}" class="btn-catalog" target="_blank">
                                    <i class="fas fa-file-pdf"></i> Télécharger le catalogue
                                </a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Newsletter Section -->
                <section class="newsletter-section">
                    <div class="container">
                        <div class="newsletter-container">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="newsletter-content">
                                        <h2 class="newsletter-title">Restez informé</h2>
                                        <p class="newsletter-description">Abonnez-vous à notre newsletter pour recevoir les dernières nouveautés et offres exclusives de Dikson Professionelle.</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="px-4" id="dikson-newsletter-form">
                                        @csrf
                                        <input type="hidden" name="form_source" value="dikson_page">
                                        <input type="hidden" name="privacy_check" value="1">

                                        @if (session('success'))
                                            <div class="newsletter-message mb-3 text-white">
                                                <p class="mb-0"><i class="d-icon-heart"></i> Nous sommes ravis que vous vous abonniez à notre newsletter</p>
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

                                        <div class="d-flex gap-2">
                                            <input type="email" class="form-control stylish-input flex-grow-1" name="email" id="dikson-newsletter-email"
                                                placeholder="Votre adresse email" required value="{{ old('email') }}">
                                            <button class="btn btn-primary stylish-button" type="submit" id="dikson-newsletter-submit">S'abonner</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Newsletter Section -->
            </div>
        </main>
        <!-- End Main -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const newsletterForm = document.getElementById('dikson-newsletter-form');

            if (newsletterForm) {
                newsletterForm.addEventListener('submit', function(e) {
                    e.preventDefault(); // Prevent default form submission

                    const submitButton = document.getElementById('dikson-newsletter-submit');
                    const emailInput = document.getElementById('dikson-newsletter-email');
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
                            welcomeMessage.innerHTML = '<p class="mb-0"><i class="d-icon-heart"></i> Nous sommes ravis que vous vous abonniez à notre newsletter</p>';

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
                            submitButton.innerHTML = 'S\'abonner';
                            submitButton.disabled = false;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        submitButton.innerHTML = 'S\'abonner';
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

    <!-- Load unified JavaScript files -->
    <script src="{{ asset('js/custom/newsletter.js') }}"></script>

    <!-- Add background image style for this specific page -->
    <style>
        .brand-hero-section {
            background-image: linear-gradient(rgba(26, 42, 58, 0.85), rgba(26, 42, 58, 0.85)), url('{{asset('images/demos/demo-beauty/page-header.jpg')}}');
        }


        /* Dikson brand-specific styles that differ from unified components */

        /* Brand Intro Section Styles */
        .brand-intro-section {
            padding: 5rem 0;
            background-color: white;
        }

        .brand-image-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .brand-image-container:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        .brand-description h2 {
            font-size: 2.7rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #1A2A3A;
        }

        .brand-description .lead {
            font-size: 1.5rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
            color: #20c7d9;
        }

        .brand-description p {
            font-size: 1.3rem;
            line-height: 1.8;
            color: #555;
            margin-bottom: 1.5rem;
        }

        .brand-features h4 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #1A2A3A;
        }

        .list-type-check {
            padding-left: 0;
            list-style: none;
        }

        .list-type-check li {
            position: relative;
            padding-left: 30px;
            margin-bottom: 1rem;
            font-size: 1.3rem;
            color: #555;
        }

        .list-type-check li:before {
            content: '\f00c';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            left: 0;
            top: 4px;
            color: #20c7d9;
        }

        .product-category-card {
            background-color: #f8f9fa;
            border-radius: 12px;
            padding: 2rem;
            height: 100%;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }

        .product-category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .product-category-card h4 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #1A2A3A;
        }

        .product-category-card p {
            font-size: 1.3rem;
            line-height: 1.7;
            color: #555;
        }

        .title-border {
            position: relative;
            font-size: 2.2rem;
            font-weight: 700;
            color: #1A2A3A;
            padding-bottom: 1rem;
            margin-bottom: 2rem;
        }

        .title-border:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 3px;
            background-color: #20c7d9;
        }

        .btn-shop {
            display: inline-flex;
            align-items: center;
            padding: 1rem 2rem;
            background-color: #1A2A3A;
            color: white;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.3rem;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-right: 1rem;
        }

        .btn-shop i {
            margin-left: 0.5rem;
            transition: transform 0.3s ease;
        }

        .btn-shop:hover {
            background-color: #20c7d9;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            color: white;
        }

        .btn-shop:hover i {
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
            font-size: 1.3rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-catalog i {
            margin-right: 0.5rem;
        }

        .btn-catalog:hover {
            background-color: #1A2A3A;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        /* Dikson-specific newsletter section styles */
        .newsletter-section {
            padding: 5rem 0;
            background-color: #f8f9fa;
        }

        .newsletter-container {
            border-radius: 10px;
        }

        .newsletter-title {
            font-size: 2.4rem;
            text-shadow: 0 1px 3px rgba(0,0,0,0.2);
        }

        .newsletter-description {
            font-size: 1.3rem;
            line-height: 1.6;
            opacity: 0.95;
        }

        .newsletter-form .input-group {
            border-radius: 50px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .newsletter-form .form-control {
            border: none;
            padding: 1.2rem 1.5rem;
            font-size: 1rem;
            background-color: #ffffff;
            color: #333333;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
        }

        .newsletter-form .form-control::placeholder {
            color: #777777;
            opacity: 0.8;
        }

        .newsletter-form .form-control:focus {
            outline: none;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1), 0 0 8px rgba(255,255,255,0.6);
        }

        .newsletter-form .btn {
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 0 50px 50px 0;
        }

        .newsletter-form .form-check {
            margin-left: 10px;
            display: flex;
            align-items: center;
        }

        .newsletter-form .form-check-label {
            color: white;
            font-size: 0.9rem;
            opacity: 1;
            margin-left: 8px;
            cursor: pointer;
        }

        .newsletter-form .form-check-input {
            margin-top: 0;
            width: 18px;
            height: 18px;
            cursor: pointer;
            border: 2px solid white;
            background-color: transparent;
        }

        .newsletter-form .form-check-input:checked {
            background-color: white;
            border-color: white;
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
            border-color: #20c7d9;
            box-shadow: 0 0 0 0.25rem rgba(32, 199, 217, 0.25);
            color: white;
            outline: none;
            transition: all 0.3s ease;
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

        /* Dikson-specific responsive styles */
        @media (max-width: 991px) {
            .brand-description h2 {
                font-size: 2.4rem;
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
            .brand-description h2 {
                font-size: 2rem;
            }

            .brand-description .lead {
                font-size: 1.3rem;
            }

            .btn-shop, .btn-catalog {
                display: block;
                width: 100%;
                margin-bottom: 1rem;
                text-align: center;
                justify-content: center;
            }
        }
    </style>
@endsection('content')
