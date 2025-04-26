@extends('.__base')

@section('content')

    <style>
        /* Hero Section Styles */
        .hero-section {
            position: relative;
            margin-bottom: 4rem;
        }

        .hero-banner {
            position: relative;
            height: 600px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.6) 50%, rgba(0,0,0,0.4) 100%);
        }

        .hero-content {
            position: relative;
            padding: 120px 0;
            color: white;
            max-width: 600px;
        }

        .hero-subtitle {
            font-size: 1.6rem;
            font-weight: 400;
            margin-bottom: 1.5rem;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .hero-title {
            font-size: 3.8rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            color: #ffffff;
            text-shadow: 0 2px 10px rgba(0,0,0,0.7);
        }

        .hero-description {
            font-size: 1.4rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .hero-buttons .btn {
            margin-right: 1rem;
            padding: 12px 30px;
            font-weight: 600;
        }

        .hero-buttons .btn-outline {
            border: 2px solid white;
            color: white;
            background: transparent;
        }

        .hero-buttons .btn-outline:hover {
            background: white;
            color: #333;
        }

        /* Brand Story Section Styles */
        .brand-story-section {
            padding: 5rem 0;
            background-color: #f8f9fa;
        }

        .section-title {
            font-size: 2.7rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #1A2A3A;
        }

        .section-description {
            font-size: 1.3rem;
            line-height: 1.7;
            color: #555;
            margin-bottom: 1.5rem;
        }

        .brand-features {
            margin-top: 2rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .feature-icon {
            width: 30px;
            height: 30px;
            background-color: #1A2A3A;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: white;
        }

        .feature-text {
            font-size: 1.3rem;
            color: #333;
        }

        .brand-story-image {
            position: relative;
            text-align: center;
            background-color: #1A2A3A; /* Dark blue background to make white SVGs visible */
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 2rem;
            min-height: 250px;
        }

        .brand-story-image img {
            max-width: 70%;
            height: auto;
            margin: 0 auto;
            display: block;
            filter: brightness(1.2) drop-shadow(0 0 10px rgba(255,255,255,0.3)); /* Brighten and add shadow for SVG */
        }



        /* Professional Brands Section Styles */
        .professional-brands-section {
            padding: 5rem 0;
        }

        .section-header {
            margin-bottom: 3rem;
        }

        .section-subtitle {
            font-size: 1.4rem;
            color: #666;
            max-width: 700px;
            margin: 0 auto;
        }

        .brand-card {
            position: relative;
            height: 450px;
            width: 100%;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.5s cubic-bezier(0.33, 1, 0.68, 1);
        }

        .brand-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }

        .brand-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s ease;
        }

        .brand-card:hover .brand-image {
            transform: scale(1.05);
        }

        .brand-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.5s ease;
        }

        .brand-card:hover .brand-overlay {
            background: rgba(0,0,0,0.1);
        }

        .brand-title {
            color: white;
            font-size: 28px;
            font-weight: 700;
            text-align: center;
            margin: 0;
            padding: 0 20px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.5);
            transition: all 0.5s ease;
        }

        .brand-card:hover .brand-title {
            transform: scale(1.1);
        }

        .brand-content {
            position: absolute;
            bottom: -100px;
            left: 0;
            width: 100%;
            padding: 25px;
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0) 100%);
            color: white;
            text-align: center;
            transition: all 0.5s ease;
            opacity: 0;
        }


        .brand-card:hover .brand-content {
            bottom: 0;
            opacity: 1;
        }

        .btn-discover {
            display: inline-block;
            padding: 10px 25px;
            background-color: white;
            color: #333;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            transform: translateY(20px);
            opacity: 0;
            transition: all 0.5s ease 0.2s;
        }

        .brand-card:hover .btn-discover {
            transform: translateY(0);
            opacity: 1;
        }

        .btn-discover:hover {
            background-color: #f8f9fa;
            transform: translateY(-3px) !important;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
    </style>

    <div class="page-wrapper">
        <h1 class="d-none">Muster & Dikson</h1>

        <main class="main home">
            <div class="page-content">



                <!-- Modern Hero Section -->
                <section class="hero-section">
                    <div class="hero-banner" style="background-image: url('https://cdn.prod.website-files.com/67cecb793a28462cd4502dc5/67dac46ef66c08cae0975461_M%26D_Produzione.webp');">
                        <div class="hero-overlay"></div>
                        <div class="container">
                            <div class="hero-content">
                                <h4 class="hero-subtitle">La Beauté Sans Limites</h4>
                                <h1 class="hero-title">Soins Capillaires Professionnels <br>Depuis 1965</h1>
                                <p class="hero-description">Découvrez l'excellence des produits professionnels pour les coiffeurs et les esthéticiennes</p>
                                <div class="hero-buttons">
                                    <a href="{{route('shop.muster')}}" class="btn btn-primary btn-lg">Découvrir nos produits</a>
                                    <a href="{{route('ourbrands')}}" class="btn btn-outline btn-lg">Nos marques</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Brand Story Section -->
                <section class="brand-story-section">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="brand-story-content">
                                    <h2 class="section-title">60 ans d'innovation et d'excellence</h2>
                                    <p class="section-description">Depuis 1965, Muster & Dikson façonne l'industrie en créant des solutions professionnelles qui permettent aux coiffeurs et aux experts en beauté du monde entier d'offrir des produits de haute qualité à ceux qui recherchent la beauté au quotidien.</p>
                                    <p class="section-description">Notre engagement envers la qualité, l'innovation et le service a fait de nous un partenaire de confiance pour les professionnels de la beauté dans le monde entier.</p>
                                    <div class="brand-features">
                                        <div class="feature-item">
                                            <div class="feature-icon">
                                                <i class="d-icon-check"></i>
                                            </div>
                                            <div class="feature-text">Produits professionnels de haute qualité</div>
                                        </div>
                                        <div class="feature-item">
                                            <div class="feature-icon">
                                                <i class="d-icon-check"></i>
                                            </div>
                                            <div class="feature-text">Recherche et développement continus</div>
                                        </div>
                                        <div class="feature-item">
                                            <div class="feature-icon">
                                                <i class="d-icon-check"></i>
                                            </div>
                                            <div class="feature-text">Fabrication 100% italienne</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="brand-story-image">
                                    <img src="{{asset('images/svg/logo-verticale.svg')}}" alt="Muster & Dikson Logo" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Professional Brands Section -->
                <section class="professional-brands-section">
                    <div class="container">
                        <div class="section-header text-center">
                            <h2 class="section-title">Nos marques professionnelles</h2>
                            <p class="section-subtitle">Découvrez notre gamme complète de marques professionnelles pour tous vos besoins</p>
                        </div>

                        <div class="row">
                            <!-- Dikson Professionelle Brand -->
                            <div class="col-md-4 mb-5">
                                <div class="brand-card">
                                    <img src="https://cdn.prod.website-files.com/67cecb7a3a28462cd4502f56/67dacee215113144868eaad2_01_HP_BOX_BRAND_DKPRO.webp" alt="Dikson Professionelle" class="brand-image">
                                    <div class="brand-overlay">
                                        <!-- Logo will be added later -->
                                        <h3 class="brand-title">Dikson Professionelle</h3>
                                    </div>
                                    <div class="brand-content">
                                        <a href="{{route('brand.dikson')}}" class="btn-discover">Découvrir</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Muster Electric 4 Hair Brand -->
                            <div class="col-md-4 mb-5">
                                <div class="brand-card">
                                    <img src="https://cdn.prod.website-files.com/67cecb7a3a28462cd4502f56/67dacfefa2d68ceca7b6e6b1_06_HP_BOX_BRAND_E4H.webp" alt="Muster Electric 4 Hair" class="brand-image">
                                    <div class="brand-overlay">
                                        <!-- Logo will be added later -->
                                        <h3 class="brand-title">Muster Electric 4 Hair</h3>
                                    </div>
                                    <div class="brand-content">
                                        <a href="{{route('brand.electric')}}" class="btn-discover">Découvrir</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Muster Benexere Professionelle Brand -->
                            <div class="col-md-4 mb-5">
                                <div class="brand-card">
                                    <img src="https://cdn.prod.website-files.com/67cecb7a3a28462cd4502f56/67daef64234e4e8cf7e1de81_08_HP_BOX_BRAND_BXE.webp" alt="Muster Benexere Professionelle" class="brand-image">
                                    <div class="brand-overlay">
                                        <!-- Logo will be added later -->
                                        <h3 class="brand-title">Muster Benexere Professionelle</h3>
                                    </div>
                                    <div class="brand-content">
                                        <a href="{{route('brand.benexere')}}" class="btn-discover">Découvrir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Featured Product Section -->
                <section class="featured-product-section">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="featured-product-content">
                                    <span class="featured-label">Produit Vedette</span>
                                    <h2 class="featured-title">Ciseaux professionnels Müster</h2>
                                    <p class="featured-description">Découvrez notre gamme de ciseaux professionnels, conçus pour offrir précision et confort aux coiffeurs exigeants. Fabriqués avec les meilleurs matériaux, nos ciseaux sont le choix des professionnels du monde entier.</p>
                                    <ul class="featured-features">
                                        <li><i class="d-icon-check"></i> Acier inoxydable de haute qualité</li>
                                        <li><i class="d-icon-check"></i> Design ergonomique pour un confort optimal</li>
                                        <li><i class="d-icon-check"></i> Précision exceptionnelle pour des coupes parfaites</li>
                                    </ul>
                                    <a href="{{ asset('pdf/muster_scissors.pdf') }}" class="btn btn-primary btn-lg">Télécharger le catalogue <i class="d-icon-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="featured-product-image">
                                    <img src="{{asset('images/front/img_1.png')}}" alt="Ciseaux professionnels Müster" class="img-fluid">
                                </div>
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
                    /* Featured Product Section Styles */
                    .featured-product-section {
                        padding: 5rem 0;
                        background-color: #fff;
                    }

                    .featured-product-content {
                        padding-right: 3rem;
                    }

                    .featured-label {
                        display: inline-block;
                        background-color: #1A2A3A;
                        color: white;
                        padding: 0.5rem 1rem;
                        border-radius: 30px;
                        font-size: 0.9rem;
                        margin-bottom: 1.5rem;
                        text-transform: uppercase;
                        letter-spacing: 1px;
                    }

                    .featured-title {
                        font-size: 2.7rem;
                        font-weight: 700;
                        margin-bottom: 1.5rem;
                        color: #1A2A3A;
                    }

                    .featured-description {
                        font-size: 1.3rem;
                        line-height: 1.7;
                        color: #555;
                        margin-bottom: 2rem;
                    }

                    .featured-features {
                        list-style: none;
                        padding: 0;
                        margin-bottom: 2rem;
                    }

                    .featured-features li {
                        display: flex;
                        align-items: center;
                        margin-bottom: 1rem;
                        font-size: 1.3rem;
                        color: #333;
                    }

                    .featured-features li i {
                        color: #1A2A3A;
                        margin-right: 1rem;
                        font-size: 1.2rem;
                    }

                    .featured-product-image {
                        border-radius: 10px;
                        overflow: hidden;
                        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                    }

                    .featured-product-image img {
                        width: 100%;
                        height: auto;
                        transition: transform 0.5s ease;
                    }

                    .featured-product-image:hover img {
                        transform: scale(1.05);
                    }

                    /* Newsletter Section Styles */
                    .newsletter-section {
                        padding: 5rem 0;
                        background-color: #f8f9fa;
                    }

                    .newsletter-container {
                        background-color: #1A2A3A;
                        border-radius: 10px;
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

                    /* New stylish input and button styles */
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

                    /* Alert styles */
                    .alert {
                        padding: 0.75rem 1.25rem;
                        margin-bottom: 1rem;
                        border: 1px solid transparent;
                        border-radius: 0.25rem;
                    }

                    .alert-success {
                        color: #155724;
                        background-color: #d4edda;
                        border-color: #c3e6cb;
                    }

                    .alert-info {
                        color: #0c5460;
                        background-color: #d1ecf1;
                        border-color: #bee5eb;
                    }

                    .alert-danger {
                        color: #721c24;
                        background-color: #f8d7da;
                        border-color: #f5c6cb;
                    }

                    .alert ul {
                        padding-left: 1.25rem;
                        margin-bottom: 0;
                    }

                    @media (max-width: 991px) {
                        .featured-product-content {
                            padding-right: 0;
                            margin-bottom: 3rem;
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

                        .brand-story-image {
                            margin-top: 2rem;
                        }
                    }

                    @media (min-width: 768px) and (max-width: 991px) {
                        .brand-story-image {
                            min-height: 220px;
                        }

                        .brand-story-image img {
                            max-width: 60%;
                        }
                    }

                    @media (max-width: 576px) {
                        .px-4 {
                            padding-left: 1rem !important;
                            padding-right: 1rem !important;
                        }

                        .brand-story-image {
                            margin-top: 2rem;
                            padding: 1.5rem;
                            min-height: 200px;
                        }

                        .brand-story-image img {
                            max-width: 80%;
                        }


                    }
                </style>

                <!-- Benefits Section -->
                <section class="benefits-section">
                    <div class="container">
                        <div class="section-header text-center">
                            <h2 class="section-title">Pourquoi nous choisir</h2>
                            <p class="section-subtitle">Découvrez les avantages qui font de Muster & Dikson votre partenaire de confiance</p>
                        </div>

                        <div class="row benefits-row">
                            <div class="col-md-4">
                                <div class="benefit-card">
                                    <div class="benefit-icon">
                                        <i class="d-icon-truck"></i>
                                    </div>
                                    <div class="benefit-content">
                                        <h3 class="benefit-title">Livraison & Retour Offerts</h3>
                                        <p class="benefit-description">Profitez de la livraison de vos commandes partout dans le Maroc avec un service rapide et fiable.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="benefit-card">
                                    <div class="benefit-icon">
                                        <i class="d-icon-service"></i>
                                    </div>
                                    <div class="benefit-content">
                                        <h3 class="benefit-title">Service Client Premium</h3>
                                        <p class="benefit-description">Notre équipe d'experts est disponible 24/7 pour vous accompagner et répondre à toutes vos questions.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="benefit-card">
                                    <div class="benefit-icon">
                                        <i class="d-icon-star"></i>
                                    </div>
                                    <div class="benefit-content">
                                        <h3 class="benefit-title">Qualité Professionnelle</h3>
                                        <p class="benefit-description">Des produits de haute qualité développés spécifiquement pour les professionnels de la coiffure et de la beauté.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <style>
                    /* Benefits Section Styles */
                    .benefits-section {
                        padding: 5rem 0;
                        background-color: #f8f9fa;
                    }

                    .benefits-row {
                        margin-top: 3rem;
                    }

                    .benefit-card {
                        background-color: white;
                        border-radius: 10px;
                        padding: 2.5rem;
                        height: 100%;
                        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
                        transition: all 0.3s ease;
                    }

                    .benefit-card:hover {
                        transform: translateY(-10px);
                        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                    }

                    .benefit-icon {
                        font-size: 3rem;
                        color: #1A2A3A;
                        margin-bottom: 1.5rem;
                    }

                    .benefit-title {
                        font-size: 1.7rem;
                        font-weight: 600;
                        margin-bottom: 1rem;
                        color: #1A2A3A;
                    }

                    .benefit-description {
                        font-size: 1.2rem;
                        line-height: 1.6;
                        color: #666;
                    }
                </style>

                <!-- Blog Section -->
                <section class="blog-section">
                    <div class="container">
                        <div class="section-header text-center">
                            <h2 class="section-title">Dernières Nouvelles</h2>
                            <p class="section-subtitle">Restez informé des dernières tendances et actualités du monde de la coiffure et de la beauté</p>
                        </div>

                        <div class="row">
                            @foreach ($recentPosts as $recentPost)
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="blog-card">
                                        <div class="blog-image">
                                            <a href="{{ route('posts.show', $recentPost->id) }}">
                                                <img src="{{ asset('storage/' . $recentPost->image) }}" alt="{{ $recentPost->title }}" class="img-fluid">
                                            </a>
                                            <div class="blog-date">
                                                <span class="day">{{ $recentPost->created_at->format('d') }}</span>
                                                <span class="month">{{ $recentPost->created_at->format('M') }}</span>
                                            </div>
                                        </div>
                                        <div class="blog-content">
                                            <h3 class="blog-title">
                                                <a href="{{ route('posts.show', $recentPost->id) }}">{{ $recentPost->title }}</a>
                                            </h3>
                                            <p class="blog-excerpt">{{ Str::limit($recentPost->body, 100) }}</p>
                                            <a href="{{ route('posts.show', $recentPost->id) }}" class="blog-link">En savoir plus <i class="d-icon-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="text-center mt-4">
                            <a href="{{ route('blog') }}" class="btn btn-outline btn-lg">Voir tous les articles</a>
                        </div>
                    </div>
                </section>

                <style>
                    /* Blog Section Styles */
                    .blog-section {
                        padding: 5rem 0;
                        background-color: #fff;
                    }

                    .blog-card {
                        background-color: white;
                        border-radius: 10px;
                        overflow: hidden;
                        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
                        height: 100%;
                        transition: all 0.3s ease;
                    }

                    .blog-card:hover {
                        transform: translateY(-10px);
                        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
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
                        border-radius: 5px;
                        text-align: center;
                        line-height: 1.2;
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

                    .blog-content {
                        padding: 1.5rem;
                    }

                    .blog-title {
                        font-size: 1.5rem;
                        font-weight: 600;
                        margin-bottom: 1rem;
                        line-height: 1.4;
                    }

                    .blog-title a {
                        color: #1A2A3A;
                        text-decoration: none;
                        transition: color 0.3s ease;
                    }

                    .blog-title a:hover {
                        color: #4A8B9F;
                    }

                    .blog-excerpt {
                        font-size: 1.2rem;
                        line-height: 1.6;
                        color: #666;
                        margin-bottom: 1.5rem;
                    }

                    .blog-link {
                        color: #1A2A3A;
                        font-weight: 600;
                        font-size: 1.2rem;
                        text-decoration: none;
                        display: inline-flex;
                        align-items: center;
                        transition: color 0.3s ease;
                    }

                    .blog-link i {
                        margin-left: 0.5rem;
                        transition: transform 0.3s ease;
                    }

                    .blog-link:hover {
                        color: #4A8B9F;
                    }

                    .blog-link:hover i {
                        transform: translateX(5px);
                    }
                </style>

            </div>

        </main>
        <!-- End Main -->
    </div>


@endsection('content')
