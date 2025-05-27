@extends('.__base_main')

@section('content')
    <style>
        /* Checkout Page Custom Styles */
        .checkout-page {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .checkout-container {
            width: 85%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .checkout-steps {
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

        .checkout-content {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 3rem;
        }

        .checkout-form-section {
            background: #fff;
            border-radius: 15px;
            padding: 2.5rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .form-section {
            margin-bottom: 3rem;
        }

        .form-section:last-child {
            margin-bottom: 0;
        }

        .section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 24px; /* Standardized h2 size (24px) */
            font-weight: 700;
            color: #222;
            margin: 0 0 2rem 0;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f8f9fa;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .form-label {
            font-family: 'Poppins', sans-serif;
            font-size: 16px; /* Standardized label text (16px) */
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
            display: block;
        }

        .required {
            color: #dc3545;
        }

        .form-input {
            width: 100%;
            padding: 1rem 1.2rem;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 16px; /* Standardized input text (16px) */
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            background: #fff;
        }

        .form-input:focus {
            outline: none;
            border-color: #2f7fd0;
            box-shadow: 0 0 0 3px rgba(47, 127, 208, 0.1);
        }

        .form-input::placeholder {
            color: #999;
        }

        .form-select {
            width: 100%;
            padding: 1rem 1.2rem;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 16px; /* Standardized select text (16px) */
            font-family: 'Poppins', sans-serif;
            background: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-select:focus {
            outline: none;
            border-color: #2f7fd0;
            box-shadow: 0 0 0 3px rgba(47, 127, 208, 0.1);
        }

        .form-textarea {
            width: 100%;
            padding: 1rem 1.2rem;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 16px; /* Standardized textarea text (16px) */
            font-family: 'Poppins', sans-serif;
            resize: vertical;
            min-height: 120px;
            transition: all 0.3s ease;
        }

        .form-textarea:focus {
            outline: none;
            border-color: #2f7fd0;
            box-shadow: 0 0 0 3px rgba(47, 127, 208, 0.1);
        }

        .order-summary {
            background: #fff;
            border-radius: 15px;
            padding: 2.5rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            height: fit-content;
            position: sticky;
            top: 2rem;
        }

        .summary-title {
            font-family: 'Poppins', sans-serif;
            font-size: 24px; /* Standardized h2 size (24px) */
            font-weight: 700;
            color: #222;
            margin: 0 0 2rem 0;
            text-align: center;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .item-info {
            flex: 1;
        }

        .item-name {
            font-size: 16px; /* Standardized body text (16px) */
            font-weight: 600;
            color: #222;
            margin-bottom: 0.25rem;
        }

        .item-quantity {
            font-size: 14px; /* Standardized small text (14px) */
            color: #666;
        }

        .item-price {
            font-size: 18px; /* Standardized body text (18px) */
            font-weight: 700;
            color: #2f7fd0;
        }

        .summary-totals {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid #f8f9fa;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
        }

        .summary-row.total {
            border-top: 2px solid #2f7fd0;
            margin-top: 1rem;
            padding-top: 1rem;
            font-weight: 700;
            font-size: 18px; /* Standardized body text (18px) */
            color: #222;
        }

        .summary-label {
            font-size: 16px; /* Standardized body text (16px) */
            color: #666;
        }

        .summary-value {
            font-size: 16px; /* Standardized body text (16px) */
            font-weight: 600;
            color: #222;
        }

        .place-order-btn {
            width: 100%;
            background: linear-gradient(135deg, #2f7fd0 0%, #1e5a96 100%);
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 1.2rem 2rem;
            font-size: 18px; /* Standardized button text (18px) */
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 2rem;
        }

        .place-order-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(47, 127, 208, 0.4);
        }

        .place-order-btn:active {
            transform: translateY(-1px);
        }

        /* Mobile Responsiveness */
        @media (max-width: 1024px) {
            .checkout-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .order-summary {
                position: static;
            }
        }

        @media (max-width: 768px) {
            .checkout-container {
                width: 95%;
                padding: 0 15px;
            }

            .checkout-steps {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .checkout-form-section,
            .order-summary {
                padding: 1.5rem;
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

            .section-title {
                font-size: 20px; /* Standardized mobile h2 (20px) */
            }
        }
    </style>

    <div class="checkout-page">
        <div class="checkout-container">
            <!-- Progress Steps -->
            <div class="checkout-steps">
                <a href="{{ route('cart.show') }}" class="step-item completed">
                    <div class="step-number">1</div>
                    <span>Panier</span>
                </a>
                <div class="step-item active">
                    <div class="step-number">2</div>
                    <span>Informations de contact</span>
                </div>
                <div class="step-item disabled">
                    <div class="step-number">3</div>
                    <span>Commande terminée</span>
                </div>
            </div>

            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                <div class="checkout-content">
                    <!-- Checkout Form Section -->
                    <div class="checkout-form-section">
                        <!-- Contact Information -->
                        <div class="form-section">
                            <h2 class="section-title">Informations de facturation</h2>

                            <div class="form-group">
                                <label class="form-label">Nom complet <span class="required">*</span></label>
                                <input type="text" class="form-input" name="name" value="{{ old('name') }}" required placeholder="Votre nom complet">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Nom de l'entreprise (Optionnel)</label>
                                <input type="text" class="form-input" name="company_name" value="{{ old('company_name') }}" placeholder="Nom de votre entreprise">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Pays / Région <span class="required">*</span></label>
                                <select name="country" class="form-select" required>
                                    <option value="ma" {{ old('country') == 'ma' ? 'selected' : '' }}>Maroc</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Adresse <span class="required">*</span></label>
                                <input type="text" class="form-input" name="address1" value="{{ old('address1') }}" required placeholder="Numéro et nom de la rue">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-input" name="address2" value="{{ old('address2') }}" placeholder="Appartement, suite, unité, etc. (optionnel)">
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Ville <span class="required">*</span></label>
                                    <input type="text" class="form-input" name="city" value="{{ old('city') }}" required placeholder="Votre ville">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Code postal <span class="required">*</span></label>
                                    <input type="text" class="form-input" name="zip" value="{{ old('zip') }}" required placeholder="Code postal">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Téléphone <span class="required">*</span></label>
                                <input type="tel" class="form-input" name="phone" value="{{ old('phone') }}" required placeholder="Votre numéro de téléphone">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Adresse e-mail <span class="required">*</span></label>
                                <input type="email" class="form-input" name="email" value="{{ old('email') }}" required placeholder="votre@email.com">
                            </div>
                        </div>

                        <!-- Additional Information -->
                        <div class="form-section">
                            <h2 class="section-title">Informations supplémentaires</h2>

                            <div class="form-group">
                                <label class="form-label">Notes de commande (Optionnel)</label>
                                <textarea class="form-textarea" name="order_notes" placeholder="Notes concernant votre commande, par exemple des instructions spéciales pour la livraison.">{{ old('order_notes') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="order-summary">
                        <h3 class="summary-title">Résumé de votre commande</h3>

                        <div class="order-items">
                            @foreach($cartItems as $item)
                                <div class="order-item">
                                    <div class="item-info">
                                        <div class="item-name">{{ $item->product->name }}</div>
                                        <div class="item-quantity">Quantité: {{ $item->quantity }}</div>
                                    </div>
                                    <div class="item-price">{{ number_format($item->product->price * $item->quantity, 2) }} MAD</div>
                                </div>
                            @endforeach
                        </div>

                        <div class="summary-totals">
                            <div class="summary-row">
                                <span class="summary-label">Sous-total</span>
                                <span class="summary-value">{{ number_format($total, 2) }} MAD</span>
                            </div>

                            <div class="summary-row">
                                <span class="summary-label">Livraison</span>
                                <span class="summary-value">Gratuite</span>
                            </div>

                            <div class="summary-row total">
                                <span class="summary-label">Total</span>
                                <span class="summary-value">{{ number_format($total, 2) }} MAD</span>
                            </div>
                        </div>

                        <button type="submit" class="place-order-btn">
                            <i class="fas fa-lock"></i> Passer la commande
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
