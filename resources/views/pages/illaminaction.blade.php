@extends('.__base')

@section('content')

    <div class="page-wrapper">
        <main class="main pt-0">
            <div class="page-content">
                <section class="intro-section">
                    <div style="padding: 31px 0;
  box-shadow: 0 5px 30px rgba(0,0,0,0.07);" class="service-carousel owl-carousel owl-theme row owl-nav-fade intro-slider animation-slider cols-1 gutter-no"
                         data-owl-options="{
                        'nav': false,
                        'dots': false,
                        'loop': false,
                        'items': 1,
                        'autoplay': false,
                        'autoplayTimeout': 8000,
                        'responsive': {
                            '992': {
                                'nav': true
                            }
                        }
                    }">
                        <div class="intro-slide1 banner banner-fixed" style="background-color: #f6f6f6;">
                            <figure>
                                <img src="https://muster-dikson.com/images/minisite/illaminaction/img/header.jpg" alt="intro-banner" width="1903"
                                     height="530" style="background-color: #f6f6f6;" />
                            </figure>
                          
                        </div>
                        <div class="banner banner-fixed intro-slide2" style="background-color: #f6f6f6;">
                            <figure>
                                <img src="images/demos/demo-beauty/slides/2.jpg" alt="intro-banner" width="1903"
                                     height="530" style="background-color: #f6f6f6;" />
                            </figure>
                            <div class="container">
                                <div class="banner-content text-right y-50">
                                    <h4 class="banner-subtitle mb-4 ls-normal slide-animate"
                                        data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}">
                                        Best Seller
                                    </h4>
                                    <h2 class="banner-title slide-animate"
                                        data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                                        The Best Cosmetics <br /> for Your Hair and Skin</h2>
                                    <a href="demo-beauty-shop.html" class="btn btn-dark btn-rounded slide-animate"
                                       data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1s', 'delay': '1.8s'}">Shop
                                        Now<i class="d-icon-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>




                <div class="container pt-8 mt-10 appear-animate"
                     data-animation-options="{'name': 'fadeInUpShorter', 'delay': '.3s'}">
                    <h2 class="title title-underline text-center">Best of the Week</h2>
                    <div class="owl-carousel owl-theme row cols-lg-4 cols-md-3 cols-2" data-owl-options="{
                            'items': 4,
                            'nav': false,
                            'dots': false,
                            'margin': 20,
                            'loop': false,
                            'responsive': {
                                '0': {
                                    'items': 2
                                },
                                '768': {
                                    'items': 3
                                },
                                '992': {
                                    'items': 4
                                }
                            }
                        }">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="demo-beauty-product.html">
                                    <img src="images/demos/demo-beauty/products/1.jpg" alt="product" width="300"
                                         height="338">
                                    <img src="images/demos/demo-beauty/products/1-1.jpg" alt="product" width="300"
                                         height="338">
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" title="Select Options">
                                        <i class="d-icon-bag"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                            class="d-icon-heart"></i></a>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                        View</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-name">
                                    <a href="demo-beauty-product.html">Bodycare Smooth Powder</a>
                                </h3>
                                <div class="product-price">
                                    <span class="price">$199.00</span>
                                </div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:40%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="demo-beauty-product.html" class="rating-reviews">( 3 reviews )</a>
                                </div>
                            </div>
                        </div>
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="demo-beauty-product.html">
                                    <img src="images/demos/demo-beauty/products/2.jpg" alt="product" width="300"
                                         height="338">
                                    <img src="images/demos/demo-beauty/products/2-1.jpg" alt="product" width="300"
                                         height="338">
                                </a>
                                <div class="product-label-group">
                                    <span class="product-label label-sale">27% off</span>
                                </div>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                       data-target="#addCartModal" title="Add to cart">
                                        <i class="d-icon-bag"></i></a>
                                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                            class="d-icon-heart"></i></a>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                        View</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-name">
                                    <a href="demo-beauty-product.html">Bodycare Super Maker</a>
                                </h3>
                                <div class="product-price">
                                    <span class="price">$999.00</span>
                                </div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:60%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="demo-beauty-product.html" class="rating-reviews">( 1 reviews )</a>
                                </div>
                            </div>
                        </div>
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="demo-beauty-product.html">
                                    <img src="images/demos/demo-beauty/products/3.jpg" alt="product" width="300"
                                         height="338">
                                    <img src="images/demos/demo-beauty/products/3-1.jpg" alt="product" width="300"
                                         height="338">
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                       data-target="#addCartModal" title="Add to cart">
                                        <i class="d-icon-bag"></i></a>
                                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                            class="d-icon-heart"></i></a>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                        View</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-name">
                                    <a href="demo-beauty-product.html">France Women Mixer</a>
                                </h3>
                                <div class="product-price">
                                    <span class="price">$233.00</span>
                                </div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:20%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="demo-beauty-product.html" class="rating-reviews">( 3 reviews )</a>
                                </div>
                            </div>
                        </div>
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="demo-beauty-product.html">
                                    <img src="images/demos/demo-beauty/products/4.jpg" alt="product" width="300"
                                         height="338">
                                    <img src="images/demos/demo-beauty/products/4-1.jpg" alt="product" width="300"
                                         height="338">
                                </a>
                                <div class="product-label-group">
                                    <span class="product-label label-sale">27% off</span>
                                </div>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" title="Select Options">
                                        <i class="d-icon-arrow-right"></i></a>
                                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                            class="d-icon-heart"></i></a>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                        View</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-name">
                                    <a href="demo-beauty-product.html">Round Cosmetia Powder</a>
                                </h3>
                                <div class="product-price">
                                    <span class="price">$0.80-$2.00</span>
                                </div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="demo-beauty-product.html" class="rating-reviews">( 6 reviews )</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container pt-4 mt-10 appear-animate"
                     data-animation-options="{'name': 'fadeIn', 'delay': '.3s'}">
                    <h2 class="title title-underline text-center mb-7">Popular Categories</h2>
                    <div class="row gutter-md category-grid">
                        <div class="height-x1">
                            <div
                                class="category category-banner category-absolute overlay-light overlay-zoom text-white">
                                <a href="#">
                                    <figure class="category-media">
                                        <img src="images/demos/demo-beauty/categories/1.jpg" alt="category" width="280"
                                             height="250" />
                                    </figure>
                                </a>
                                <div class="category-content">
                                    <h4 class="category-name">Rose Water</h4>
                                    <span class="category-count">
                                        <span>3</span> Products
                                    </span>
                                    <a href="demo-beauty-shop.html" class="btn btn-underline btn-link btn-white">Shop
                                        Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="height-x1 w-2">
                            <div class="category category-banner category-absolute overlay-dark overlay-zoom">
                                <a href="#">
                                    <figure class="category-media">
                                        <img src="images/demos/demo-beauty/categories/2.jpg" alt="category" width="480"
                                             height="250" />
                                    </figure>
                                </a>
                                <div class="category-content">
                                    <h4 class="category-name">Hand Cream</h4>
                                    <span class="category-count">
                                        <span>1</span> Products
                                    </span>
                                    <a href="demo-beauty-shop.html" class="btn btn-underline btn-link">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="height-x2">
                            <div
                                class="category category-banner category-absolute overlay-light overlay-zoom text-white">
                                <a href="#">
                                    <figure class="category-media">
                                        <img src="images/demos/demo-beauty/categories/3.jpg" alt="category" width="380"
                                             height="250" />
                                    </figure>
                                </a>
                                <div class="category-content">
                                    <h4 class="category-name">Toilet Powder</h4>
                                    <span class="category-count">
                                        <span>4</span> Products
                                    </span>
                                    <a href="demo-beauty-shop.html" class="btn btn-underline btn-link btn-white">Shop
                                        Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="height-x1 w-2">
                            <div class="category category-banner category-absolute overlay-dark overlay-zoom">
                                <a href="#">
                                    <figure class="category-media">
                                        <img src="images/demos/demo-beauty/categories/4.jpg" alt="category" width="480"
                                             height="250" />
                                    </figure>
                                </a>
                                <div class="category-content">
                                    <h4 class="category-name">Cosmetic Cream</h4>
                                    <span class="category-count">
                                        <span>5</span> Products
                                    </span>
                                    <a href="demo-beauty-shop.html" class="btn btn-underline btn-link">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="height-x1">
                            <div class="category category-banner category-absolute category5">
                                <a href="#">
                                    <figure class="category-media">
                                        <img src="images/demos/demo-beauty/categories/5.jpg" alt="category" width="280"
                                             height="250" />
                                    </figure>
                                </a>
                                <div class="banner-content w-100 x-50 y-50 text-center pl-2 pr-2">
                                    <h3 class="banner-title text-capitalize font-weight-bold">Our Brands</h3>
                                    <p class="mb-0 text-uppercase text-body">
                                        <a href="#">New York</a> - <a href="#">Paris</a> - <a href="#">Barcelona</a><br>
                                        <a href="#">Milan</a> - <a href="#">Rome</a> - <a href="#">London</a> - <a
                                            href="#">Dubai</a><br>
                                        <a href="#">Moscow</a> - <a href="#">Tokyo</a> - <a href="#">Shanghai</a><br>
                                        <a href="#">Mumbai</a> - <a href="#">Melbourne</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container pt-6 mt-10 text-center appear-animate"
                     data-animation-options="{'name': 'fadeIn', 'delay': '.3s'}">
                    <h2 class="title title-underline text-center">Recent Arrivals</h2>
                    <div class="owl-carousel owl-theme row cols-lg-4 cols-md-3 cols-2 mb-5" data-owl-options="{
                            'items': 4,
                            'nav': false,
                            'dots': false,
                            'margin': 20,
                            'loop': true,
                            'autoplay': true,
                            'autoplayTimeout': 4000,
                            'responsive': {
                                '0': {
                                    'items': 2
                                },
                                '768': {
                                    'items': 3
                                },
                                '992': {
                                    'items': 4
                                }
                            }
                        }">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="demo-beauty-product.html">
                                    <img src="images/demos/demo-beauty/products/5.jpg" alt="product" width="300"
                                         height="338">
                                    <img src="images/demos/demo-beauty/products/5-1.jpg" alt="product" width="300"
                                         height="338">
                                </a>
                                <div class="product-label-group">
                                    <span class="product-label label-sale">27% off</span>
                                </div>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" title="Select Options">
                                        <i class="d-icon-bag"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                            class="d-icon-heart"></i></a>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                        View</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-name">
                                    <a href="demo-beauty-product.html">Best Haircare</a>
                                </h3>
                                <div class="product-price">
                                    <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                                </div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:40%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="demo-beauty-product.html" class="rating-reviews">( 3 reviews )</a>
                                </div>
                            </div>
                        </div>
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="demo-beauty-product.html">
                                    <img src="images/demos/demo-beauty/products/6.jpg" alt="product" width="300"
                                         height="338">
                                    <img src="images/demos/demo-beauty/products/6-1.jpg" alt="product" width="300"
                                         height="338">
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                       data-target="#addCartModal" title="Add to cart">
                                        <i class="d-icon-bag"></i></a>
                                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                            class="d-icon-heart"></i></a>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                        View</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-name">
                                    <a href="demo-beauty-product.html">Pretty Lady Cosmetia</a>
                                </h3>
                                <div class="product-price">
                                    <span class="price">$999.00</span>
                                </div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:60%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="demo-beauty-product.html" class="rating-reviews">( 1 reviews )</a>
                                </div>
                            </div>
                        </div>
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="demo-beauty-product.html">
                                    <img src="images/demos/demo-beauty/products/7.jpg" alt="product" width="300"
                                         height="338">
                                    <img src="images/demos/demo-beauty/products/7-1.jpg" alt="product" width="300"
                                         height="338">
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                       data-target="#addCartModal" title="Add to cart">
                                        <i class="d-icon-bag"></i></a>
                                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                            class="d-icon-heart"></i></a>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                        View</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-name">
                                    <a href="demo-beauty-product.html">Cosmetic Perfect Tool</a>
                                </h3>
                                <div class="product-price">
                                    <span class="price">$233.00</span>
                                </div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:20%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="demo-beauty-product.html" class="rating-reviews">( 3 reviews )</a>
                                </div>
                            </div>
                        </div>
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="demo-beauty-product.html">
                                    <img src="images/demos/demo-beauty/products/8.jpg" alt="product" width="300"
                                         height="338">
                                    <img src="images/demos/demo-beauty/products/8-1.jpg" alt="product" width="300"
                                         height="338">
                                </a>
                                <div class="product-label-group">
                                    <span class="product-label label-sale">27% off</span>
                                </div>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" title="Select Options">
                                        <i class="d-icon-bag"></i></a>
                                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i
                                            class="d-icon-heart"></i></a>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                        View</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-name">
                                    <a href="demo-beauty-product.html">American Woman Lipstick</a>
                                </h3>
                                <div class="product-price">
                                    <ins class="new-price">$199.00</ins><del class="old-price">$210.00</del>
                                </div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="demo-beauty-product.html" class="rating-reviews">( 6 reviews )</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="demo-beauty-shop.html" class="btn btn-outline btn-rounded btn-dark mb-4">View All
                        Products</a>
                </div>
                <section class="banner parallax mt-10 appear-animate" style="background-color: #1d1e20"
                         data-parallax-options="{'speed':2.5,'parallaxHeight':'150%','offset':-30}"
                         data-image-src="images/demos/demo-beauty/parallax.jpg">
                    <div class="container">
                        <div class="banner-content appear-animate" data-animation-options="{
                            'name': 'blurIn'
                        }">
                            <h4 class="banner-subtitle text-uppercase text-primary slide-animate"
                                data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}">
                                Flash Sale 50% Off
                            </h4>
                            <h2 class="banner-title slide-animate font-weight-bold"
                                data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1.2s', 'delay': '1s'}">
                                Cosmetics For Summer Season</h2>
                            <a href="demo-beauty-shop.html"
                               class="btn btn-white btn-icon-right btn-rounded slide-animate"
                               data-animation-options="{'name': 'fadeInUpShorter', 'duration': '1s', 'delay': '1.8s'}">Shop
                                Now<i class="d-icon-arrow-right"></i></a>
                        </div>
                    </div>
                </section>
                <section class="container mt-10 pt-4 appear-animate"
                         data-animation-options="{'name': 'fadeInLeftShorter', 'delay': '.3s'}">
                    <h2 class="title title-underline text-center">From Our Blogs</h2>
                    <div class="owl-carousel owl-theme owl-shadow-carousel row cols-lg-3 cols-sm-2 cols-1"
                         data-owl-options="{
                    'items': 3,
                    'margin': 20,
                    'dots': true,
                    'loop': false,
                    'nav': false,
                    'responsive': {
                        '0': {
                            'items': 1
                        },
                        '576': {
                            'items': 2
                        },
                        '992': {
                            'items': 3,
                            'dots': false
                        }
                    }
                }">
                        <div class="post post-frame overlay-zoom">
                            <figure class="post-media">
                                <a href="post-single.html">
                                    <img src="images/demos/demo-beauty/blog/1.jpg" width="340" height="206"
                                         alt="post" />
                                </a>
                                <div class="post-calendar">
                                    <span class="post-day">03</span>
                                    <span class="post-month">DEC</span>
                                </div>
                            </figure>
                            <div class="post-details">
                                <h4 class="post-title"><a href="#">Sed adipiscing ornare</a></h4>
                                <p class="post-content">Sed pretium, ligula sollicitudin laoreet viverra, tortor libero
                                    sodales leo, eget blandit…</p>
                                <a href="blog-classic.html" class="btn btn-link btn-underline btn-primary">Read
                                    More<i class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="post post-frame overlay-zoom">
                            <figure class="post-media">
                                <a href="post-single.html">
                                    <img src="images/demos/demo-beauty/blog/2.jpg" width="340" height="206"
                                         alt="post" />
                                </a>
                                <div class="post-calendar">
                                    <span class="post-day">01</span>
                                    <span class="post-month">DEC</span>
                                </div>
                            </figure>
                            <div class="post-details">
                                <h4 class="post-title"><a href="#">Sed pretium sollicitudin leo</a></h4>
                                <p class="post-content">Sed pretium, ligula sollicitudin laoreet viverra, tortor libero
                                    sodales leo, eget blandit…</p>
                                <a href="blog-classic.html" class="btn btn-link btn-underline btn-primary">Read
                                    More<i class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="post post-frame overlay-zoom">
                            <figure class="post-media">
                                <a href="post-single.html">
                                    <img src="images/demos/demo-beauty/blog/3.jpg" width="340" height="206"
                                         alt="post" />
                                </a>
                                <div class="post-calendar">
                                    <span class="post-day">02</span>
                                    <span class="post-month">DEC</span>
                                </div>
                            </figure>
                            <div class="post-details">
                                <h4 class="post-title"><a href="#">Ornare risus utaliquam</a></h4>
                                <p class="post-content">Sed pretium, ligula sollicitudin laoreet viverra, tortor libero
                                    sodales leo, eget blandit…</p>
                                <a href="blog-classic.html" class="btn btn-link btn-underline btn-primary">Read
                                    More<i class="d-icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="brand-section container pt-10 pb-10 appear-animate" data-animation-options="{
                    'delay': '.3s'
                }">
                    <div class="with-border mb-6 mt-6">
                        <div class="owl-carousel mt-4 mb-4 owl-theme row brand-carousel cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2"
                             data-owl-options="{
                                'nav': false,
                                'dots': false,
                                'autoplay': true,
                                'margin': 20,
                                'loop': true,
                                'responsive': {
                                    '0': {
                                        'items': 2
                                    },
                                    '576': {
                                        'items': 3
                                    },
                                    '768': {
                                        'items': 4
                                    },
                                    '992': {
                                        'items': 5
                                    },
                                    '1200': {
                                        'items': 6
                                    }
                                }
                            }">
                            <figure><img src="images/brands/1.png" alt="brand" width="180" height="100" />
                            </figure>
                            <figure><img src="images/brands/2.png" alt="brand" width="180" height="100" />
                            </figure>
                            <figure><img src="images/brands/3.png" alt="brand" width="180" height="100" />
                            </figure>
                            <figure><img src="images/brands/4.png" alt="brand" width="180" height="100" />
                            </figure>
                            <figure><img src="images/brands/5.png" alt="brand" width="180" height="100" />
                            </figure>
                            <figure><img src="images/brands/6.png" alt="brand" width="180" height="100" />
                            </figure>
                        </div>
                    </div>
                </div>
                <section class="instagram-section pt-10 pb-10 appear-animate" data-animation-options="{
                    'delay': '.3s'
                }">
                    <div class="container pb-8 pt-8">
                        <h2 class="title title-underline text-center">Instagram</h2>
                        <div class="owl-carousel owl-theme row brand-carousel cols-xl-5 cols-lg-4 cols-md-3 cols-sm-2 cols-2"
                             data-owl-options="{
                                    'nav': false,
                                    'autoplay': true,
                                    'margin': 20,
                                    'loop': false,
                                    'responsive': {
                                        '0': {
                                            'items': 2
                                        },
                                        '576': {
                                            'items': 3
                                        },
                                        '992': {
                                            'items': 4
                                        }
                                    }
                                }">
                            <figure class="instagram">
                                <a href="#"><img src="images/demos/demo-beauty/instagram/1.jpg" alt="brand" width="280"
                                                 height="280" /></a>
                            </figure>
                            <figure class="instagram">
                                <a href="#"><img src="images/demos/demo-beauty/instagram/2.jpg" alt="brand" width="280"
                                                 height="280" /></a>
                            </figure>
                            <figure class="instagram">
                                <a href="#"><img src="images/demos/demo-beauty/instagram/3.jpg" alt="brand" width="280"
                                                 height="280" /></a>
                            </figure>
                            <figure class="instagram">
                                <a href="#"><img src="images/demos/demo-beauty/instagram/4.jpg" alt="brand" width="280"
                                                 height="280" /></a>
                            </figure>
                        </div>
                    </div>
                </section>
            </div>

        </main>

    </div>
@endsection('content')
