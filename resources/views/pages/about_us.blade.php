@extends('.__base')

@section('seo')
    <x-seo-head
        title="À propos de Muster & Dikson - Notre Histoire et Nos Valeurs"
        description="Découvrez l'histoire de Muster & Dikson, entreprise spécialisée dans les produits professionnels pour coiffeurs et esthéticiennes depuis plus de 50 ans."
        keywords="Muster & Dikson, produits de beauté professionnels, coiffure, esthétique, entreprise beauté, histoire, MLPharma, Maroc"
        :image="asset('images/front/factory.jpg')"
        :structured-data="[
            '@context' => 'https://schema.org/',
            '@type' => 'AboutPage',
            'name' => 'À propos de Muster & Dikson',
            'description' => 'Découvrez l\'histoire de Muster & Dikson, entreprise spécialisée dans les produits professionnels pour coiffeurs et esthéticiennes depuis plus de 50 ans.',
            'mainEntity' => [
                '@type' => 'Organization',
                'name' => 'Muster & Dikson',
                'foundingDate' => '1965',
                'description' => 'Entreprise spécialisée dans les produits professionnels de coiffure et beauté',
                'address' => [
                    '@type' => 'PostalAddress',
                    'addressCountry' => 'MA',
                    'addressLocality' => 'Casablanca'
                ]
            ]
        ]"
        :breadcrumbs="[
            ['name' => 'Accueil', 'url' => route('index')],
            ['name' => 'À propos de nous', 'url' => route('about_us')]
        ]"
    />
@endsection

@section('breadcrumbs')
    <x-breadcrumb :items="[
        ['name' => 'Accueil', 'url' => route('index')],
        ['name' => 'À propos de nous', 'url' => route('about_us')]
    ]" />
@endsection

