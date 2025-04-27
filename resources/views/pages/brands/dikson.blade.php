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
                            <nav aria-label="breadcrumb">
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
                <section class="brand-newsletter-section">
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
                    </div>
                </section>
                <!-- End Newsletter Section -->
            </div>
        </main>
        <!-- End Main -->
    </div>

    <style>
        /* Brand Hero Section Styles */
        .brand-hero-section {
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

        .brand-hero-content {
            padding: 2rem 0;
        }

        .brand-hero-subtitle {
            display: inline-block;
            font-size: 1.2rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
            color: #20c7d9;
            letter-spacing: 1px;
        }

        .brand-hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: white;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .brand-hero-description {
            font-size: 1.4rem;
            max-width: 800px;
            margin: 0 auto;
            color: rgba(255, 255, 255, 0.9);
        }

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

        /* Newsletter Section Styles */
        .brand-newsletter-section {
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
            .brand-hero-title {
                font-size: 2.8rem;
            }

            .brand-hero-description {
                font-size: 1.3rem;
            }

            .brand-description h2 {
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
            .brand-hero-section {
                padding: 4rem 0 3rem;
            }

            .brand-hero-title {
                font-size: 2.2rem;
            }

            .brand-hero-description {
                font-size: 1.2rem;
            }

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
