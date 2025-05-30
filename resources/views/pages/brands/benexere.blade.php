@extends('.__base_main')

@section('meta')
    <meta name="description" content="Découvrez Muster Benexere Professionelle, une gamme complète de produits de beauté et de bien-être professionnels pour les salons et spas. Qualité et efficacité pour des soins d'exception.">
    <meta name="keywords" content="Muster Benexere Professionelle, produits beauté professionnels, soins spa, soins esthétiques, produits bien-être, cosmétiques professionnels">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Muster Benexere Professionelle | Muster & Dikson">
    <meta property="og:description" content="Découvrez Muster Benexere Professionelle, une gamme complète de produits de beauté et de bien-être professionnels pour les salons et spas. Qualité et efficacité pour des soins d'exception.">
    <meta property="og:image" content="{{ asset('images/demos/demo-beauty/page-header.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Muster Benexere Professionelle | Muster & Dikson">
    <meta property="twitter:description" content="Découvrez Muster Benexere Professionelle, une gamme complète de produits de beauté et de bien-être professionnels pour les salons et spas. Qualité et efficacité pour des soins d'exception.">
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
                                    <li class="breadcrumb-item active" aria-current="page">Muster Benexere Professionelle</li>
                                </ol>
                            </nav>
                            <div class="brand-hero-content text-center">
                                <span class="brand-hero-subtitle">Bien-être professionnel</span>
                                <h1 class="brand-hero-title">Muster Benexere Professionelle</h1>
                                <p class="brand-hero-description">Des produits de beauté et de bien-être professionnels pour les salons et spas</p>
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
                                <img src="https://cdn.prod.website-files.com/67cecb7a3a28462cd4502f56/67daef64234e4e8cf7e1de81_08_HP_BOX_BRAND_BXE.webp" alt="Muster Benexere Professionelle" class="img-fluid rounded shadow-sm">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="brand-description">
                                <h2 class="title">Muster Benexere Professionelle</h2>
                                <p class="lead">Des produits de beauté et de bien-être professionnels pour les salons et spas.</p>

                                <p>Muster Benexere Professionelle est une marque italienne spécialisée dans les produits de beauté et de bien-être pour les professionnels. La marque propose une gamme complète de produits pour le visage, le corps et les soins spa, conçus pour offrir des expériences sensorielles uniques et des résultats visibles.</p>

                                <p>Avec une philosophie centrée sur le bien-être global, Benexere combine des ingrédients naturels de haute qualité avec des formulations avancées pour créer des produits qui nourrissent, protègent et embellissent la peau. Chaque produit est développé pour répondre aux besoins spécifiques des professionnels de la beauté et de leurs clients.</p>

                                <p>Cette marque d'excellence s'engage à respecter l'environnement en utilisant des ingrédients naturels et des emballages recyclables. Cette approche éco-responsable s'inscrit dans une vision globale du bien-être qui inclut le respect de la nature et de ses ressources.</p>

                                <div class="brand-features mt-4">
                                    <h4>Points forts de la marque:</h4>
                                    <ul class="list list-type-check">
                                        <li>Formulations enrichies en ingrédients naturels</li>
                                        <li>Produits testés dermatologiquement</li>
                                        <li>Solutions professionnelles pour tous les types de peau</li>
                                        <li>Gamme complète pour les soins du visage et du corps</li>
                                        <li>Expériences sensorielles uniques pour les clients</li>
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
                                <h4>Soins du visage</h4>
                                <p>Des nettoyants, toniques, sérums et crèmes adaptés à tous les types de peau. Des formules enrichies en actifs naturels pour hydrater, apaiser, purifier et revitaliser la peau du visage.</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="product-category-card">
                                <h4>Soins du corps</h4>
                                <p>Des exfoliants, enveloppements, huiles de massage et crèmes corporelles pour une peau douce et nourrie. Des produits spécifiques pour le traitement de la cellulite et le raffermissement de la peau.</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="product-category-card">
                                <h4>Soins spa</h4>
                                <p>Des produits pour créer une véritable expérience spa dans votre salon. Des huiles essentielles, des bougies parfumées et des produits de relaxation pour une expérience sensorielle complète.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-6">
                        <div class="col-12">
                            <h3 class="title title-border mb-4">L'expérience Benexere</h3>
                            <p>Muster Benexere Professionelle ne se contente pas de proposer des produits de qualité, mais offre une véritable expérience de bien-être. Chaque produit est conçu pour stimuler les sens et créer un moment de détente et de plaisir pour les clients des salons et spas.</p>

                            <p>La marque s'engage également à respecter l'environnement en utilisant des ingrédients naturels et des emballages recyclables. Cette approche éco-responsable s'inscrit dans une vision globale du bien-être qui inclut le respect de la nature et de ses ressources.</p>

                            <p>Avec plus de 50 ans d'expérience au service des professionnels de la beauté, Muster Benexere Professionelle continue d'innover pour offrir des solutions toujours plus performantes et respectueuses de l'environnement. Chaque formulation est le résultat d'une recherche approfondie et d'un savoir-faire artisanal italien reconnu mondialement.</p>
                        </div>
                    </div>

                    <div class="row mt-6">
                        <div class="col-12">
                            <h3 class="title title-border mb-4">Philosophie et valeurs</h3>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="philosophy-card">
                                <div class="philosophy-icon">
                                    <i class="fas fa-leaf"></i>
                                </div>
                                <h4>Respect de l'environnement</h4>
                                <p>Benexere s'engage pour un avenir durable en privilégiant des ingrédients naturels et des emballages éco-responsables. Notre démarche environnementale fait partie intégrante de notre vision du bien-être global.</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="philosophy-card">
                                <div class="philosophy-icon">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <h4>Bien-être holistique</h4>
                                <p>Notre approche du bien-être va au-delà des soins esthétiques. Nous créons des expériences sensorielles complètes qui nourrissent le corps, l'esprit et l'âme pour un équilibre parfait.</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="philosophy-card">
                                <div class="philosophy-icon">
                                    <i class="fas fa-microscope"></i>
                                </div>
                                <h4>Innovation et recherche</h4>
                                <p>Nos laboratoires italiens développent constamment de nouvelles formulations en combinant tradition artisanale et technologies de pointe pour des résultats exceptionnels.</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="philosophy-card">
                                <div class="philosophy-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <h4>Partenariat professionnel</h4>
                                <p>Nous accompagnons les professionnels de la beauté avec des formations, des conseils personnalisés et un support technique pour garantir le succès de leurs traitements.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-6">
                        <div class="col-12">
                            <div class="text-center">
                                <a href="{{route('shop.muster.benexere')}}" class="btn-shop">
                                    Découvrir nos produits Benexere <i class="fas fa-arrow-right"></i>
                                </a>
                                <a href="{{asset('documents/brands/benexere-catalog.pdf')}}" class="btn-catalog" target="_blank">
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
                                        <p class="newsletter-description">Abonnez-vous à notre newsletter pour recevoir les dernières nouveautés et offres exclusives de Muster Benexere Professionelle.</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="px-4" id="benexere-newsletter-form">
                                        @csrf
                                        <input type="hidden" name="form_source" value="benexere_page">
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
                                            <input type="email" class="form-control stylish-input flex-grow-1" name="email" id="benexere-newsletter-email"
                                                placeholder="Votre adresse email" required value="{{ old('email') }}">
                                            <button class="btn btn-primary stylish-button" type="submit" id="benexere-newsletter-submit">S'abonner</button>
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
            const newsletterForm = document.getElementById('benexere-newsletter-form');

            if (newsletterForm) {
                newsletterForm.addEventListener('submit', function(e) {
                    e.preventDefault(); // Prevent default form submission

                    const submitButton = document.getElementById('benexere-newsletter-submit');
                    const emailInput = document.getElementById('benexere-newsletter-email');
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

        /* Philosophy Cards Styles */
        .philosophy-card {
            background-color: white;
            border-radius: 15px;
            padding: 2.5rem;
            height: 100%;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            text-align: center;
            border: 1px solid #f0f0f0;
        }

        .philosophy-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
            border-color: #20c7d9;
        }

        .philosophy-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #20c7d9, #1A2A3A);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            transition: all 0.3s ease;
        }

        .philosophy-icon i {
            font-size: 2rem;
            color: white;
        }

        .philosophy-card:hover .philosophy-icon {
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(32, 199, 217, 0.3);
        }

        .philosophy-card h4 {
            font-size: 1.6rem;
            font-weight: 600;
            margin-bottom: 1.2rem;
            color: #1A2A3A;
        }

        .philosophy-card p {
            font-size: 1.2rem;
            line-height: 1.7;
            color: #666;
            margin-bottom: 0;
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
                text-align: center;
            }

            .newsletter-message {
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