@section('content')
    <div class="page-wrapper">
        <main class="main">
            <!-- Hero Section -->
            <section class="about-hero-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('index')}}"><i class="fas fa-home"></i> Accueil</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">À propos de nous</li>
                                </ol>
                            </nav>
                            <div class="about-hero-content text-center">
                                <span class="about-hero-subtitle">Bienvenue chez Muster & Dikson</span>
                                <h1 class="about-hero-title">Notre Histoire et Nos Valeurs</h1>
                                <p class="about-hero-description">Découvrez comment nous créons des produits de beauté professionnels de qualité depuis plus de 50 ans</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- About Us Content -->
            <div class="page-content">
                <!-- Our Mission Section -->
                <section class="mission-section">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <div class="mission-content">
                                    <span class="section-subtitle">Notre Mission</span>
                                    <h2 class="section-title">Offrir des produits professionnels d'excellence</h2>
                                    <p class="section-description">
                                        Depuis 1965, Muster & Dikson façonne l'industrie de la beauté en créant des solutions professionnelles innovantes. Notre mission est de fournir aux coiffeurs et aux experts en beauté du monde entier des produits de haute qualité qui répondent aux exigences les plus élevées.
                                    </p>
                                    <p class="section-description">
                                        Nous nous engageons à développer des formules avancées qui respectent à la fois les cheveux et l'environnement, tout en offrant des résultats exceptionnels pour les professionnels et leurs clients.
                                    </p>
                                    <div class="mission-features">
                                        <div class="feature-item">
                                            <div class="feature-icon">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <div class="feature-text">Produits professionnels de haute qualité</div>
                                        </div>
                                        <div class="feature-item">
                                            <div class="feature-icon">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <div class="feature-text">Recherche et développement continus</div>
                                        </div>
                                        <div class="feature-item">
                                            <div class="feature-icon">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <div class="feature-text">Fabrication 100% italienne</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="stats-container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stat-card">
                                                <div class="stat-number">50+</div>
                                                <h3 class="stat-title">Années d'Activité</h3>
                                                <p class="stat-description">Plus de 50 ans d'expertise dans l'industrie de la beauté.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="stat-card">
                                                <div class="stat-number">5</div>
                                                <h3 class="stat-title">Marques Professionnelles</h3>
                                                <p class="stat-description">Nous proposons 5 marques renommées pour des produits de qualité.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="stat-card">
                                                <div class="stat-number">10+</div>
                                                <h3 class="stat-title">Membres de l'Équipe</h3>
                                                <p class="stat-description">Une équipe passionnée dédiée à votre satisfaction.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Mission Section -->

                <!-- Our History Section -->
                <section class="history-section">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 order-lg-2 mb-5 mb-lg-0">
                                <div class="history-image">
                                    <img src="{{asset('images/front/factory.jpg')}}"
                                         alt="Usine Muster & Dikson - Fabrication de produits professionnels de coiffure depuis 1965"
                                         class="img-fluid rounded"
                                         loading="lazy"
                                         width="600"
                                         height="400">
                                    <div class="image-overlay"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 order-lg-1">
                                <div class="history-content">
                                    <span class="section-subtitle">Notre Histoire</span>
                                    <h2 class="section-title">Une tradition d'excellence depuis 1965</h2>
                                    <p class="section-description">
                                        Fondée en 1965, Muster & Dikson est née de la passion pour la beauté et de l'engagement envers l'excellence. Notre voyage a commencé avec une vision simple : créer des produits capillaires professionnels qui répondent aux besoins des coiffeurs les plus exigeants.
                                    </p>
                                    <p class="section-description">
                                        Au fil des décennies, nous avons évolué et innové, mais notre engagement envers la qualité et le service est resté inébranlable. Aujourd'hui, nous sommes fiers de notre héritage italien et de notre réputation mondiale pour l'excellence dans l'industrie de la beauté.
                                    </p>
                                    <a href="{{route('ourbrands')}}" class="btn-learn-more">
                                        Découvrir nos marques <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End History Section -->

                <!-- Our Values Section -->
                <section class="values-section">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <div class="values-image">
                                    <img src="{{asset('images/front/factory2.jpg')}}"
                                         alt="Laboratoire Muster & Dikson - Recherche et développement de produits innovants"
                                         class="img-fluid rounded"
                                         loading="lazy"
                                         width="600"
                                         height="400">
                                    <div class="image-overlay"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="values-content">
                                    <span class="section-subtitle">Nos Valeurs</span>
                                    <h2 class="section-title">L'engagement envers la qualité et l'innovation</h2>
                                    <p class="section-description">
                                        Chez Muster & Dikson, nous croyons que la beauté est une expression de soi qui mérite les meilleurs produits. C'est pourquoi nous nous engageons à maintenir les normes les plus élevées dans tout ce que nous faisons.
                                    </p>
                                    <div class="values-list">
                                        <div class="value-item">
                                            <div class="value-icon">
                                                <i class="fas fa-flask"></i>
                                            </div>
                                            <div class="value-content">
                                                <h3 class="value-title">Innovation</h3>
                                                <p class="value-description">Nous investissons constamment dans la recherche pour développer des formules innovantes qui répondent aux besoins changeants des professionnels.</p>
                                            </div>
                                        </div>
                                        <div class="value-item">
                                            <div class="value-icon">
                                                <i class="fas fa-leaf"></i>
                                            </div>
                                            <div class="value-content">
                                                <h3 class="value-title">Durabilité</h3>
                                                <p class="value-description">Nous nous engageons à développer des produits respectueux de l'environnement et à réduire notre empreinte écologique.</p>
                                            </div>
                                        </div>
                                        <div class="value-item">
                                            <div class="value-icon">
                                                <i class="fas fa-certificate"></i>
                                            </div>
                                            <div class="value-content">
                                                <h3 class="value-title">Excellence</h3>
                                                <p class="value-description">Nous ne faisons jamais de compromis sur la qualité, garantissant que chaque produit répond aux normes les plus élevées.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Values Section -->

                <!-- Testimonials Section -->
                <section class="testimonials-section">
                    <div class="container">
                        <div class="section-header text-center">
                            <span class="section-subtitle">Témoignages</span>
                            <h2 class="section-title">Ce que disent nos clients</h2>
                            <p class="section-description">
                                Découvrez pourquoi les professionnels de la beauté du monde entier font confiance à Muster & Dikson
                            </p>
                        </div>

                        <div class="testimonials-container">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="testimonial-card">
                                        <div class="testimonial-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="testimonial-content">
                                            <p>"J'utilise les produits Muster & Dikson dans mon salon depuis plus de 10 ans. La qualité est constante et mes clients adorent les résultats. Je ne changerais pour rien au monde."</p>
                                        </div>
                                        <div class="testimonial-author">
                                            <div class="author-info">
                                                <h4 class="author-name">Sophie Dupont</h4>
                                                <p class="author-title">Propriétaire de salon, Paris</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="testimonial-card">
                                        <div class="testimonial-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="testimonial-content">
                                            <p>"Les colorations Dikson sont exceptionnelles. Elles offrent une couverture parfaite des cheveux blancs tout en préservant la santé du cheveu. Mes clients remarquent la différence."</p>
                                        </div>
                                        <div class="testimonial-author">
                                            <div class="author-info">
                                                <h4 class="author-name">Marc Leblanc</h4>
                                                <p class="author-title">Coloriste professionnel, Lyon</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="testimonial-card">
                                        <div class="testimonial-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="testimonial-content">
                                            <p>"En tant que distributeur, j'apprécie le professionnalisme de Muster & Dikson. Leurs produits sont toujours de haute qualité et leur service client est impeccable."</p>
                                        </div>
                                        <div class="testimonial-author">
                                            <div class="author-info">
                                                <h4 class="author-name">Jean Moreau</h4>
                                                <p class="author-title">Distributeur de produits de beauté, Marseille</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Testimonials Section -->

                <!-- Call to Action Section -->
                <section class="cta-section">
                    <div class="container">
                        <div class="cta-container">
                            <div class="row align-items-center">
                                <div class="col-lg-8 mb-4 mb-lg-0">
                                    <div class="cta-content">
                                        <h2 class="cta-title">Prêt à découvrir nos produits professionnels?</h2>
                                        <p class="cta-description">Explorez notre gamme complète de produits capillaires et de beauté professionnels</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-lg-end">
                                    <a href="{{route('ourbrands')}}" class="btn-cta">
                                        Découvrir nos marques <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Call to Action Section -->

                <!-- MLPharma Section -->
                <section class="mlpharma-section">
                    <div class="container">
                        <div class="mlpharma-container">
                            <div class="row align-items-center">
                                <div class="col-lg-3 col-md-4 mb-4 mb-md-0 text-center">
                                    <div class="mlpharma-logo">
                                        <img src="{{asset('images/logo/logo-ML2.png')}}"
                                             alt="MLPharma - Distributeur officiel Muster & Dikson au Maroc"
                                             class="img-fluid"
                                             loading="lazy"
                                             width="200"
                                             height="100">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-8 mb-4 mb-lg-0">
                                    <div class="mlpharma-content">
                                        <span class="mlpharma-badge">Distributeur Officiel</span>
                                        <h2 class="mlpharma-title">MLPharma Maroc</h2>
                                        <p class="mlpharma-description">Notre partenaire exclusif au Maroc, spécialisé dans la distribution de produits cosmétiques professionnels de haute qualité pour les salons de coiffure et les centres d'esthétique.</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 text-lg-end">
                                    <a href="http://mlpharma.ma/" target="_blank" class="btn-mlpharma">
                                        Visiter le site <i class="fas fa-external-link-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End MLPharma Section -->
            </div>
        </main>
        <!-- End Main -->
    </div>

    <style>
        /* About Hero Section Styles */
        .about-hero-section {
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

        .about-hero-content {
            padding: 2rem 0;
        }

        .about-hero-subtitle {
            display: inline-block;
            font-size: 1.2rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
            color: #20c7d9;
            letter-spacing: 1px;
        }

        .about-hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: white;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .about-hero-description {
            font-size: 1.4rem;
            max-width: 800px;
            margin: 0 auto;
            color: rgba(255, 255, 255, 0.9);
        }

        /* Mission Section Styles */
        .mission-section {
            padding: 5rem 0;
            background-color: white;
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

        .mission-features {
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

        .stats-container {
            background-color: #f8f9fa;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .stat-card {
            text-align: center;
            padding: 1.5rem 1rem;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: #20c7d9;
            margin-bottom: 0.5rem;
            line-height: 1;
        }

        .stat-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: #1A2A3A;
        }

        .stat-description {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 0;
        }

        /* History Section Styles */
        .history-section {
            padding: 5rem 0;
            background-color: #f8f9fa;
        }

        .history-image {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .history-image img {
            width: 100%;
            height: auto;
            transition: transform 0.5s ease;
        }

        .history-image:hover img {
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

        .btn-learn-more {
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            background-color: #1A2A3A;
            color: white;
            border-radius: 30px;
            font-weight: 600;
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

        /* Values Section Styles */
        .values-section {
            padding: 5rem 0;
            background-color: white;
        }

        .values-image {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .values-image img {
            width: 100%;
            height: auto;
            transition: transform 0.5s ease;
        }

        .values-image:hover img {
            transform: scale(1.05);
        }

        .values-list {
            margin-top: 2rem;
        }

        .value-item {
            display: flex;
            margin-bottom: 1.5rem;
        }

        .value-icon {
            width: 50px;
            height: 50px;
            background-color: rgba(32, 199, 217, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.5rem;
            color: #20c7d9;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .value-content {
            flex-grow: 1;
        }

        .value-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1A2A3A;
        }

        .value-description {
            font-size: 1.2rem;
            line-height: 1.6;
            color: #666;
            margin-bottom: 0;
        }

        /* Testimonials Section Styles */
        .testimonials-section {
            padding: 5rem 0;
            background-color: #f8f9fa;
        }

        .section-header {
            margin-bottom: 3rem;
        }

        .testimonial-card {
            background-color: white;
            border-radius: 12px;
            padding: 2rem;
            height: 100%;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .testimonial-rating {
            margin-bottom: 1.5rem;
            color: #FFD700;
        }

        .testimonial-content {
            font-size: 1.3rem;
            line-height: 1.7;
            color: #444;
            margin-bottom: 1.5rem;
            font-style: italic;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
        }

        .author-info {
            flex-grow: 1;
        }

        .author-name {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
            color: #1A2A3A;
        }

        .author-title {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 0;
        }

        /* Call to Action Section Styles */
        .cta-section {
            padding: 5rem 0 3rem;
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

        /* MLPharma Section Styles */
        .mlpharma-section {
            padding: 0 0 5rem;
            background-color: white;
        }

        .mlpharma-container {
            background: linear-gradient(135deg, #20c7d9 0%, #1A2A3A 100%);
            border-radius: 12px;
            padding: 3rem;
            color: white;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
        }

        .mlpharma-container::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            border-radius: 50%;
            transform: translate(50%, -50%);
        }

        .mlpharma-logo {
            background-color: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            margin: 0 auto;
            max-width: 180px;
            transition: all 0.3s ease;
        }

        .mlpharma-logo:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .mlpharma-badge {
            display: inline-block;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 30px;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .mlpharma-title {
            font-size: 2.4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: white;
            text-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .mlpharma-description {
            font-size: 1.4rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 0;
            line-height: 1.6;
        }

        .btn-mlpharma {
            display: inline-flex;
            align-items: center;
            padding: 1rem 2rem;
            background-color: white;
            color: #1A2A3A;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.3rem;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-top: 1rem;
        }

        .btn-mlpharma i {
            margin-left: 0.5rem;
            transition: transform 0.3s ease;
            color: #20c7d9;
        }

        .btn-mlpharma:hover {
            background-color: #1A2A3A;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }

        .btn-mlpharma:hover i {
            transform: translateX(5px);
            color: white;
        }

        /* Responsive Styles */
        @media (max-width: 991px) {
            .about-hero-title {
                font-size: 2.8rem;
            }

            .about-hero-description {
                font-size: 1.3rem;
            }

            .section-title {
                font-size: 2.4rem;
            }

            .cta-title, .mlpharma-title {
                font-size: 2rem;
            }

            .btn-cta, .btn-mlpharma {
                width: 100%;
                justify-content: center;
            }

            .mlpharma-logo {
                margin-bottom: 1.5rem;
            }
        }

        @media (max-width: 767px) {
            .about-hero-section {
                padding: 4rem 0 3rem;
            }

            .about-hero-title {
                font-size: 2.2rem;
            }

            .about-hero-description {
                font-size: 1.2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .stat-card {
                margin-bottom: 1.5rem;
            }

            .cta-container, .mlpharma-container {
                padding: 2rem;
            }

            .cta-title, .mlpharma-title {
                font-size: 1.5rem;
            }

            .cta-description, .mlpharma-description {
                font-size: 1.2rem;
            }

            .mlpharma-logo {
                max-width: 150px;
                padding: 1rem;
            }

            .mlpharma-badge {
                font-size: 0.8rem;
                padding: 0.4rem 0.8rem;
            }
        }

        @media (max-width: 575px) {
            .mlpharma-container::before {
                width: 200px;
                height: 200px;
            }

            .mlpharma-content {
                text-align: center;
            }

            .mlpharma-logo {
                margin-bottom: 1rem;
            }
        }
    </style>
@endsection('content')
