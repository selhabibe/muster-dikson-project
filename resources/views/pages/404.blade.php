@extends('.__base_main')

@section('content')

<style>
    /* 404 Page Styles */
    .error-section {
        padding: 5rem 0;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 70vh;
    }

    .error-container {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
    }

    .error-number {
        font-size: 8rem;
        font-weight: 700;
        color: #1A2A3A;
        margin-bottom: 1rem;
        text-shadow: 0 4px 8px rgba(0,0,0,0.1);
        line-height: 1;
    }

    .error-title {
        font-size: 2.5rem;
        font-weight: 600;
        color: #1A2A3A;
        margin-bottom: 1.5rem;
    }

    .error-description {
        font-size: 1.3rem;
        color: #666;
        margin-bottom: 3rem;
        line-height: 1.6;
    }

    .error-image {
        margin: 2rem 0;
        opacity: 0.8;
    }

    .error-image img {
        max-width: 100%;
        height: auto;
        filter: drop-shadow(0 10px 20px rgba(0,0,0,0.1));
    }

    .error-actions {
        margin-top: 2rem;
    }

    .error-actions .btn {
        margin: 0.5rem;
        padding: 12px 30px;
        font-weight: 600;
        border-radius: 30px;
        transition: all 0.3s ease;
    }

    .error-actions .btn-primary {
        background-color: #20c7d9;
        border-color: #20c7d9;
    }

    .error-actions .btn-primary:hover {
        background-color: #1ab5c6;
        border-color: #1ab5c6;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(32, 199, 217, 0.3);
    }

    .error-actions .btn-outline-primary {
        color: #20c7d9;
        border-color: #20c7d9;
        background: transparent;
    }

    .error-actions .btn-outline-primary:hover {
        background-color: #20c7d9;
        border-color: #20c7d9;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(32, 199, 217, 0.3);
    }

    .helpful-links {
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 1px solid #dee2e6;
    }

    .helpful-links h5 {
        color: #1A2A3A;
        margin-bottom: 1.5rem;
        font-weight: 600;
    }

    .helpful-links .link-list {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 2rem;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .helpful-links .link-list li a {
        color: #666;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .helpful-links .link-list li a:hover {
        color: #20c7d9;
    }

    .helpful-links .link-list li a i {
        font-size: 1.1rem;
    }

    /* Mobile Responsiveness */
    @media (max-width: 768px) {
        .error-number {
            font-size: 5rem;
        }

        .error-title {
            font-size: 2rem;
        }

        .error-description {
            font-size: 1.1rem;
            padding: 0 1rem;
        }

        .helpful-links .link-list {
            flex-direction: column;
            gap: 1rem;
        }

        .error-actions .btn {
            display: block;
            width: 100%;
            margin: 0.5rem 0;
        }
    }

    @media (max-width: 480px) {
        .error-section {
            padding: 3rem 0;
        }

        .error-number {
            font-size: 4rem;
        }

        .error-title {
            font-size: 1.5rem;
        }
    }
</style>

<div class="page-wrapper">
    <main class="main">
        <div class="page-content">
            <section class="error-section">
                <div class="container">
                    <div class="error-container">
                        <!-- Error Number -->
                        <div class="error-number">404</div>

                        <!-- Error Image -->
                        <div class="error-image">
                            <img src="{{asset('images/front/404-illustration.svg')}}"
                                 alt="Page non trouvée"
                                 width="400"
                                 height="300"
                                 onerror="this.style.display='none'">
                        </div>

                        <!-- Error Title -->
                        <h1 class="error-title">Oups ! Page non trouvée</h1>

                        <!-- Error Description -->
                        <p class="error-description">
                            La page que vous recherchez semble avoir été déplacée, supprimée ou n'existe pas.
                            Mais ne vous inquiétez pas, nous pouvons vous aider à trouver ce que vous cherchez !
                        </p>

                        <!-- Action Buttons -->
                        <div class="error-actions">
                            <a href="{{route('index')}}" class="btn btn-primary btn-lg">
                                <i class="d-icon-home"></i> Retour à l'accueil
                            </a>
                            <a href="{{route('ourbrands')}}" class="btn btn-outline-primary btn-lg">
                                <i class="d-icon-star"></i> Nos marques
                            </a>
                        </div>

                        <!-- Helpful Links -->
                        <div class="helpful-links">
                            <h5>Liens utiles</h5>
                            <ul class="link-list">
                                <li>
                                    <a href="{{route('shop.muster')}}">
                                        <i class="d-icon-bag"></i> Boutique Muster
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('shop.dikson')}}">
                                        <i class="d-icon-bag"></i> Boutique Dikson
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('about_us')}}">
                                        <i class="d-icon-info"></i> À propos de nous
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('contact')}}">
                                        <i class="d-icon-phone"></i> Contact
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</div>

@endsection('content')
