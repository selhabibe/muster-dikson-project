@extends('.__base_main')

@section('meta')
    <meta name="description" content="Découvrez les marques professionnelles de Muster & Dikson: Dikson Professionelle, Muster Electric 4 Hair et Muster Benexere Professionelle. Des produits de haute qualité pour les professionnels de la beauté.">
    <meta name="keywords" content="Muster & Dikson, marques professionnelles, Dikson Professionelle, Muster Electric 4 Hair, Muster Benexere Professionelle, produits coiffure, beauté professionnelle">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Nos Marques Professionnelles | Muster & Dikson">
    <meta property="og:description" content="Découvrez les marques professionnelles de Muster & Dikson: Dikson Professionelle, Muster Electric 4 Hair et Muster Benexere Professionelle. Des produits de haute qualité pour les professionnels de la beauté.">
    <meta property="og:image" content="{{ asset('images/demos/demo-beauty/page-header.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Nos Marques Professionnelles | Muster & Dikson">
    <meta property="twitter:description" content="Découvrez les marques professionnelles de Muster & Dikson: Dikson Professionelle, Muster Electric 4 Hair et Muster Benexere Professionelle. Des produits de haute qualité pour les professionnels de la beauté.">
    <meta property="twitter:image" content="{{ asset('images/demos/demo-beauty/page-header.jpg') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
@endsection

@section('breadcrumbs')
    <x-breadcrumb
        :items="[
            ['name' => 'Accueil', 'url' => route('index')],
            ['name' => 'Nos marques', 'url' => route('ourbrands')]
        ]"
        theme="light"
    />
@endsection

