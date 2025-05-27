@extends('.__base_main')

@section('content')
    <style>
        /* Confirmation Page Custom Styles */
        .confirmation-page {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .confirmation-container {
            width: 85%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .confirmation-steps {
            background: #fff;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 3rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .step-item {
            display: flex;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            color: #999;
            font-size: 18px; /* Standardized to 18px for better readability */
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 8px;
        }

        .step-item:hover {
            background: #f8f9fa;
            color: #2f7fd0;
            text-decoration: none;
        }

        .step-item.active {
            color: #2f7fd0;
        }

        .step-item.completed {
            color: #28a745;
        }

        .step-item.disabled {
            cursor: not-allowed;
            opacity: 0.6;
        }

        .step-item.disabled:hover {
            background: transparent;
            color: #999;
        }

        .step-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e9ecef;
            color: #999;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-weight: 700;
            font-size: 16px; /* Standardized font size */
            transition: all 0.3s ease;
        }

        .step-item.active .step-number {
            background: #2f7fd0;
            color: #fff;
        }

        .step-item.completed .step-number {
            background: #28a745;
            color: #fff;
        }

        .step-item:hover .step-number {
            transform: scale(1.05);
        }

        .step-item.disabled:hover .step-number {
            transform: none;
        }

        .confirmation-content {
            background: #fff;
            border-radius: 15px;
            padding: 4rem 2.5rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .success-icon {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem auto;
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.3);
            animation: successPulse 2s ease-in-out infinite;
        }

        @keyframes successPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .success-icon i {
            font-size: 48px;
            color: #fff;
        }

        .success-title {
            font-family: 'Poppins', sans-serif;
            font-size: 36px; /* Standardized h1 size (36px) */
            font-weight: 700;
            color: #222;
            margin: 0 0 1rem 0;
        }

        .success-subtitle {
            font-family: 'Poppins', sans-serif;
            font-size: 20px; /* Standardized h3 size (20px) */
            font-weight: 400;
            color: #666;
            margin: 0 0 3rem 0;
            line-height: 1.5;
        }

        .order-details {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 2rem;
            margin: 3rem 0;
            text-align: left;
        }

        .order-details-title {
            font-family: 'Poppins', sans-serif;
            font-size: 24px; /* Standardized h2 size (24px) */
            font-weight: 700;
            color: #222;
            margin: 0 0 1.5rem 0;
            text-align: center;
        }

        .order-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .info-item {
            display: flex;
            flex-direction: column;
        }

        .info-label {
            font-family: 'Poppins', sans-serif;
            font-size: 14px; /* Standardized small text (14px) */
            font-weight: 600;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }

        .info-value {
            font-family: 'Poppins', sans-serif;
            font-size: 16px; /* Standardized body text (16px) */
            font-weight: 600;
            color: #222;
        }

        .next-steps {
            background: #e3f2fd;
            border-radius: 12px;
            padding: 2rem;
            margin: 3rem 0;
        }

        .next-steps-title {
            font-family: 'Poppins', sans-serif;
            font-size: 20px; /* Standardized h3 size (20px) */
            font-weight: 700;
            color: #2f7fd0;
            margin: 0 0 1rem 0;
        }

        .next-steps-text {
            font-family: 'Poppins', sans-serif;
            font-size: 16px; /* Standardized body text (16px) */
            color: #666;
            line-height: 1.6;
            margin: 0;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 3rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #2f7fd0 0%, #1e5a96 100%);
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 1rem 2rem;
            font-size: 16px; /* Standardized button text (16px) */
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(47, 127, 208, 0.4);
            color: #fff;
            text-decoration: none;
        }

        .btn-secondary {
            background: #fff;
            color: #2f7fd0;
            border: 2px solid #2f7fd0;
            border-radius: 12px;
            padding: 1rem 2rem;
            font-size: 16px; /* Standardized button text (16px) */
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-secondary:hover {
            background: #2f7fd0;
            color: #fff;
            transform: translateY(-2px);
            text-decoration: none;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .confirmation-container {
                width: 95%;
                padding: 0 15px;
            }

            .confirmation-steps {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .confirmation-content {
                padding: 2rem 1.5rem;
            }

            .success-title {
                font-size: 28px; /* Mobile h1 size */
            }

            .success-subtitle {
                font-size: 18px; /* Mobile h3 size */
            }

            .order-info {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .action-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn-primary,
            .btn-secondary {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .step-item {
                font-size: 16px; /* Maintain minimum 16px for mobile */
            }

            .step-number {
                width: 30px;
                height: 30px;
                font-size: 14px; /* Standardized mobile font */
            }

            .success-icon {
                width: 80px;
                height: 80px;
            }

            .success-icon i {
                font-size: 32px;
            }
        }
    </style>

    <div class="confirmation-page">
        <div class="confirmation-container">
            <!-- Progress Steps -->
            <div class="confirmation-steps">
                <a href="{{ route('cart.show') }}" class="step-item completed">
                    <div class="step-number">1</div>
                    <span>Panier</span>
                </a>
                <a href="{{ route('checkout') }}" class="step-item completed">
                    <div class="step-number">2</div>
                    <span>Informations de contact</span>
                </a>
                <div class="step-item active">
                    <div class="step-number">3</div>
                    <span>Commande terminée</span>
                </div>
            </div>

            <!-- Confirmation Content -->
            <div class="confirmation-content">
                <!-- Success Icon -->
                <div class="success-icon">
                    <i class="fas fa-check"></i>
                </div>

                <!-- Success Message -->
                <h1 class="success-title">Merci pour votre commande !</h1>
                <p class="success-subtitle">
                    Votre commande a été reçue avec succès et est en cours de traitement.<br>
                    Vous recevrez un e-mail de confirmation sous peu.
                </p>

                <!-- Order Details -->
                <div class="order-details">
                    <h2 class="order-details-title">Détails de votre commande</h2>
                    <div class="order-info">
                        <div class="info-item">
                            <span class="info-label">Numéro de commande</span>
                            <span class="info-value">#{{ session('order_number', 'ORD-' . strtoupper(uniqid())) }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Date de commande</span>
                            <span class="info-value">{{ date('d/m/Y à H:i') }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Méthode de paiement</span>
                            <span class="info-value">Paiement à la livraison</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Livraison estimée</span>
                            <span class="info-value">2-3 jours ouvrables</span>
                        </div>
                    </div>
                </div>

                <!-- Next Steps -->
                <div class="next-steps">
                    <h3 class="next-steps-title">Prochaines étapes</h3>
                    <p class="next-steps-text">
                        Nous préparons votre commande avec soin. Vous recevrez un e-mail de confirmation avec les détails de votre commande et les informations de suivi. Notre équipe vous contactera pour confirmer la livraison.
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons">
                    <a href="{{ route('index') }}" class="btn-primary">
                        <i class="fas fa-home"></i>
                        Retour à l'accueil
                    </a>
                    <a href="{{ route('shop.index') }}" class="btn-secondary">
                        <i class="fas fa-shopping-bag"></i>
                        Continuer vos achats
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
