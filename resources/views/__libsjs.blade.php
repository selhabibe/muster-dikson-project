    <!-- Critical JS (loaded synchronously) -->
    <script src="{{asset('vendor/template/jquery/jquery.min.js')}}"></script>

    <!-- Combined JS File (loads asynchronously) -->
    <script src="{{asset('js/combined.min.js')}}" async></script>

    <!-- Main JS File (loads after combined) -->
    <script>
        // Load main.js after combined.js
        window.addEventListener('load', function() {
            const script = document.createElement('script');
            script.src = "{{asset('js/main.js')}}";
            script.async = true;
            document.head.appendChild(script);
        });
    </script>

    <!-- Non-critical plugins (loaded asynchronously) -->
    <script>
        // Load non-critical scripts after page load
        window.addEventListener('load', function() {
            const scripts = [
                "{{asset('vendor/template/parallax/parallax.min.js')}}",
                "{{asset('vendor/template/isotope/isotope.pkgd.min.js')}}",
                "{{asset('vendor/template/imagesloaded/imagesloaded.pkgd.min.js')}}",
                "{{asset('vendor/template/magnific-popup/jquery.magnific-popup.min.js')}}",
                "{{asset('vendor/template/owl-carousel/owl.carousel.min.js')}}"
            ];

            scripts.forEach((src, index) => {
                setTimeout(() => {
                    const script = document.createElement('script');
                    script.src = src;
                    script.async = true;
                    document.head.appendChild(script);
                }, index * 100);
            });
        });
    </script>

    <!-- Cart Drawer JS -->
    <script src="{{asset('js/cart-drawer.js')}}"></script>
