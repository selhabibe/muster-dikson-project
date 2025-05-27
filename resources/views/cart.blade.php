@extends('.__base_main')

@section('content')
    <style>
        /* Cart Page Custom Styles */
        .cart-page {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .cart-container {
            width: 85%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .cart-steps {
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

        .cart-content {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 3rem;
        }

        .cart-items-section {
            background: #fff;
            border-radius: 15px;
            padding: 2.5rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .cart-items-header {
            border-bottom: 2px solid #f8f9fa;
            padding-bottom: 1.5rem;
            margin-bottom: 2rem;
        }

        .cart-items-title {
            font-family: 'Poppins', sans-serif;
            font-size: 25px; /* Standardized h2 size (28px) */
            font-weight: 700;
            color: #222;
            margin: 0;
        }

        .cart-item {
            display: grid;
            grid-template-columns: 120px 1fr auto;
            gap: 2rem;
            align-items: center;
            padding: 2rem 1rem;
            border-bottom: 1px solid #f0f0f0;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .item-image {
            width: 120px;
            height: 120px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .item-details {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .item-name {
            font-family: 'Poppins', sans-serif;
            font-size: 18px; /* Standardized h3 size (20px) */
            font-weight: 600;
            color: #222;
            margin: 0;
            line-height: 1.4;
        }

        .item-price {
            font-size: 18px; /* Standardized body text (18px) */
            font-weight: 700;
            color: #2f7fd0;
        }

        .item-controls {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 1rem;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            background: #f8f9fa;
            border-radius: 25px;
            padding: 0.5rem;
            gap: 0.5rem;
        }

        .qty-btn {
            width: 35px;
            height: 35px;
            border: none;
            border-radius: 50%;
            background: #2f7fd0;
            color: #fff;
            font-size: 1.2rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qty-btn:hover {
            background: #1e5a96;
            transform: scale(1.1);
        }

        .qty-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
        }

        .qty-input {
            width: 60px;
            text-align: center;
            border: none;
            background: transparent;
            font-size: 16px; /* Standardized input text (16px) */
            font-weight: 600;
            color: #222;
        }

        .item-subtotal {
            font-size: 18px; /* Standardized h3 size (20px) */
            font-weight: 700;
            color: #222;
        }

        .remove-btn {
            background: #dc3545;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-size: 14px; /* Standardized button text (14px) */
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .remove-btn:hover {
            background: #c82333;
            transform: translateY(-2px);
        }

        .cart-summary {
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

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .summary-row:last-child {
            border-bottom: 2px solid #2f7fd0;
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

        .checkout-btn {
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
            text-decoration: none;
            display: block;
            text-align: center;
        }

        .checkout-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(47, 127, 208, 0.4);
            color: #fff;
        }

        .empty-cart {
            text-align: center;
            padding: 4rem 2rem;
            color: #666;
        }

        .empty-cart-icon {
            font-size: 64px; /* Standardized large icon (64px) */
            color: #ddd;
            margin-bottom: 1rem;
        }

        .empty-cart-text {
            font-size: 20px; /* Standardized h3 size (20px) */
            margin-bottom: 2rem;
        }

        /* Mobile Responsiveness */
        @media (max-width: 1024px) {
            .cart-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .cart-summary {
                position: static;
            }
        }

        @media (max-width: 768px) {
            .cart-container {
                width: 95%;
                padding: 0 15px;
            }

            .cart-steps {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .cart-item {
                grid-template-columns: 80px 1fr;
                gap: 1rem;
            }

            .item-controls {
                grid-column: 1 / -1;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                margin-top: 1rem;
            }

            .item-image {
                width: 80px;
                height: 80px;
            }

            .cart-items-section,
            .cart-summary {
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

            .item-name {
                font-size: 18px; /* Maintain readability on mobile */
            }

            .quantity-controls {
                padding: 0.3rem;
            }

            .qty-btn {
                width: 30px;
                height: 30px;
                font-size: 16px; /* Standardized mobile button text */
            }

            .qty-input {
                width: 50px;
            }
        }
    </style>

    <div class="cart-page">
        <div class="cart-container">
            <!-- Progress Steps -->
            <div class="cart-steps">
                <div class="step-item active">
                    <div class="step-number">1</div>
                    <span>Panier</span>
                </div>
                @if($cartItems->count() > 0)
                    <a href="{{ route('checkout') }}" class="step-item">
                        <div class="step-number">2</div>
                        <span>Informations de contact</span>
                    </a>
                @else
                    <div class="step-item disabled">
                        <div class="step-number">2</div>
                        <span>Informations de contact</span>
                    </div>
                @endif
                <div class="step-item disabled">
                    <div class="step-number">3</div>
                    <span>Commande terminée</span>
                </div>
            </div>

            @if($cartItems->count() > 0)
                <div class="cart-content">
                    <!-- Cart Items Section -->
                    <div class="cart-items-section">
                        <div class="cart-items-header">
                            <h2 class="cart-items-title">Vos articles ({{ $cartItems->count() }})</h2>
                        </div>

                        <div id="cart-items">
                            @foreach($cartItems as $item)
                                <div class="cart-item" data-id="{{ $item->id }}">
                                    <div class="item-image">
                                        <img src="{{ $item->product->getFirstMediaUrl('product-images') ?: asset('images/placeholder.jpg') }}" alt="{{ $item->product->name }}">
                                    </div>

                                    <div class="item-details">
                                        <h3 class="item-name">{{ $item->product->name }}</h3>
                                        <div class="item-price">{{ number_format($item->product->price, 2) }} MAD</div>
                                    </div>

                                    <div class="item-controls">
                                        <div class="quantity-controls">
                                            <button class="qty-btn qty-decrease" data-cart-id="{{ $item->id }}" {{ $item->quantity <= 1 ? 'disabled' : '' }}>-</button>
                                            <input type="number" class="qty-input quantity" value="{{ $item->quantity }}" min="1" data-cart-id="{{ $item->id }}" readonly>
                                            <button class="qty-btn qty-increase" data-cart-id="{{ $item->id }}">+</button>
                                        </div>

                                        <div class="item-subtotal">
                                            {{ number_format($item->product->price * $item->quantity, 2) }} MAD
                                        </div>

                                        <button class="remove-btn remove-item" data-cart-id="{{ $item->id }}">
                                            <i class="fas fa-trash"></i> Supprimer
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Cart Summary -->
                    <div class="cart-summary">
                        <h3 class="summary-title">Résumé de la commande</h3>

                        <div class="summary-row">
                            <span class="summary-label">Sous-total</span>
                            <span class="summary-value" id="cart-subtotal">{{ number_format($total, 2) }} MAD</span>
                        </div>

                        <div class="summary-row">
                            <span class="summary-label">Livraison</span>
                            <span class="summary-value">Gratuite</span>
                        </div>

                        <div class="summary-row">
                            <span class="summary-label">Total</span>
                            <span class="summary-value" id="cart-total">{{ number_format($total, 2) }} MAD</span>
                        </div>

                        <a href="{{ route('checkout') }}" class="checkout-btn">
                            <i class="fas fa-lock"></i> Procéder au paiement
                        </a>
                    </div>
                </div>
            @else
                <div class="cart-items-section">
                    <div class="empty-cart">
                        <div class="empty-cart-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="empty-cart-text">Votre panier est vide</div>
                        <a href="{{ route('shop.index') }}" class="checkout-btn" style="max-width: 300px; margin: 0 auto;">
                            Continuer vos achats
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            // Quantity increase button
            $('.qty-increase').on('click', function() {
                var cartItem = $(this).closest('.cart-item');
                var cartId = cartItem.data('id');
                var quantityInput = cartItem.find('.qty-input');
                var currentQuantity = parseInt(quantityInput.val());
                var newQuantity = currentQuantity + 1;

                updateCartQuantity(cartId, newQuantity, cartItem);
            });

            // Quantity decrease button
            $('.qty-decrease').on('click', function() {
                var cartItem = $(this).closest('.cart-item');
                var cartId = cartItem.data('id');
                var quantityInput = cartItem.find('.qty-input');
                var currentQuantity = parseInt(quantityInput.val());

                if (currentQuantity > 1) {
                    var newQuantity = currentQuantity - 1;
                    updateCartQuantity(cartId, newQuantity, cartItem);
                }
            });

            // Remove item
            $('.remove-item').on('click', function() {
                var cartItem = $(this).closest('.cart-item');
                var cartId = cartItem.data('id');

                if (confirm('Êtes-vous sûr de vouloir supprimer cet article du panier ?')) {
                    $.ajax({
                        url: '/cart/remove/' + cartId,
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            location.reload();
                        },
                        error: function() {
                            alert('Erreur lors de la suppression de l\'article');
                        }
                    });
                }
            });

            // Function to update cart quantity
            function updateCartQuantity(cartId, quantity, cartItem) {
                $.ajax({
                    url: '{{ route("cart.update") }}',
                    method: 'POST',
                    data: {
                        cart_id: cartId,
                        quantity: quantity,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            // Update the quantity input
                            cartItem.find('.qty-input').val(quantity);

                            // Update the subtotal
                            cartItem.find('.item-subtotal').text(response.item_subtotal + ' MAD');

                            // Update the decrease button state
                            var decreaseBtn = cartItem.find('.qty-decrease');
                            if (quantity <= 1) {
                                decreaseBtn.prop('disabled', true);
                            } else {
                                decreaseBtn.prop('disabled', false);
                            }

                            // Update cart totals
                            $('#cart-subtotal').text(response.cart_total + ' MAD');
                            $('#cart-total').text(response.cart_total + ' MAD');
                        } else {
                            alert('Erreur: ' + (response.message || 'Erreur inconnue'));
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', xhr.responseText);
                        var errorMessage = 'Erreur lors de la mise à jour de la quantité';

                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage += ': ' + xhr.responseJSON.message;
                        } else if (xhr.responseJSON && xhr.responseJSON.error) {
                            errorMessage += ': ' + xhr.responseJSON.error;
                        }

                        alert(errorMessage);
                    }
                });
            }

            // Function to update cart totals
            function updateCartTotals() {
                var total = 0;
                $('.item-subtotal').each(function() {
                    var subtotal = parseFloat($(this).text().replace(' MAD', '').replace(',', ''));
                    total += subtotal;
                });

                $('#cart-subtotal').text(total.toFixed(2) + ' MAD');
                $('#cart-total').text(total.toFixed(2) + ' MAD');
            }
        });
    </script>

@endsection
