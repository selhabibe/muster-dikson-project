@extends('.__base_main')

@section('meta')
    <meta name="description" content="{{ $product->short_desc ?? 'Découvrez ' . $product->name . ' - Un produit de qualité professionnelle pour vos cheveux.' }}">
    <meta name="keywords" content="{{ $product->name }}, {{ $product->brand->name ?? '' }}, produits capillaires professionnels, soins capillaires">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="product">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $product->name }} | Muster & Dikson">
    <meta property="og:description" content="{{ $product->short_desc ?? 'Découvrez ' . $product->name . ' - Un produit de qualité professionnelle pour vos cheveux.' }}">
    <meta property="og:image" content="{{ $product->getFirstMediaUrl('product-images') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $product->name }} | Muster & Dikson">
    <meta property="twitter:description" content="{{ $product->short_desc ?? 'Découvrez ' . $product->name . ' - Un produit de qualité professionnelle pour vos cheveux.' }}">
    <meta property="twitter:image" content="{{ $product->getFirstMediaUrl('product-images') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
@endsection

@section('content')


    <div class="page-wrapper">
        <main class="main">
            <!-- Hero Section -->
            <section class="product-hero-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('index')}}"><i class="fas fa-home"></i> Accueil</a></li>
                                    @if(isset($product->brand))
                                    <li class="breadcrumb-item"><a href="{{route('shop.' . strtolower($product->brand->slug))}}">{{ $product->brand->name }}</a></li>
                                    @endif
                                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                                </ol>
                            </nav>
                            <div class="product-hero-content text-center">
                                <h1 class="product-hero-title">{{ $product->name }}</h1>
                                @if(isset($product->brand))
                                <p class="product-hero-subtitle">{{ $product->brand->name }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Product Content -->
            <div class="product-content-section">
                <div class="container">
                    <div class="product-single row">
                        <!-- Product Gallery -->
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <div class="product-gallery">
                                <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner">
                                    @foreach($product->getMedia('product-images') as $media)
                                        @if ($media->getUrl())
                                            <figure class="product-image">
                                                <img src="{{ $media->getUrl() }}" alt="{{ $product->name }}">
                                            </figure>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="product-thumbs-wrap">
                                    <div class="product-thumbs">
                                        @foreach($product->getMedia('product-images') as $media)
                                            @if ($media->getUrl())
                                                <div class="product-thumb {{ $loop->first ? 'active' : '' }}">
                                                    <img src="{{ $media->getUrl() }}" alt="{{ $product->name }}">
                                                </div>
                                            @else
                                                <div class="product-thumb">
                                                    <img src="https://i.makeup.fr/i/i4/i4dfmpe8rxkj.png" alt="Product Image">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <button class="thumb-up disabled"><i class="fas fa-chevron-left"></i></button>
                                    <button class="thumb-down disabled"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- Product Details -->
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="product-info">
                                    @if(isset($product->code))
                                    <div class="product-code">
                                        <span class="label">Code:</span>
                                        <span class="value">{{ $product->code }}</span>
                                    </div>
                                    @endif

                                    @if(isset($product->brand->name))
                                    <div class="product-brand">
                                        <span class="label">Marque:</span>
                                        <span class="value">{{ $product->brand->name }}</span>
                                    </div>
                                    @endif

                                    <div class="product-price">
                                        <span class="current-price">{{ number_format($product->price, 2) }} MAD</span>
                                        @if($product->old_price > 0)
                                        <span class="old-price">{{ number_format($product->old_price, 2) }} MAD</span>
                                        @endif
                                    </div>

                                    <div class="product-rating">
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width:80%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <span class="rating-text">( 6 avis )</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-description">
                                    @if (!is_null($product->short_desc))
                                        {!! \Illuminate\Support\Str::markdown($product->short_desc ?? '') !!}
                                    @endif
                                </div>

                                <hr class="product-divider">

                                <div class="product-actions">
                                    <div class="quantity-wrapper">
                                        <label>Quantité:</label>
                                        <div class="quantity-controls">
                                            <button class="quantity-minus"><i class="fas fa-minus"></i></button>
                                            <input class="quantity-input" type="number" min="1" value="1" max="1000000" id="product-quantity">
                                            <button class="quantity-plus"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>

                                    <button class="btn-add-to-cart" id="add-to-cart-btn" data-product-id="{{ $product->id }}">
                                        <i class="fas fa-shopping-bag"></i> Ajouter au panier
                                        </button>
                                    </div>

                                <!-- Display messages -->
                                <div id="cart-message" style="display: none;"></div>

                                <div class="product-share">
                                    <span class="share-label">Partager:</span>
                                    <div class="social-links">
                                        <a href="#" class="social-link facebook"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" class="social-link twitter"><i class="fab fa-twitter"></i></a>
                                        <a href="#" class="social-link pinterest"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#" class="social-link instagram"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>

                                <!-- Include the necessary script at the bottom of the template -->
                                @section('scripts')
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function () {
                                            const addToCartButton = document.getElementById('add-to-cart-btn');
                                            const quantityInput = document.getElementById('product-quantity');
                                            const quantityPlus = document.querySelector('.quantity-plus');
                                            const quantityMinus = document.querySelector('.quantity-minus');
                                            const cartMessage = document.getElementById('cart-message');

                                            // Quantity controls
                                            quantityPlus.addEventListener('click', function() {
                                                let currentValue = parseInt(quantityInput.value);
                                                quantityInput.value = currentValue + 1;
                                            });

                                            quantityMinus.addEventListener('click', function() {
                                                let currentValue = parseInt(quantityInput.value);
                                                if (currentValue > 1) {
                                                    quantityInput.value = currentValue - 1;
                                                }
                                            });

                                            // Add to cart functionality
                                            addToCartButton.addEventListener('click', function (e) {
                                                e.preventDefault();

                                                // Show loading state
                                                addToCartButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Ajout en cours...';
                                                addToCartButton.disabled = true;

                                                const productId = this.getAttribute('data-product-id');
                                                const quantity = quantityInput.value;

                                                const cartData = {
                                                    product_id: productId,
                                                    quantity: quantity,
                                                    _token: '{{ csrf_token() }}'
                                                };

                                                fetch('{{ route("cart.add") }}', {
                                                    method: 'POST',
                                                    headers: {
                                                        'Content-Type': 'application/json',
                                                        'X-CSRF-TOKEN': cartData._token
                                                    },
                                                    body: JSON.stringify(cartData)
                                                })
                                                .then(response => response.json())
                                                .then(data => {
                                                    console.log(data);

                                                    // Reset button state
                                                    addToCartButton.innerHTML = '<i class="fas fa-shopping-bag"></i> Ajouter au panier';
                                                    addToCartButton.disabled = false;

                                                    // Show success message
                                                    if (data.success === 'Item added to cart successfully!') {
                                                        cartMessage.innerHTML = '<div class="alert alert-success">Produit ajouté au panier avec succès!</div>';
                                                        cartMessage.style.display = 'block';

                                                        // Hide message after 3 seconds
                                                        setTimeout(function() {
                                                            cartMessage.style.display = 'none';
                                                        }, 3000);
                                                    }
                                                })
                                                .catch(error => {
                                                    console.error('Error:', error);

                                                    // Reset button state
                                                    addToCartButton.innerHTML = '<i class="fas fa-shopping-bag"></i> Ajouter au panier';
                                                    addToCartButton.disabled = false;

                                                    // Show error message
                                                    cartMessage.innerHTML = '<div class="alert alert-danger">Une erreur est survenue. Veuillez réessayer.</div>';
                                                    cartMessage.style.display = 'block';
                                                });
                                            });
                                        });
                                    </script>
                                @endsection
                            </div>
                        </div>
                    </div>

                    <!-- Product Description Section -->
                    <section class="product-description-section">
                        <div class="container">
                            <div class="product-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                                    </li>
                                    @if(isset($product->specifications) && !empty($product->specifications))
                                    <li class="nav-item">
                                        <a class="nav-link" id="specifications-tab" data-toggle="tab" href="#specifications" role="tab" aria-controls="specifications" aria-selected="false">Spécifications</a>
                                    </li>
                                    @endif
                                    <li class="nav-item">
                                        <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Avis (6)</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                        <div class="product-description-content">
                                            @if(!is_null($product->description))
                                                {!! \Illuminate\Support\Str::markdown($product->description) !!}
                                            @else
                                                <p>Aucune description disponible pour ce produit.</p>
                                            @endif
                                        </div>
                                    </div>

                                    @if(isset($product->specifications) && !empty($product->specifications))
                                    <div class="tab-pane fade" id="specifications" role="tabpanel" aria-labelledby="specifications-tab">
                                        <div class="product-specifications-content">
                                            {!! \Illuminate\Support\Str::markdown($product->specifications) !!}
                                        </div>
                                    </div>
                                    @endif

                                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                        <div class="product-reviews-content">
                                            <p>Les avis des clients seront affichés ici.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Related Products Section -->
                    <section class="related-products-section">
                        <div class="container">
                            <h2 class="section-title">Produits similaires</h2>
                            <div class="related-products-slider">
                                <!-- Related products will be displayed here -->
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
        <!-- End Main -->
    </div>


    <style>
        /* Hero Section Styles */
        .product-hero-section {
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

        .product-hero-content {
            padding: 2rem 0;
        }

        .product-hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: white;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .product-hero-subtitle {
            font-size: 1.4rem;
            max-width: 800px;
            margin: 0 auto;
            color: rgba(255, 255, 255, 0.9);
        }

        /* Product Content Section */
        .product-content-section {
            padding: 3rem 0;
        }

        /* Product Gallery Styles */
        .product-gallery {
            background-color: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
        }

        .product-image {
            width: 100%;
            height: 450px;
            overflow: hidden;
            position: relative;
            margin-bottom: 1rem;
            border-radius: 8px;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .product-thumbs-wrap {
            position: relative;
            display: flex;
            align-items: center;
            margin-top: 1rem;
        }

        .product-thumbs {
            display: flex;
            overflow-x: auto;
            gap: 0.5rem;
            scrollbar-width: none;
            -ms-overflow-style: none;
            margin: 0 2rem;
            flex: 1;
        }

        .product-thumbs::-webkit-scrollbar {
            display: none;
        }

        .product-thumb {
            flex: 0 0 80px;
            width: 80px;
            height: 80px;
            overflow: hidden;
            border-radius: 8px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .product-thumb.active {
            border-color: #20c7d9;
        }

        .product-thumb img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .thumb-up, .thumb-down {
            background-color: white;
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .thumb-up:hover, .thumb-down:hover {
            background-color: #20c7d9;
            color: white;
        }

        .thumb-up.disabled, .thumb-down.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Product Details Styles */
        .product-details {
            background-color: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            height: 100%;
        }

        .product-info {
            margin-bottom: 2rem;
        }

        .product-code, .product-brand {
            margin-bottom: 0.75rem;
            font-size: 1.1rem;
        }

        .product-code .label, .product-brand .label {
            font-weight: 600;
            color: #1A2A3A;
            margin-right: 0.5rem;
        }

        .product-code .value, .product-brand .value {
            color: #555;
        }

        .product-price {
            margin: 1.5rem 0;
        }

        .current-price {
            font-size: 2rem;
            font-weight: 700;
            color: #1A2A3A;
            margin-right: 1rem;
        }

        .old-price {
            font-size: 1.4rem;
            color: #999;
            text-decoration: line-through;
        }

        .product-rating {
            margin-bottom: 1.5rem;
        }

        .ratings-container {
            display: flex;
            align-items: center;
        }

        .ratings-full {
            position: relative;
            margin-right: 0.5rem;
        }

        .ratings {
            position: relative;
            display: inline-block;
            font-family: 'Font Awesome 5 Free';
            font-size: 13px;
            letter-spacing: 0.1em;
            color: #FFD700;
        }

        .ratings::before {
            content: '\f005\f005\f005\f005\f005';
            font-weight: 900;
            color: rgba(0,0,0,0.16);
        }

        .ratings-full .ratings {
            position: absolute;
            top: 0;
            left: 0;
            white-space: nowrap;
            overflow: hidden;
        }

        .ratings-full .ratings::before {
            content: '\f005\f005\f005\f005\f005';
            font-weight: 900;
            color: #FFD700;
        }

        .rating-text {
            font-size: 0.9rem;
            color: #777;
        }

        .product-description {
            margin-bottom: 2rem;
            font-size: 1.1rem;
            line-height: 1.7;
            color: #555;
        }

        .product-divider {
            margin: 2rem 0;
            border-top: 1px solid #eee;
        }

        /* Product Actions Styles */
        .product-actions {
            margin-bottom: 2rem;
        }

        .quantity-wrapper {
            margin-bottom: 1.5rem;
        }

        .quantity-wrapper label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #1A2A3A;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            max-width: 150px;
        }

        .quantity-minus, .quantity-plus {
            width: 40px;
            height: 40px;
            background-color: #f5f5f5;
            border: none;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .quantity-minus:hover, .quantity-plus:hover {
            background-color: #e0e0e0;
        }

        .quantity-input {
            width: 70px;
            height: 40px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            text-align: center;
            margin: 0 0.5rem;
            font-size: 1.1rem;
        }

        .btn-add-to-cart {
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            background-color: #1A2A3A;
            color: white;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.1rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .btn-add-to-cart i {
            margin-right: 0.5rem;
        }

        .btn-add-to-cart:hover {
            background-color: #20c7d9;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        /* Cart Message Styles */
        #cart-message {
            margin: 1rem 0;
        }

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

        .alert-danger {
            color: #ffffff;
            background-color: #dc3545;
            border-left: 4px solid #bd2130;
        }

        /* Product Share Styles */
        .product-share {
            margin-top: 2rem;
            display: flex;
            align-items: center;
        }

        .share-label {
            font-weight: 600;
            color: #1A2A3A;
            margin-right: 1rem;
        }

        .social-links {
            display: flex;
            gap: 0.5rem;
        }

        .social-link {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
        }

        .social-link.facebook {
            background-color: #3b5998;
        }

        .social-link.twitter {
            background-color: #1da1f2;
        }

        .social-link.pinterest {
            background-color: #bd081c;
        }

        .social-link.instagram {
            background-color: #e1306c;
        }

        .social-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 10px rgba(0,0,0,0.1);
            color: white;
        }

        /* Product Description Section Styles */
        .product-description-section {
            padding: 3rem 0;
        }

        .product-tabs {
            background-color: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .nav-tabs {
            border-bottom: 1px solid #eee;
            margin-bottom: 2rem;
            display: flex;
            flex-wrap: wrap;
            padding-left: 0;
            margin-bottom: 0;
            list-style: none;
        }

        .nav-tabs .nav-item {
            margin-bottom: -1px;
        }

        .nav-tabs .nav-link {
            border: 1px solid transparent;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
            display: block;
            padding: 0.5rem 1rem;
            text-decoration: none;
            color: #555;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .nav-tabs .nav-link:hover {
            color: #20c7d9;
        }

        .nav-tabs .nav-link.active {
            color: #1A2A3A;
            background-color: #fff;
            border-color: #eee #eee #fff;
            border-bottom: 2px solid #20c7d9;
        }

        .tab-content {
            padding: 2rem 0;
        }

        .tab-pane {
            display: none;
        }

        .tab-pane.active {
            display: block;
        }

        .tab-pane.fade {
            opacity: 0;
            transition: opacity 0.15s linear;
        }

        .tab-pane.fade.show {
            opacity: 1;
        }

        .product-description-content,
        .product-specifications-content,
        .product-reviews-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
        }

        /* Related Products Section Styles */
        .related-products-section {
            padding: 3rem 0;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1A2A3A;
            margin-bottom: 2rem;
            text-align: center;
        }

        /* Responsive Styles */
        @media (max-width: 991px) {
            .product-hero-title {
                font-size: 2.8rem;
            }

            .product-hero-subtitle {
                font-size: 1.3rem;
            }

            .product-image {
                height: 350px;
            }
        }

        @media (max-width: 767px) {
            .product-hero-section {
                padding: 4rem 0 3rem;
            }

            .product-hero-title {
                font-size: 2.2rem;
            }

            .product-hero-subtitle {
                font-size: 1.2rem;
            }

            .product-image {
                height: 300px;
            }

            .product-details {
                margin-top: 2rem;
            }

            .current-price {
                font-size: 1.8rem;
            }

            .old-price {
                font-size: 1.2rem;
            }
        }
    </style>
@endsection('content')
