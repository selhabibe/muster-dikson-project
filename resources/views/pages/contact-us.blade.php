@extends('.__base_main')

@section('meta')
    <meta name="description" content="Contactez Muster & Dikson pour toute question concernant nos produits professionnels pour coiffeurs et esthéticiennes. Notre équipe est à votre disposition.">
    <meta name="keywords" content="contact Muster & Dikson, produits coiffure professionnels, contact beauté, service client">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Contactez Muster & Dikson - À votre service">
    <meta property="og:description" content="Contactez Muster & Dikson pour toute question concernant nos produits professionnels pour coiffeurs et esthéticiennes. Notre équipe est à votre disposition.">
    <meta property="og:image" content="{{ asset('images/demos/demo-beauty/page-header.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Contactez Muster & Dikson - À votre service">
    <meta property="twitter:description" content="Contactez Muster & Dikson pour toute question concernant nos produits professionnels pour coiffeurs et esthéticiennes. Notre équipe est à votre disposition.">
    <meta property="twitter:image" content="{{ asset('images/demos/demo-beauty/page-header.jpg') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
@endsection

@section('content')
<div class="page-wrapper">
    <main class="main">
        <!-- Hero Section -->
        <section class="contact-hero-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index')}}"><i class="fas fa-home"></i> Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                        <div class="contact-hero-content text-center">
                            <span class="contact-hero-subtitle">Nous sommes à votre écoute</span>
                            <h1 class="contact-hero-title">Contactez-nous</h1>
                            <p class="contact-hero-description">Notre équipe est à votre disposition pour répondre à toutes vos questions</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="page-content">
            <!-- Contact Info Section -->
            <section class="contact-info-section">
                <div class="container">
                    <div class="section-header text-center">
                        <span class="section-subtitle">Nos coordonnées</span>
                        <h2 class="section-title">Comment nous joindre</h2>
                        <p class="section-description">
                            Plusieurs moyens sont à votre disposition pour nous contacter
                        </p>
                    </div>

                    <div class="row contact-info-cards">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="contact-info-card">
                                <div class="info-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <h3 class="info-title">Notre adresse</h3>
                                <p class="info-text">N 15 rue Ennakhil cité dakhla Agadir</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="contact-info-card">
                                <div class="info-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <h3 class="info-title">Téléphone</h3>
                                <p class="info-text">
                                    <a href="tel:+212671265232" class="info-link">+212 671265232</a>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="contact-info-card">
                                <div class="info-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <h3 class="info-title">Email</h3>
                                <p class="info-text">
                                    <a href="mailto:contact@muster-dikson.ma" class="info-link">contact@muster-dikson.ma</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Contact Info Section -->

            <!-- Contact Form Section -->
            <section class="contact-form-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <div class="form-content">
                                <span class="section-subtitle">Envoyez-nous un message</span>
                                <h2 class="section-title">Nous sommes à votre écoute</h2>
                                <p class="section-description">
                                    Que vous soyez un professionnel de la beauté, un distributeur ou un particulier, n'hésitez pas à nous contacter. Notre équipe vous répondra dans les plus brefs délais.
                                </p>

                                <div class="contact-features">
                                    <div class="feature-item">
                                        <div class="feature-icon">
                                            <i class="fas fa-check"></i>
                                        </div>
                                        <div class="feature-text">Réponse rapide garantie</div>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-icon">
                                            <i class="fas fa-check"></i>
                                        </div>
                                        <div class="feature-text">Équipe professionnelle</div>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-icon">
                                            <i class="fas fa-check"></i>
                                        </div>
                                        <div class="feature-text">Support technique disponible</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="contact-form-container">
                                @if(session('success'))
                                    <div class="alert alert-success mb-4">
                                        <div class="alert-icon">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div class="alert-content">
                                            <h4 class="alert-title">Message envoyé avec succès !</h4>
                                            <p>Merci de nous avoir contactés. Nous vous répondrons dans les plus brefs délais.</p>
                                        </div>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('contact.store') }}" class="contact-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="nom">Nom <span class="text-danger">*</span></label>
                                            <input type="text" id="nom" name="nom" class="form-control" required>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="email">Email <span class="text-danger">*</span></label>
                                            <input type="email" id="email" name="email" class="form-control" required>
                                        </div>

                                        <div class="col-12 form-group">
                                            <label for="message">Message <span class="text-danger">*</span></label>
                                            <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                                        </div>

                                        <div class="col-12 form-group">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="entreprise-checkbox" name="entreprise">
                                                <label class="form-check-label" for="entreprise-checkbox">
                                                    Je représente une entreprise
                                                </label>
                                            </div>
                                        </div>

                                        <div id="entreprise-fields" style="display: none;" class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="telephone">Téléphone</label>
                                                <input type="text" id="telephone" name="telephone" class="form-control">
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label for="ville">Ville</label>
                                                <input type="text" id="ville" name="ville" class="form-control">
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label for="nom_entreprise">Nom de l'entreprise</label>
                                                <input type="text" id="nom_entreprise" name="nom_entreprise" class="form-control">
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label for="num_pattente">Numéro de patente</label>
                                                <input type="text" id="num_pattente" name="num_pattente" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn-submit">
                                                Envoyer le message <i class="fas fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Contact Form Section -->

            <!-- Map Section -->
            <section class="map-section">
                <div class="container">
                    <div class="section-header text-center">
                        <span class="section-subtitle">Notre localisation</span>
                        <h2 class="section-title">Où nous trouver</h2>
                        <p class="section-description">
                            Venez nous rendre visite à notre adresse
                        </p>
                    </div>
                </div>
                <div class="map-container">
                    <div id="googlemaps" style="height: 500px"></div>
                </div>
            </section>
            <!-- End Map Section -->
        </div>
    </main>
    <!-- End Main -->
