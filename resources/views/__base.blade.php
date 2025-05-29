<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- SEO Meta Tags -->
        @hasSection('seo')
            @yield('seo')
        @else
            <x-seo-head />
        @endif

        <!-- Favicon -->
        <link rel="icon" href="{{asset('images/front/favicon-32x32.png')}}" type="image/x-icon">
        <!-- Preload Font -->
        <link rel="preload" href="fonts/riode.ttf?5gap68" as="font" type="font/woff2" crossorigin="anonymous">
        <link rel="preload" href="vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2"
              crossorigin="anonymous">
        <link rel="preload" href="vendor/fontawesome-free/webfonts/fa-brands-400.woff2" as="font" type="font/woff2"
              crossorigin="anonymous">
        <script>
            WebFontConfig = {
                google: { families: [ 'Jost:300,400,500,600,700', 'Poppins:300,400,500,600,700,800' ] }
            };
            ( function ( d ) {
                var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
                wf.src = 'js/webfont.js';
                wf.async = true;
                s.parentNode.insertBefore( wf, s );
            } )( document );
        </script>

        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/template/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/template/animate/animate.min.css')}}">

        <!-- Plugins CSS File -->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/template/magnific-popup/magnific-popup.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/template/owl-carousel/owl.carousel.min.css')}}">

        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/template/sticky-icon/stickyicon.css')}}">

        <!-- Main CSS File -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/demo34.min.css')}}">

        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom/newsletter.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom/product-page.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom/cart-drawer.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom/stock-alerts.css')}}">


    </head>

    <body class="home">
        <div class="page-wrapper">
            <header>
                @include('__header')
            </header>

            <main id="main-content">
                @hasSection('breadcrumbs')
                    @yield('breadcrumbs')
                @endif

                @yield('content')
            </main>

            <footer>
                @include('__footer')
            </footer>
        </div>

        @include('__libsjs')
        @include('__menu_mobile')
        @yield('scripts')

    </body>

</html>

