@extends('.__base')

@section('content')
    <div class="page-wrapper">
        <main class="main">
            <!-- Breadcrumb Section -->
            <section class="product-breadcrumb-section">
                <div class="container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}"><i class="fas fa-home"></i> Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{route('shop.index')}}">Produits</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                        </ol>
                    </nav>
                </div>
            </section>

            <!-- Product Details Section -->
            <section class="product-details-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-5">
                            <div class="product-gallery-modern">
                                <div class="product-main-image">
                                    <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner">
                                        @foreach($product->getMedia('product-images') as $media)
                                            @if ($media->getUrl())
                                                <div class="product-image-container">
                                                    <img src="{{ $media->getUrl() }}" alt="{{ $product->name }}" class="product-main-img">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="product-thumbnails">
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
                                        <button class="thumb-nav thumb-prev"><i class="fas fa-chevron-left"></i></button>
                                        <button class="thumb-nav thumb-next"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="product-info-card">
                                <div class="product-header">
                                    <h1 class="product-title">{{ $product->name }}</h1>
                                    <div class="product-meta-info">
                                        @if(isset($product->code))
                                            <span class="product-code">Code: <strong>{{ $product->code }}</strong></span>
                                        @endif
                                        @if(isset($product->brand->name))
                                            <span class="product-brand">Marque: <strong>{{ $product->brand->name }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="product-price-section">
                                    <div class="price-display">
                                        <span class="current-price">{{ $product->price }} MAD</span>
                                        @if($product->old_price && $product->old_price > $product->price)
                                            <span class="old-price">{{ $product->old_price }} MAD</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="product-rating">
                                    <div class="rating-stars">
                                        <div class="stars-container">
                                            <span class="stars-filled" style="width:80%"></span>
                                        </div>
                                        <span class="rating-text">( 6 avis )</span>
                                    </div>
                                </div>

                                @if (!is_null($product->short_desc))
                                    <div class="product-description">
                                        {!! \Illuminate\Support\Str::markdown($product->short_desc ?? '') !!}
                                    </div>
                                @endif

                                <div class="product-purchase-section">
                                    <div class="quantity-selector">
                                        <label class="quantity-label">Quantité:</label>
                                        <div class="quantity-controls">
                                            <div class="quantity-input-group">
                                                <button type="button" class="quantity-btn quantity-minus">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <input class="quantity-input" type="number" min="1" value="1" max="1000000" id="product-quantity">
                                                <button type="button" class="quantity-btn quantity-plus">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="add-to-cart-section">
                                        <button class="btn-add-to-cart" id="add-to-cart-btn" data-product-id="{{ $product->id }}">
                                            <i class="fas fa-shopping-bag"></i>
                                            <span>Ajouter au panier</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="product-actions">
                                    <div class="social-share">
                                        <span class="share-label">Partager:</span>
                                        <div class="social-links">
                                            <a href="#" class="social-link facebook" title="Partager sur Facebook">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                            <a href="#" class="social-link pinterest" title="Partager sur Pinterest">
                                                <i class="fab fa-pinterest-p"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Product Description Section -->
            <section class="product-description-section">
                <div class="container">
                    <div class="product-tabs-modern">
                        <div class="tab-header-modern">
                            <div class="tab-title">
                                <i class="fas fa-info-circle"></i>
                                Description du produit
                            </div>
                        </div>

                        <div class="tab-content-modern">
                            <div class="description-content">
                                @if(!is_null($product->description))
                                    <div class="product-description-text">
                                        {!! \Illuminate\Support\Str::markdown($product->description) !!}
                                    </div>
                                @else
                                    <div class="no-description">
                                        <p>Aucune description disponible pour ce produit.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Display messages -->
            <div id="message" style="display: none; color: green; margin-top: 20px;"></div>

            @section('scripts')
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        // Initialize Owl Carousel
                        let productCarousel = $('.product-single-carousel').owlCarousel({
                            items: 1,
                            nav: true,
                            dots: false,
                            loop: false,
                            navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
                            responsive: {
                                0: { nav: false },
                                768: { nav: true }
                            }
                        });

                        // Thumbnail click functionality
                        $('.product-thumb').on('click', function() {
                            const index = $(this).index();

                            // Remove active class from all thumbnails
                            $('.product-thumb').removeClass('active');

                            // Add active class to clicked thumbnail
                            $(this).addClass('active');

                            // Go to corresponding slide in carousel
                            productCarousel.trigger('to.owl.carousel', [index, 300]);
                        });

                        // Update thumbnail active state when carousel changes
                        productCarousel.on('changed.owl.carousel', function(event) {
                            const currentIndex = event.item.index;
                            $('.product-thumb').removeClass('active');
                            $('.product-thumb').eq(currentIndex).addClass('active');
                        });

                        // Thumbnail navigation buttons
                        $('.thumb-prev').on('click', function() {
                            $('.product-thumbs').animate({
                                scrollLeft: '-=100'
                            }, 300);
                        });

                        $('.thumb-next').on('click', function() {
                            $('.product-thumbs').animate({
                                scrollLeft: '+=100'
                            }, 300);
                        });

                        // Add to cart functionality
                        const addToCartButton = document.getElementById('add-to-cart-btn');
                        const quantityInput = document.getElementById('product-quantity');
                        const quantityMinusBtn = document.querySelector('.quantity-minus');
                        const quantityPlusBtn = document.querySelector('.quantity-plus');

                        // Quantity controls
                        quantityMinusBtn.addEventListener('click', function() {
                            let currentValue = parseInt(quantityInput.value);
                            if (currentValue > 1) {
                                quantityInput.value = currentValue - 1;
                            }
                        });

                        quantityPlusBtn.addEventListener('click', function() {
                            let currentValue = parseInt(quantityInput.value);
                            quantityInput.value = currentValue + 1;
                        });

                        // Add to cart with modern UX
                        addToCartButton.addEventListener('click', async function (e) {
                            e.preventDefault();

                            const productId = this.getAttribute('data-product-id');
                            const quantity = parseInt(quantityInput.value);

                            // Show loading state
                            const originalText = this.innerHTML;
                            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>Ajout en cours...</span>';
                            this.disabled = true;

                            try {
                                // Use global cart function
                                const success = await window.addToCartGlobal(productId, quantity);

                                if (success) {
                                    // Show success state
                                    this.innerHTML = '<i class="fas fa-check"></i> <span>Ajouté!</span>';
                                    this.classList.add('success');

                                    // Reset after 2 seconds
                                    setTimeout(() => {
                                        this.innerHTML = originalText;
                                        this.disabled = false;
                                        this.classList.remove('success');
                                    }, 2000);
                                } else {
                                    throw new Error('Failed to add to cart');
                                }
                            } catch (error) {
                                console.error('Error:', error);
                                this.innerHTML = '<i class="fas fa-exclamation-triangle"></i> <span>Erreur</span>';

                                // Reset after 2 seconds
                                setTimeout(() => {
                                    this.innerHTML = originalText;
                                    this.disabled = false;
                                }, 2000);
                            }
                        });
                    });
                </script>
            @endsection

        </main>
    </div>
@endsection
