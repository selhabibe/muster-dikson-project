@extends('.__base')

@section('content')


    <div class="page-wrapper">
        <main class="main pt-6 with-border single-product">
            <div class="page-content mb-10 pb-6">
                <div class="container">
                    <div class="product product-single row">
                        <div class="col-md-6">
                            <div class="product-gallery product-gallery-sticky mb-lg-9 mb-4">
                                <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">

                                    @foreach($product->getMedia('product-images') as $media)
                                        @if ($media->getUrl())
                                            <figure class="product-image" style="width: auto; height: 550px; overflow: hidden;">
                                                <img src="{{ $media->getUrl() }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: contain;">
                                            </figure>
                                        @endif
                                    @endforeach

                                </div>
                                <div class="product-thumbs-wrap" style="position: relative; display: flex; align-items: center;">
                                    <div class="product-thumbs" style="display: flex; gap: 15px; overflow: hidden;">
                                        @foreach($product->getMedia('product-images') as $media)
                                            @if ($media->getUrl())
                                                <div class="product-thumb {{ $loop->first ? 'active' : '' }}" style="flex: 1; width: 100%; height: 150px; overflow: hidden; position: relative;">
                                                    <img src="{{ $media->getUrl() }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: contain;">
                                                </div>
                                            @else
                                                <div class="product-thumb" style="flex: 1; width: 100%; height: 150px; overflow: hidden; position: relative;">
                                                    <img src="https://i.makeup.fr/i/i4/i4dfmpe8rxkj.png" alt="Product Image" style="width: 100%; height: 100%; object-fit: contain;">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <button class="thumb-up disabled" style="position: absolute; left: -20px; top: 50%; transform: translateY(-50%);"><i class="fas fa-chevron-left"></i></button>
                                    <button class="thumb-down disabled" style="position: absolute; right: -20px; top: 50%; transform: translateY(-50%);"><i class="fas fa-chevron-right"></i></button>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-details">
                                <div class="product-navigation">
                                    <ul class="breadcrumb breadcrumb-lg">
                                        <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
                                        <li class="delimiter">/</li>
                                        <li><a href="product.html" class="active">Products</a></li>
                                        <li class="delimiter">/</li>
                                        <li>{{ $product->name }}</li>
                                    </ul>

