@extends('.__base_main')

@section('meta')
    <meta name="description" content="Découvrez Muster Electric 4 Hair, une gamme d'appareils électriques professionnels innovants pour les salons de coiffure modernes. Qualité et technologie au service des professionnels.">
    <meta name="keywords" content="Muster Electric 4 Hair, appareils coiffure professionnels, sèche-cheveux, fers à lisser, matériel salon coiffure, technologie capillaire">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Muster Electric 4 Hair | Muster & Dikson">
    <meta property="og:description" content="Découvrez Muster Electric 4 Hair, une gamme d'appareils électriques professionnels innovants pour les salons de coiffure modernes. Qualité et technologie au service des professionnels.">
    <meta property="og:image" content="{{ asset('images/demos/demo-beauty/page-header.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Muster Electric 4 Hair | Muster & Dikson">
    <meta property="twitter:description" content="Découvrez Muster Electric 4 Hair, une gamme d'appareils électriques professionnels innovants pour les salons de coiffure modernes. Qualité et technologie au service des professionnels.">
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
                                    <li class="breadcrumb-item active" aria-current="page">Muster Electric 4 Hair</li>
                                </ol>
                            </nav>
                            <div class="brand-hero-content text-center">
                                <span class="brand-hero-subtitle">Innovation technologique</span>
                                <h1 class="brand-hero-title">Muster Electric 4 Hair</h1>
                                <p class="brand-hero-description">Des appareils électriques professionnels innovants pour les salons de coiffure modernes</p>
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
                                <img src="https://cdn.prod.website-files.com/67cecb7a3a28462cd4502f56/67dacfefa2d68ceca7b6e6b1_06_HP_BOX_BRAND_E4H.webp" alt="Muster Electric 4 Hair" class="img-fluid rounded shadow-sm">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="brand-description">
                                <h2 class="title">Muster Electric 4 Hair</h2>
                                <p class="lead">Des appareils électriques professionnels innovants pour les salons de coiffure modernes.</p>

                                <p>Muster Electric 4 Hair est une marque spécialisée dans la conception et la fabrication d'appareils électriques professionnels pour les salons de coiffure. Avec une attention particulière portée à l'innovation technologique et au design ergonomique, Muster Electric 4 Hair propose des outils qui allient performance, fiabilité et facilité d'utilisation.</p>

                                <p>La gamme comprend des sèche-cheveux professionnels, des fers à lisser, des fers à friser, des tondeuses et d'autres appareils essentiels pour les coiffeurs. Chaque produit est conçu pour répondre aux exigences des professionnels qui recherchent des outils de haute qualité pour offrir les meilleurs services à leurs clients.</p>

                                <div class="brand-features mt-4">
                                    <h4>Points forts de la marque:</h4>
                                    <ul class="list list-type-check">
                                        <li>Technologie avancée pour des résultats professionnels</li>
                                        <li>Design ergonomique pour un confort d'utilisation optimal</li>
                                        <li>Matériaux de haute qualité pour une durabilité accrue</li>
                                        <li>Efficacité énergétique pour réduire la consommation d'électricité</li>
                                        <li>Large gamme d'appareils pour tous les besoins des salons</li>
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
                                <h4>Sèche-cheveux</h4>
                                <p>Des sèche-cheveux professionnels puissants et légers, dotés de technologies avancées comme les moteurs AC et les générateurs d'ions négatifs pour un séchage rapide et une brillance maximale.</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="product-category-card">
                                <h4>Fers à lisser et à friser</h4>
                                <p>Des fers à lisser avec plaques en céramique, titane ou tourmaline pour un lissage parfait sans abîmer les cheveux. Des fers à friser de différents diamètres pour créer tous types de boucles.</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="product-category-card">
                                <h4>Tondeuses et accessoires</h4>
                                <p>Des tondeuses professionnelles précises et puissantes pour les coupes homme et les finitions. Une gamme complète d'accessoires pour faciliter le travail des coiffeurs au quotidien.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-6">
                        <div class="col-12">
                            <h3 class="title title-border mb-4">Innovation et technologie</h3>
                            <p>Muster Electric 4 Hair investit constamment dans la recherche et le développement pour proposer des appareils à la pointe de la technologie. La marque intègre les dernières innovations dans ses produits pour offrir des performances optimales tout en préservant la santé des cheveux.</p>
                            <p>Les appareils Muster Electric 4 Hair sont conçus pour être ergonomiques, légers et faciles à manipuler, réduisant ainsi la fatigue des professionnels qui les utilisent quotidiennement. De plus, ils sont équipés de fonctionnalités avancées comme le contrôle précis de la température, les revêtements protecteurs et les systèmes de sécurité automatiques.</p>
                        </div>
                    </div>

                    <div class="row mt-6">
                        <div class="col-12">
                            <h3 class="title title-border mb-4">Produit phare: iMaster Vaporisateur avec Ozone et Ionisation</h3>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="product-image-container">
                                <img src="https://cosmital.gr/wp-content/uploads/2024/05/imaster1.jpg" alt="iMaster Vaporisateur" class="img-fluid rounded shadow-lg">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-description">
                                <h4 class="mb-3">iMaster Vaporisateur avec Ozone et Ionisation</h4>
                                <p class="lead">Le nouveau vaporisateur moderne iMaster avec ozone et ionisation représente une technologie innovante qui améliore considérablement les services dans les salons de coiffure.</p>

                                <div class="product-features mt-4">
                                    <h5>Caractéristiques principales:</h5>
                                    <ul class="list list-type-check">
                                        <li>24 programmes de fonctionnement préréglés</li>
                                        <li>Idéal pour les traitements profonds du cuir chevelu</li>
                                        <li>Parfait pour les travaux techniques</li>
                                        <li>Action antibactérienne et anti-inflammatoire</li>
                                        <li>Élimine l'électricité statique</li>
                                        <li>Fonctionne simplement avec de l'eau potable</li>
                                    </ul>
                                </div>

                                <div class="product-benefits mt-4">
                                    <h5>Avantages pour les cheveux:</h5>
                                    <p>L'iMaster combine vapeur, ozone et ionisation pour ouvrir les écailles du cheveu en profondeur, permettant une meilleure pénétration des traitements. La présence d'ions négatifs est cruciale car ils tonifient la structure du cheveu tout en nettoyant en profondeur le cuir chevelu.</p>
                                    <p>Le système fonctionne en deux phases: d'abord avec vapeur + ozone + ionisation, puis avec ozone + ionisation pour refermer les écailles et stabiliser les traitements.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="product-gallery">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <img src="https://cosmital.gr/wp-content/uploads/2024/05/imaster2.jpg" alt="iMaster Vaporisateur Vue 2" class="img-fluid rounded shadow-sm">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <img src="https://cosmital.gr/wp-content/uploads/2024/05/imaster3.jpg" alt="iMaster Vaporisateur Vue 3" class="img-fluid rounded shadow-sm">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <img src="https://cosmital.gr/wp-content/uploads/2024/05/imaster4.jpg" alt="iMaster Vaporisateur Vue 4" class="img-fluid rounded shadow-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-6">
                        <div class="col-12 text-center">
                            <a href="{{route('shop.muster')}}" class="btn-shop">
                                Découvrir nos appareils Muster Electric <i class="fas fa-arrow-right"></i>
                            </a>
                            <a href="{{asset('documents/brands/electric-catalog.pdf')}}" class="btn-catalog" target="_blank">
                                <i class="fas fa-file-pdf"></i> Télécharger le catalogue
                            </a>
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
                                        <p class="newsletter-description">Abonnez-vous à notre newsletter pour recevoir les dernières nouveautés et offres exclusives de Muster Electric 4 Hair.</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="newsletter-form" id="electric-newsletter-form">
                                        @csrf
                                        <input type="hidden" name="form_source" value="electric_page">
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
                                            <input type="email" class="form-control" name="email" id="electric-newsletter-email" placeholder="Votre adresse email" required>
                                        </div>
                                        <button type="submit" class="btn-subscribe" id="electric-newsletter-submit">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const newsletterForm = document.getElementById('electric-newsletter-form');

            if (newsletterForm) {
                newsletterForm.addEventListener('submit', function(e) {
                    e.preventDefault(); // Prevent default form submission

                    const submitButton = document.getElementById('electric-newsletter-submit');
                    const emailInput = document.getElementById('electric-newsletter-email');
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

        /* Product Showcase Styles */
        .product-image-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
        }

        .product-image-container:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        .product-description h4 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 1.2rem;
            color: #1A2A3A;
        }

        .product-description .lead {
            font-size: 1.4rem;
            line-height: 1.7;
            color: #555;
        }

        .product-features h5,
        .product-benefits h5 {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 1.2rem;
            color: #1A2A3A;
            border-left: 3px solid #20c7d9;
            padding-left: 1rem;
        }

        .product-gallery img {
            border-radius: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .product-gallery img:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
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
