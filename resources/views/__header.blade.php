<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
            </div>
            <div class="header-right">
                <!-- End DropDown Menu -->
                <span class="divider d-lg-show"></span>
                <a href="{{ route("contact") }}" class="contact d-lg-show ml-0"><i class="d-icon-map"></i>Contactez-nous</a>
                <span class="divider d-lg-show"></span>
            </div>
        </div>
    </div>
    <!-- End HeaderTop -->
    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <a href="#" class="mobile-menu-toggle">
                    <i class="d-icon-bars2"></i>
                </a>
                <a href="tel:+212671265232" class="call icon-box icon-box-side">
                    <div class="icon-box-icon text-white p-0">
                        <i class="d-icon-phone"></i>
                    </div>
                    <div class="icon-box-content d-lg-show">
                        <h4 class="icon-box-title text-white">Appelez-nous:</h4>
                        <p class="text-white">+212 671 265 232</p>
                    </div>
                </a>
            </div>
            <div class="header-center">
                <a href="{{route('index')}}" class="logo">
                    <img src="{{asset('images/logo/M_D_Logo_white_font.png')}}" alt="logo-muster-dickson" width="187" height="75" />
                </a>
                <!-- End Header Search -->
            </div>
            <div class="header-right">


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
            </div>
        </div>
    </div>

    <div class="header-bottom sticky-header fix-top sticky-content">
        <div class="container">
            <div class="header-center justify-content-center">
                <nav class="main-nav">
                    <ul class="menu">
                        <li class="active">
                            <a href="{{route('index')}}">Home</a>
                        </li>
{{--                        <li class="">--}}
{{--                            <a href="{{route('index')}}">Coiffeur</a>--}}
{{--                        </li>--}}
{{--                        <li class="">--}}
{{--                            <a href="{{route('video')}}">Video</a>--}}
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
<!-- End Header -->

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