@section('content')
    <div class="page-wrapper">
        <main class="main">
            <!-- Hero Section -->
            <section class="brands-hero-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="brands-hero-content text-center">
                                <span class="brands-hero-subtitle">Excellence professionnelle</span>
                                <h1 class="brands-hero-title">Nos marques professionnelles</h1>
                                <p class="brands-hero-description">Découvrez notre gamme complète de marques professionnelles pour tous vos besoins</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Brands Content -->
            <div class="page-content">
                <section class="brands-intro-section">
                    <div class="container">
                        <div class="section-header text-center">
                            <span class="section-subtitle">Notre sélection</span>
                            <h2 class="section-title">Des marques d'exception</h2>
                            <p class="section-description">
                                Chez Muster & Dikson, nous proposons des marques professionnelles reconnues pour leur qualité et leur innovation. Chaque marque a été soigneusement sélectionnée pour répondre aux besoins spécifiques des professionnels de la beauté.
                            </p>
                        </div>

                    <div class="row justify-content-center">
                        <!-- Dikson Professionelle Brand -->
                        <div class="col-md-4 mb-5">
                            <div class="brand-card">
                                <img src="https://cdn.prod.website-files.com/67cecb7a3a28462cd4502f56/67dacee215113144868eaad2_01_HP_BOX_BRAND_DKPRO.webp" alt="Dikson Professionelle" class="brand-image">
                                <div class="brand-overlay">
                                    <!-- Logo will be added later -->
                                    <!-- <img src="{{asset('images/brands/dikson-logo.png')}}" alt="Dikson Professionelle" class="brand-logo"> -->
                                    <!-- <h3 class="brand-title">Dikson Professionelle</h3> -->
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
                                    <!-- <img src="{{asset('images/brands/muster-electric-logo.png')}}" alt="Muster Electric 4 Hair" class="brand-logo"> -->
                                    <!-- <h3 class="brand-title">Muster Electric 4 Hair</h3> -->
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
                                    <!-- <img src="{{asset('images/brands/muster-benexere-logo.png')}}" alt="Muster Benexere Professionelle" class="brand-logo"> -->
                                    <!-- <h3 class="brand-title">Muster Benexere Professionelle</h3> -->
                                </div>
                                <div class="brand-content">
                                    <a href="{{route('brand.benexere')}}" class="btn-discover">Découvrir</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <style>
                        /* Force higher specificity for brand card hover effects */
                        .brands-intro-section .brand-card {
                            position: relative;
                            height: 450px;
                            width: 100%;
                            border-radius: 16px;
                            overflow: hidden;
                            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                            transition: all 0.5s cubic-bezier(0.33, 1, 0.68, 1) !important;
                            cursor: pointer;
                        }

                        .brands-intro-section .brand-card:hover {
                            /* transform: translateY(-10px) !important; */
                            box-shadow: 0 15px 35px rgba(0,0,0,0.2) !important;
                        }

                        .brands-intro-section .brand-image {
                            width: 100%;
                            height: 100%;
                            object-fit: cover;
                            transition: transform 0.7s ease !important;
                        }

                        .brands-intro-section .brand-card:hover .brand-image {
                            transform: scale(1.05) !important;
                        }

                        .brands-intro-section .brand-overlay {
                            position: absolute;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background: rgba(0,0,0,0.3);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            transition: all 0.5s ease !important;
                        }

                        .brands-intro-section .brand-card:hover .brand-overlay {
                            background: rgba(0,0,0,0.1) !important;
                        }

                        .brand-logo {
                            max-width: 70%;
                            max-height: 70%;
                            filter: drop-shadow(0 0 10px rgba(0,0,0,0.3));
                            transition: all 0.5s ease;
                            z-index: 2;
                        }

                        .brand-card:hover .brand-logo {
                            transform: scale(1.1);
                            filter: drop-shadow(0 10px 20px rgba(0,0,0,0.5));
                        }

                        .brand-title {
                            color: white;
                            font-size: 24px;
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

                        .brands-intro-section .brand-content {
                            position: absolute;
                            bottom: -100px;
                            left: 0;
                            width: 100%;
                            padding: 25px;
                            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0) 100%);
                            color: white;
                            text-align: center;
                            transition: all 0.5s ease !important;
                            opacity: 0;
                        }

                        .brands-intro-section .brand-card:hover .brand-content {
                            bottom: 0 !important;
                            opacity: 1 !important;
                        }

                        .brands-intro-section .btn-discover {
                            display: inline-block;
                            padding: 10px 25px;
                            background-color: white;
                            color: #333;
                            border-radius: 30px;
                            font-weight: 600;
                            text-decoration: none;
                            transition: all 0.5s ease 0.2s !important;
                            transform: translateY(20px);
                            opacity: 0;
                        }

                        .brands-intro-section .brand-card:hover .btn-discover {
                            transform: translateY(0) !important;
                            opacity: 1 !important;
                        }

                        .brands-intro-section .btn-discover:hover {
                            background-color: #f8f9fa !important;
                            transform: translateY(-3px) !important;
                            box-shadow: 0 5px 15px rgba(0,0,0,0.2) !important;
                            color: #333 !important;
                        }

                        /* Animation for smooth transitions */
                        @keyframes fadeIn {
                            from { opacity: 0; transform: translateY(20px); }
                            to { opacity: 1; transform: translateY(0); }
                        }

                        .brand-card {
                            animation: fadeIn 0.8s ease forwards;
                        }

                        .col-md-4:nth-child(1) .brand-card { animation-delay: 0.1s; }
                        .col-md-4:nth-child(2) .brand-card { animation-delay: 0.3s; }
                        .col-md-4:nth-child(3) .brand-card { animation-delay: 0.5s; }

                        /* Force hover class for JavaScript-triggered effects */
                        .brands-intro-section .brand-card.force-hover {
                            /* transform: translateY(-10px) !important; */
                            box-shadow: 0 15px 35px rgba(0,0,0,0.2) !important;
                        }

                        .brands-intro-section .brand-card.force-hover .brand-image {
                            transform: scale(1.05) !important;
                        }

                        .brands-intro-section .brand-card.force-hover .brand-overlay {
                            background: rgba(0,0,0,0.1) !important;
                        }

                        .brands-intro-section .brand-card.force-hover .brand-content {
                            bottom: 0 !important;
                            opacity: 1 !important;
                        }

                        .brands-intro-section .brand-card.force-hover .btn-discover {
                            transform: translateY(0) !important;
                            opacity: 1 !important;
                        }

                        /* Ensure hover effects work on touch devices */
                        @media (hover: none) {
                            .brands-intro-section .brand-card:active .brand-image {
                                transform: scale(1.05) !important;
                            }

                            .brands-intro-section .brand-card:active .brand-content {
                                bottom: 0 !important;
                                opacity: 1 !important;
                            }

                            .brands-intro-section .brand-card:active .btn-discover {
                                transform: translateY(0) !important;
                                opacity: 1 !important;
                            }
                        }
                    </style>

                    <script>
                        // Ensure hover effects work properly
                        document.addEventListener('DOMContentLoaded', function() {
                            const brandCards = document.querySelectorAll('.brand-card');

                            brandCards.forEach(card => {
                                // Force hover state on mouse enter
                                card.addEventListener('mouseenter', function() {
                                    this.classList.add('force-hover');
                                });

                                // Remove hover state on mouse leave
                                card.addEventListener('mouseleave', function() {
                                    this.classList.remove('force-hover');
                                });

                                // Handle touch devices
                                card.addEventListener('touchstart', function() {
                                    this.classList.add('force-hover');
                                });

                                card.addEventListener('touchend', function() {
                                    setTimeout(() => {
                                        this.classList.remove('force-hover');
                                    }, 2000);
                                });
                            });
                        });
                    </script>

                    </div>
                </section>

                <!-- Brand Features Section -->
                <section class="brand-features-section">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <div class="features-content">
                                    <span class="section-subtitle">Pourquoi choisir nos marques</span>
                                    <h2 class="section-title">L'excellence professionnelle à votre service</h2>
                                    <p class="section-description">
                                        Nos marques professionnelles sont reconnues dans le monde entier pour leur qualité exceptionnelle et leurs résultats remarquables. Développées en Italie, elles bénéficient d'un savoir-faire unique et d'une recherche constante d'innovation.
                                    </p>
                                    <div class="brand-features-list">
                                        <div class="feature-item">
                                            <div class="feature-icon">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <div class="feature-text">Formules professionnelles de haute qualité</div>
                                        </div>
                                        <div class="feature-item">
                                            <div class="feature-icon">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <div class="feature-text">Produits testés et approuvés par les professionnels</div>
                                        </div>
                                        <div class="feature-item">
                                            <div class="feature-icon">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <div class="feature-text">Résultats visibles et durables</div>
                                        </div>
                                        <div class="feature-item">
                                            <div class="feature-icon">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <div class="feature-text">Fabrication italienne respectueuse de l'environnement</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="features-image">
                                    <img src="{{asset('images/front/factory.jpg')}}" alt="Fabrication Muster & Dikson" class="img-fluid rounded">
                                    <div class="image-overlay"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Brand Features Section -->

                <!-- Call to Action Section -->
                <section class="cta-section">
                    <div class="container">
                        <div class="cta-container">
                            <div class="row align-items-center">
                                <div class="col-lg-8 mb-4 mb-lg-0">
                                    <div class="cta-content">
                                        <h2 class="cta-title">Besoin de plus d'informations?</h2>
                                        <p class="cta-description">Contactez-nous pour en savoir plus sur nos marques et produits professionnels</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-lg-end">
                                    <a href="{{route('contact')}}" class="btn-cta">
                                        Nous contacter <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Call to Action Section -->
            </div>
        </main>
        <!-- End Main -->
    </div>

    <style>
        /* Brands Hero Section Styles */
        .brands-hero-section {
            padding: 6rem 0 4rem;
            background-color: #1A2A3A;
            background-image: linear-gradient(rgba(26, 42, 58, 0.85), rgba(26, 42, 58, 0.85)), url('{{asset('images/demos/demo-beauty/page-header.jpg')}}');
            background-size: cover;
            background-position: center;
            color: white;
            margin-bottom: 3rem;
        }



        .brands-hero-content {
            padding: 2rem 0;
        }

        .brands-hero-subtitle {
            display: inline-block;
            font-size: 1.2rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
            color: #20c7d9;
            letter-spacing: 1px;
        }

        .brands-hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: white;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .brands-hero-description {
            font-size: 1.4rem;
            max-width: 800px;
            margin: 0 auto;
            color: rgba(255, 255, 255, 0.9);
        }

        /* Brands Intro Section Styles */
        .brands-intro-section {
            padding: 5rem 0;
            background-color: white;
        }

        .section-header {
            margin-bottom: 3rem;
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
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Brand Features Section Styles */
        .brand-features-section {
            padding: 5rem 0;
            background-color: #f8f9fa;
        }

        .features-content {
            padding-right: 3rem;
        }

        .brand-features-list {
            margin-top: 2rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            background-color: rgba(32, 199, 217, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: #20c7d9;
            flex-shrink: 0;
        }

        .feature-text {
            font-size: 1.3rem;
            font-weight: 500;
            color: #333;
        }

        .features-image {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .features-image img {
            width: 100%;
            height: auto;
            transition: transform 0.5s ease;
        }

        .features-image:hover img {
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

        /* Call to Action Section Styles */
        .cta-section {
            padding: 5rem 0;
            background-color: white;
        }

        .cta-container {
            background-color: #1A2A3A;
            border-radius: 12px;
            padding: 3rem;
            color: white;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .cta-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: white;
        }

        .cta-description {
            font-size: 1.4rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 0;
        }

        .btn-cta {
            display: inline-flex;
            align-items: center;
            padding: 1rem 2rem;
            background-color: #20c7d9;
            color: white;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.3rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-cta i {
            margin-left: 0.5rem;
            transition: transform 0.3s ease;
        }

        .btn-cta:hover {
            background-color: white;
            color: #1A2A3A;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .btn-cta:hover i {
            transform: translateX(5px);
        }

        /* Responsive Styles */
        @media (max-width: 991px) {
            .brands-hero-title {
                font-size: 2.8rem;
            }

            .brands-hero-description {
                font-size: 1.3rem;
            }

            .section-title {
                font-size: 2.4rem;
            }

            .features-content {
                padding-right: 0;
                margin-bottom: 3rem;
            }

            .cta-title {
                font-size: 2rem;
            }

            .btn-cta {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 767px) {
            .brands-hero-section {
                padding: 4rem 0 3rem;
            }

            .brands-hero-title {
                font-size: 2.2rem;
            }

            .brands-hero-description {
                font-size: 1.2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .cta-container {
                padding: 2rem;
            }

            .cta-title {
                font-size: 1.5rem;
            }

            .cta-description {
                font-size: 1.2rem;
            }
        }
    </style>
@endsection('content')