</div>

<style>
    /* Contact Hero Section Styles */
    .contact-hero-section {
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

    .contact-hero-content {
        padding: 2rem 0;
    }

    .contact-hero-subtitle {
        display: inline-block;
        font-size: 1.2rem;
        font-weight: 500;
        margin-bottom: 1.5rem;
        color: #20c7d9;
        letter-spacing: 1px;
    }

    .contact-hero-title {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: white;
        text-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

    .contact-hero-description {
        font-size: 1.4rem;
        max-width: 800px;
        margin: 0 auto;
        color: rgba(255, 255, 255, 0.9);
    }

    /* Contact Info Section Styles */
    .contact-info-section {
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

    .contact-info-cards {
        justify-content: center;
    }

    .contact-info-card {
        background-color: #f8f9fa;
        border-radius: 12px;
        padding: 2.5rem 2rem;
        text-align: center;
        height: 100%;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }

    .contact-info-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }

    .info-icon {
        width: 80px;
        height: 80px;
        background-color: rgba(32, 199, 217, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        color: #20c7d9;
        font-size: 2rem;
        transition: all 0.3s ease;
    }

    .contact-info-card:hover .info-icon {
        background-color: #20c7d9;
        color: white;
    }

    .info-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: #1A2A3A;
    }

    .info-text {
        font-size: 1.3rem;
        color: #555;
        margin-bottom: 0;
    }

    .info-link {
        color: #555;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .info-link:hover {
        color: #20c7d9;
    }

    /* Contact Form Section Styles */
    .contact-form-section {
        padding: 5rem 0;
        background-color: #f8f9fa;
    }

    .form-content {
        padding-right: 3rem;
    }

    .contact-features {
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

    .contact-form-container {
        background-color: white;
        border-radius: 12px;
        padding: 3rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .alert {
        border-radius: 8px;
        padding: 1.5rem;
        display: flex;
        align-items: flex-start;
    }

    .alert-success {
        background-color: rgba(40, 167, 69, 0.1);
        border-left: 4px solid #28a745;
    }

    .alert-icon {
        font-size: 1.5rem;
        color: #28a745;
        margin-right: 1rem;
        flex-shrink: 0;
    }

    .alert-content {
        flex-grow: 1;
    }

    .alert-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #28a745;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    label {
        font-size: 1.1rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
        color: #333;
        display: block;
    }

    .form-control {
        height: 50px;
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 0.75rem 1.25rem;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #20c7d9;
        box-shadow: 0 0 0 0.2rem rgba(32, 199, 217, 0.25);
    }

    textarea.form-control {
        height: auto;
    }

    .form-check {
        padding-left: 1.75rem;
    }

    .form-check-input {
        margin-left: -1.75rem;
        width: 1.25rem;
        height: 1.25rem;
    }

    .form-check-label {
        font-size: 1.1rem;
        padding-top: 0.15rem;
    }

    .btn-submit {
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
        border: none;
        cursor: pointer;
    }

    .btn-submit i {
        margin-left: 0.5rem;
        transition: transform 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #20c7d9;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .btn-submit:hover i {
        transform: translateX(5px);
    }

    /* Map Section Styles */
    .map-section {
        padding: 5rem 0;
        background-color: white;
    }

    .map-container {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    /* Responsive Styles */
    @media (max-width: 991px) {
        .contact-hero-title {
            font-size: 2.8rem;
        }

        .contact-hero-description {
            font-size: 1.3rem;
        }

        .section-title {
            font-size: 2.4rem;
        }

        .form-content {
            padding-right: 0;
            margin-bottom: 3rem;
        }
    }

    @media (max-width: 767px) {
        .contact-hero-section {
            padding: 4rem 0 3rem;
        }

        .contact-hero-title {
            font-size: 2.2rem;
        }

        .contact-hero-description {
            font-size: 1.2rem;
        }

        .section-title {
            font-size: 2rem;
        }

        .contact-form-container {
            padding: 2rem;
        }
    }
</style>

<script src="https://maps.googleapis.com/maps/api/js?key="></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Map Settings
        var mapMarkers = [{
            address: "Agadir",
            html: "<strong>N 15 rue Ennakhil cité dakhla</strong><br>Agadir",
            popup: true
        }];

        // Map Initial Location
        var initLatitude = 30.410198576249957;
        var initLongitude = -9.566071626367215;

        // Map Extended Settings
        var mapSettings = {
            controls: {
                draggable: true,
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                streetViewControl: true,
                overviewMapControl: true
            },
            scrollwheel: false,
            markers: mapMarkers,
            latitude: initLatitude,
            longitude: initLongitude,
            zoom: 15
        };

        // Initialize Map
        if (typeof $.fn.gMap === 'function') {
            $('#googlemaps').gMap(mapSettings);
        }

        // Toggle Enterprise Fields
        const entrepriseCheckbox = document.getElementById('entreprise-checkbox');
        const entrepriseFields = document.getElementById('entreprise-fields');

        if (entrepriseCheckbox && entrepriseFields) {
            entrepriseCheckbox.checked = false;
            entrepriseCheckbox.addEventListener('change', function() {
                if (entrepriseCheckbox.checked) {
                    entrepriseFields.style.display = 'flex';
                } else {
                    entrepriseFields.style.display = 'none';
                }
            });
        }
    });
</script>

@endsection('content')
