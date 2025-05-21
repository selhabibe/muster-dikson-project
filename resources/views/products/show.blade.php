@extends('.__base')

@section('content')
    <div class="page-wrapper">
        <main class="main pt-6 with-border single-product">
            <div class="page-content mb-10 pb-6">
                <div class="container">
                    <!-- Product Section -->
                    <div class="product product-single row">
                        <!-- Product Gallery Column -->
                        <div class="col-md-6">
                            <div class="product-gallery product-gallery-sticky mb-lg-9 mb-4">
                                <!-- Main Product Carousel -->
                                <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
                                    @foreach($product->getMedia('product-images') as $media)
                                        @if ($media->getUrl())
                                            <figure class="product-image">
                                                <img src="{{ $media->getUrl() }}"
                                                     data-zoom-image="{{ $media->getUrl() }}"
                                                     alt="{{ $product->name }}"
                                                     class="product-image-main">
                                            </figure>
                                        @endif
                                    @endforeach
                                </div>

                                <!-- Product Thumbnails -->
                                <div class="product-thumbs-wrap">
                                    <div class="product-thumbs">
                                        @foreach($product->getMedia('product-images') as $media)
                                            @if ($media->getUrl())
                                                <div class="product-thumb {{ $loop->first ? 'active' : '' }}">
                                                    <img src="{{ $media->getUrl() }}"
                                                         alt="{{ $product->name }}">
                                                </div>
                                            @else
                                                <div class="product-thumb">
                                                    <img src="https://i.makeup.fr/i/i4/i4dfmpe8rxkj.png"
                                                         alt="Product Image">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <button class="thumb-up disabled"><i class="fas fa-chevron-left"></i></button>
                                    <button class="thumb-down disabled"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Product Details Column -->
                        <div class="col-md-6">
                            <div class="product-details">
                                <!-- Breadcrumb Navigation -->
                                <div class="product-navigation">
                                    <ul class="breadcrumb breadcrumb-lg">
                                        <li><a href="{{route("index")}}"><i class="d-icon-home"></i></a></li>
                                        <li>{{ $product->name }}</li>
                                    </ul>
                                </div>

                                <!-- Product Title -->
                                <h1 class="product-name">{{ $product->name }}</h1>

                                <!-- Product Meta Information -->
                                <div class="product-meta">
                                    @if(isset($product->brand->name))
                                        <div class="product-meta-item">
                                            <span class="product-meta-label">Code:</span>
                                            <span class="product-sku">{{ $product->code }}</span>
                                        </div>
                                    @endif
                                    @if(isset($product->brand->name))
                                        <div class="product-meta-item">
                                            <span class="product-meta-label">BRAND:</span>
                                            <span class="product-brand">{{ $product->brand->name }}</span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Product Price -->
                                <div class="product-price">{{ $product->price }} MAD</div>

                                <!-- Product Ratings -->
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:80%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <span class="link-to-tab rating-reviews">( 6 avis )</span>
                                </div>

                                <!-- Product Short Description -->
                                <div class="product-short-desc">
                                    @if (!is_null($product->short_desc))
                                        {!! \Illuminate\Support\Str::markdown($product->description ?? '') !!}
                                    @endif
                                </div>

                                <hr class="product-divider">

                                <!-- Product Form - Quantity and Add to Cart -->
                                <div class="product-form product-qty">
                                    <label>QTY:</label>
                                    <div class="product-form-group">
                                        <div class="input-group">
                                            <button class="quantity-minus d-icon-minus"></button>
                                            <input class="quantity form-control" type="number" min="1" value="1" max="1000000" id="product-quantity">
                                            <button class="quantity-plus d-icon-plus"></button>
                                        </div>

                                        <!-- Add to Cart Button -->
                                        <button class="btn-product btn-cart" id="add-to-cart-btn" data-product-id="{{ $product->id }}">
                                            <i class="d-icon-bag"></i>Ajouter au panier
                                        </button>
                                    </div>
                                </div>

                                <!-- Display messages -->
                                <div id="message" style="display: none;"></div>

                                <hr class="product-divider mb-3">

                                <!-- Product Footer - Social Links -->
                                <div class="product-footer">
                                    <div class="social-links mr-4">
                                        <a href="{{route('index')}}" class="social-link social-facebook fab fa-facebook-f"></a>
                                        <a href="{{route('index')}}" class="social-link social-pinterest fab fa-pinterest-p"></a>
                                    </div>
                                    <span class="divider d-lg-show"></span>
                                    <div class="product-action">
                                        <!-- Placeholder for additional action buttons -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Tabs - Description -->
                    <div class="tab tab-nav-simple product-tabs">
                        <ul class="nav nav-tabs justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#product-tab-description">Description</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active in" id="product-tab-description">
                                <div class="row mt-6">
                                    <div class="col-md-12 mb-8">
                                        @if(!is_null($product->description))
                                            <div class="product-description">
                                                {!! \Illuminate\Support\Str::markdown($product->description) !!}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Include the necessary script at the bottom of the template -->
    @section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const addToCartButton = document.getElementById('add-to-cart-btn');
            const messageElement = document.getElementById('message');

            addToCartButton.addEventListener('click', function (e) {
                e.preventDefault();

                const productId = this.getAttribute('data-product-id');
                const quantity = document.getElementById('product-quantity').value;

                const cartData = {
                    product_id: productId,
                    quantity: quantity,
                    _token: '{{ csrf_token() }}'
                };

                // Show loading state
                addToCartButton.classList.add('loading');

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
                    // Remove loading state
                    addToCartButton.classList.remove('loading');

                    if (data.success === 'Item added to cart successfully!') {
                        // Show success message
                        messageElement.textContent = 'Product added to cart successfully!';
                        messageElement.style.display = 'block';
                        messageElement.style.color = 'green';

                        // Hide message after 3 seconds
                        setTimeout(() => {
                            messageElement.style.display = 'none';
                        }, 3000);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    addToCartButton.classList.remove('loading');

                    // Show error message
                    messageElement.textContent = 'Failed to add product to cart. Please try again.';
                    messageElement.style.display = 'block';
                    messageElement.style.color = 'red';
                });
            });
        });
    </script>
    @endsection
@endsection('content')
