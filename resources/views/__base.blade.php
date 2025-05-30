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

        <!-- Critical CSS (inline for performance) -->
        <style>
            /* Critical above-the-fold styles */
            .page-wrapper{min-height:100vh;display:flex;flex-direction:column}
            main{flex:1}
            .container{max-width:1200px;margin:0 auto;padding:0 15px}
            .btn{display:inline-block;padding:12px 24px;border:none;border-radius:4px;text-decoration:none;text-align:center;cursor:pointer;transition:all 0.3s ease;font-weight:500}
            .btn-primary{background-color:#20c7d9;color:white}
            .btn-primary:hover{background-color:#1ba3b3}
            h1,h2,h3,h4,h5,h6{font-family:'Poppins',sans-serif;font-weight:600;line-height:1.4;color:#222;margin:0 0 1rem}
            .loading{opacity:0.6;pointer-events:none}
        </style>

        <!-- Combined CSS File (loads asynchronously) -->
        <link rel="preload" href="{{ asset('css/combined.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="{{ asset('css/combined.min.css') }}"></noscript>

        <!-- Essential CSS Files (loaded synchronously) -->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/template/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/demo34.min.css')}}">

        <!-- Non-critical CSS (loaded asynchronously) -->
        <link rel="preload" href="{{ asset('vendor/template/animate/animate.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <link rel="preload" href="{{ asset('vendor/template/magnific-popup/magnific-popup.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <link rel="preload" href="{{ asset('vendor/template/owl-carousel/owl.carousel.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <link rel="preload" href="{{ asset('vendor/template/sticky-icon/stickyicon.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">

        <!-- Fallback for browsers without JavaScript -->
        <noscript>
            <link rel="stylesheet" type="text/css" href="{{ asset('vendor/template/animate/animate.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('vendor/template/magnific-popup/magnific-popup.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('vendor/template/owl-carousel/owl.carousel.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('vendor/template/sticky-icon/stickyicon.css')}}">
        </noscript>


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

