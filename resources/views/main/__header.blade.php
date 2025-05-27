<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-right">
                <!-- End DropDown Menu -->
                <span class="divider"></span>
                <a href="{{route('contact')}}" class="contact d-lg-show"><i class="d-icon-map"></i>Contact</a>
                <span class="delimiter">/</span>
                <!-- End of Login -->
            </div>
        </div>
    </div>
    <!-- End HeaderTop -->
    <div class="header-middle sticky-header fix-top sticky-content">
        <div class="container">
            <div class="header-left">
                <a href="#" class="mobile-menu-toggle">
                    <i class="d-icon-bars2"></i>
                </a>
                <a href="{{route('index')}}" class="logo">
                    <img src="{{asset('images/logo/logo.jpg')}}" alt="logo-muster-dickson" width="197" height="85" />
                </a>
                <!-- End Logo -->

                <!-- End Header Search -->
            </div>
            <div class="header-right">
                <a href="tel:+212671265232" class="icon-box icon-box-side">
                    <div class="icon-box-icon mr-0 mr-lg-2">
                        <i class="d-icon-phone"></i>
                    </div>
                    <div class="icon-box-content d-lg-show">
                        <h4 class="icon-box-title">Appelez-nous:</h4>
                        <p>+212 671265232</p>
                    </div>
                </a>
                <span class="divider"></span>
                <div class="dropdown wishlist wishlist-dropdown off-canvas">
{{--                    <a href="wishlist.html" class="wishlist-toggle">--}}
{{--                        <i class="d-icon-heart"></i>--}}
{{--                    </a>--}}
                    <div class="canvas-overlay"></div>
                    <!-- End Wishlist Toggle -->
                    <div class="dropdown-box scrollable">
                        <!-- End of Products  -->
                    </div>
                    <!-- End Dropdown Box -->
                </div>
                <span class="divider"></span>
                <div class="dropdown cart-dropdown type2 off-canvas mr-0 mr-lg-2">
                    <a href="#" class="label-block link cart-trigger" id="cart-trigger">
                        <div class="cart-label d-lg-show">
                            <span class="cart-name">Panier:</span>
                            <span class="cart-price" id="header-cart-total">{{ number_format($cartTotal, 2) }} MAD</span>
                        </div>
                        <i class="d-icon-bag cart-icon" id="cart-icon">
                            <span class="cart-count" id="header-cart-count">{{ $cartItems->count() }}</span>
                        </i>
                    </a>
                    <div class="canvas-overlay"></div>
                </div>

                <script>
                    document.querySelectorAll('.btn-close').forEach(button => {
                        button.addEventListener('click', function () {
                            const productId = this.getAttribute('data-id');

                            fetch(`/cart/remove/${productId}`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                }
                            }).then(response => response.json())
                                .then(data => {
                                    location.reload();
                                });
                        });
                    });

                </script>
            </div>
        </div>
    </div>

    <div class="header-bottom sticky-header fix-top sticky-content">
        <div class="container">
            <div class="header-center justify-content-center">
                <nav class="main-nav">
                    <ul class="menu">
                        <li>
                            <a href="{{route('index')}}">Home</a>
                        </li>
                        <li class="">
                            <a style="text-transform: none!important;" href="{{route('about_us')}}">À propos de nous</a>
                        </li>
                        <li class="">
                            <a style="text-transform: none!important;" href="{{route('ourbrands')}}">Nos marques</a>
                        </li>
                        <li class="">
                            <a href="{{route('contact')}}">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

<!-- Cart Drawer -->
<div class="cart-drawer" id="cart-drawer">
    <div class="cart-drawer-overlay" id="cart-drawer-overlay"></div>
    <div class="cart-drawer-content">
        <div class="cart-drawer-header">
            <h3 class="cart-drawer-title">
                <i class="fas fa-shopping-bag"></i>
                Votre Panier
            </h3>
            <button class="cart-drawer-close" id="cart-drawer-close">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="cart-drawer-body" id="cart-drawer-body">
            <div class="cart-empty-state" id="cart-empty-state" style="display: none;">
                <div class="empty-cart-icon">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <h4>Votre panier est vide</h4>
                <p>Découvrez nos produits et ajoutez-les à votre panier</p>
                <a href="{{ route('shop.index') }}" class="btn btn-primary">Continuer vos achats</a>
            </div>

            <div class="cart-items-list" id="cart-items-list">
                <!-- Cart items will be populated here -->
            </div>
        </div>

        <div class="cart-drawer-footer" id="cart-drawer-footer">
            <div class="cart-total-section">
                <div class="cart-subtotal">
                    <span>Sous-total:</span>
                    <span class="cart-total-amount" id="drawer-cart-total">0.00 MAD</span>
                </div>
            </div>

            <div class="cart-actions">
                <a href="{{ route('cart.show') }}" class="btn btn-outline-primary btn-block">
                    <i class="fas fa-shopping-cart"></i>
                    Voir le panier
                </a>
                <a href="{{ route('checkout') }}" class="btn btn-primary btn-block">
                    <i class="fas fa-credit-card"></i>
                    Commander
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Success Toast -->
<div class="toast-notification" id="success-toast">
    <div class="toast-content">
        <i class="fas fa-check-circle"></i>
        <span class="toast-message">Produit ajouté au panier!</span>
    </div>
</div>
