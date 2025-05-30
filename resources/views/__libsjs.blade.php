    <!-- Critical JS (loaded synchronously) -->
    <script src="{{asset('vendor/template/jquery/jquery.min.js')}}"></script>

    <!-- Essential plugins (loaded synchronously for functionality) -->
    <script src="{{asset('vendor/template/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('vendor/template/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

    <!-- Main JS File (loaded synchronously) -->
    <script src="{{asset('js/main.js')}}"></script>

    <!-- Combined JS File (loads asynchronously for enhancements) -->
    <script src="{{asset('js/combined.min.js')}}" async></script>

    <!-- Non-critical plugins (loaded asynchronously) -->
    <script>
        // Load non-critical scripts after DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            const scripts = [
                "{{asset('vendor/template/parallax/parallax.min.js')}}",
                "{{asset('vendor/template/isotope/isotope.pkgd.min.js')}}",
                "{{asset('vendor/template/imagesloaded/imagesloaded.pkgd.min.js')}}"
            ];

            scripts.forEach((src, index) => {
                setTimeout(() => {
                    const script = document.createElement('script');
                    script.src = src;
                    script.defer = true;
                    document.head.appendChild(script);
                }, index * 200);
            });
        });
    </script>

    <!-- Cart Drawer JS -->
    <script src="{{asset('js/cart-drawer.js')}}"></script>