{{--                                    <ul class="product-nav">--}}
{{--                                        <li class="product-nav-prev">--}}
{{--                                            <a href="#">--}}
{{--                                                <i class="d-icon-arrow-left"></i> Prev--}}
{{--                                                <span class="product-nav-popup">--}}
{{--                                --}}{{--                    <img src="images/product/product-thumb-prev.jpg"--}}
{{--                                --}}{{--                         alt="product thumbnail" width="110" height="123">--}}
{{--                                                    <span class="product-name">Sed egtas Dnte Comfort</span>--}}
{{--                                                </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="product-nav-next">--}}
{{--                                            <a href="#">--}}
{{--                                                Next <i class="d-icon-arrow-right"></i>--}}
{{--                                                <span class="product-nav-popup">--}}
{{--                                                    <img src="images/product/product-thumb-next.jpg"--}}
{{--                                                         alt="product thumbnail" width="110" height="123">--}}
{{--                                                    <span class="product-name">Sed egtas Dnte Comfort</span>--}}
{{--                                                </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
                                </div>

                                <h1 class="product-name">{{ $product->name }}</h1>
                                <div class="product-meta">
                                    @if(isset($product->brand->name))
                                        Code: <span class="product-sku">{{ $product->code }}</span>
                                    @endif
                                    @if(isset($product->brand->name))
                                        BRAND: <span class="product-brand">  {{ $product->brand->name }}
                                    @endif
                                    </span>
                                </div>
                                <div class="product-price">{{ $product->price }} MAD</div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:80%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <span class="link-to-tab rating-reviews">( 6 avis )</span>
                                </div>
                                <p class="product-short-desc">{!! $product->short_desc !!}</p>

                                <hr class="product-divider">

                                <div class="product-form product-qty">
                                    <label>QTY:</label>
                                    <div class="product-form-group">
                                        <div class="input-group">
                                            <button class="quantity-minus d-icon-minus"></button>
                                            <input class="quantity form-control" type="number" min="1" value="1" max="1000000" id="product-quantity">
                                            <button class="quantity-plus d-icon-plus"></button>
                                        </div>

                                        <!-- Add the data attribute to identify the product ID -->
                                        <button class="btn-product btn-cart" id="add-to-cart-btn" data-product-id="{{ $product->id }}">
                                            <i class="d-icon-bag"></i>Ajouter au panier
                                        </button>
                                    </div>
                                </div>

                                <!-- Display messages -->
                                <div id="message" style="display: none; color: green; margin-top: 20px;"></div>

                                <!-- Include the necessary script at the bottom of the template -->
                                @section('scripts')
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function () {
                                            const addToCartButton = document.getElementById('add-to-cart-btn');

                                            addToCartButton.addEventListener('click', function (e) {
                                                e.preventDefault();

                                                const productId = this.getAttribute('data-product-id');
                                                const quantity = document.getElementById('product-quantity').value;

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
                                                        if (data.success === 'Item added to cart successfully!') {
                                                            // alert("product added");
                                                        }
                                                    })
                                                    .catch(error => console.error('Error:', error));
                                            });

                                        });

                                    </script>
                                @endsection



                                <hr class="product-divider mb-3">

                                <div class="product-footer">
                                    <div class="social-links mr-4">
                                        <a href="{{route('index')}}" class="social-link social-facebook fab fa-facebook-f"></a>
                                        <a href="{{route('index')}}" class="social-link social-pinterest fab fa-pinterest-p"></a>
                                    </div>
                                    <span class="divider d-lg-show"></span>
                                    <div class="product-action">
{{--                                        <a href="#" class="btn-product btn-wishlist mr-6"><i--}}
{{--                                                class="d-icon-heart"></i>Add to--}}
{{--                                            wishlist</a>--}}
{{--                                        <span class="divider d-lg-show"></span>--}}
{{--                                        <a href="#" class="btn-product btn-compare"><i--}}
{{--                                                class="d-icon-compare"></i>Compare</a>--}}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="tab tab-nav-simple product-tabs">
                        <ul class="nav nav-tabs justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#product-tab-description">Description</a>
                            </li>
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="#product-tab-additional">Additional information</a>--}}
{{--                            </li>--}}


                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active in" id="product-tab-description">
                                <div class="row mt-6">
                                    <div class="col-md-6 mb-8">

                                        {!! \Illuminate\Support\Str::markdown($product->description) !!}


                                        {{--                                        <h5 class="description-title mb-4 font-weight-semi-bold ls-m">Features</h5>--}}
{{--                                        <p class="mb-2">--}}
{{--                                            Praesent id enim sit amet.Tdio vulputate eleifend in in tortor.--}}
{{--                                            ellus massa. siti iMassa ristique sit amet condim vel, facilisis--}}
{{--                                            quimequistiqutiqu amet condim Dilisis Facilisis quis sapien. Praesent id--}}
{{--                                            enim sit amet.--}}
{{--                                        </p>--}}
{{--                                        <ul class="mb-8">--}}
{{--                                            <li>Praesent id enim sit amet.Tdio vulputate</li>--}}
{{--                                            <li>Eleifend in in tortor. ellus massa.Dristique sitii</li>--}}
{{--                                            <li>Massa ristique sit amet condim vel</li>--}}
{{--                                            <li>Dilisis Facilisis quis sapien. Praesent id enim sit amet</li>--}}
{{--                                        </ul>--}}
{{--                                        <h5 class="description-title mb-3 font-weight-semi-bold ls-m">Specifications--}}
{{--                                        </h5>--}}
{{--                                        <table class="table">--}}
{{--                                            <tbody>--}}
{{--                                            <tr>--}}
{{--                                                <th class="font-weight-semi-bold text-dark pl-0">Material</th>--}}
{{--                                                <td class="pl-4">Praesent id enim sit amet.Tdio</td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <th class="font-weight-semi-bold text-dark pl-0">Claimed Size</th>--}}
{{--                                                <td class="pl-4">Praesent id enim sit</td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <th class="font-weight-semi-bold text-dark pl-0">Recommended Use--}}
{{--                                                </th>--}}
{{--                                                <td class="pl-4">Praesent id enim sit amet.Tdio vulputate eleifend--}}
{{--                                                    in in tortor. ellus massa. siti</td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <th class="font-weight-semi-bold text-dark border-no pl-0">--}}
{{--                                                    Manufacturer</th>--}}
{{--                                                <td class="border-no pl-4">Praesent id enim</td>--}}
{{--                                            </tr>--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
                                    </div>
{{--                                    <div class="col-md-6 pl-md-6">--}}
{{--                                        <h5 class="description-title font-weight-semi-bold ls-m mb-5">Video Description--}}
{{--                                        </h5>--}}
{{--                                        <figure class="p-relative d-inline-block mb-2">--}}
{{--                                            <img src="images/product/product.jpg" width="559" height="370" alt="Product">--}}
{{--                                            <a class="btn-play btn-iframe" href="video/memory-of-a-woman.mp4">--}}
{{--                                                <i class="d-icon-play-solid"></i>--}}
{{--                                            </a>--}}
{{--                                        </figure>--}}
{{--                                        <div class="icon-box-wrap d-flex flex-wrap">--}}
{{--                                            <div class="icon-box icon-box-side icon-border pt-2 pb-2 mb-4 mr-10">--}}
{{--                                                <div class="icon-box-icon">--}}
{{--                                                    <i class="d-icon-lock"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="icon-box-content">--}}

{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="divider d-xl-show mr-10"></div>--}}
{{--                                            <div class="icon-box icon-box-side icon-border pt-2 pb-2 mb-4">--}}
{{--                                                <div class="icon-box-icon">--}}
{{--                                                    <i class="d-icon-truck"></i>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
{{--                            <div class="tab-pane" id="product-tab-additional">--}}
{{--                                <ul class="list-none">--}}
{{--                                    <li><label>Brands:</label>--}}
{{--                                        <p>SkillStar, SLS</p>--}}
{{--                                    </li>--}}
{{--                                    <li><label>Color:</label>--}}
{{--                                        <p>Blue, Brown</p>--}}
{{--                                    </li>--}}
{{--                                    <li><label>Size:</label>--}}
{{--                                        <p>Large, Medium, Small</p>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}

                        </div>
                    </div>
                </div>
            </div>

        </main>
        <!-- End of Main -->
    </div>


@endsection('content')
