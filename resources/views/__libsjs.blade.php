    <!-- Plugins JS File -->
    <script src="{{asset('vendor/template/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/template/parallax/parallax.min.js')}}"></script>
    <script src="{{asset('vendor/template/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{asset('vendor/template/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
{{--    <script src="{{asset('vendor/template/elevatezoom/jquery.elevatezoom.min.js')}}"></script>--}}
    <script src="{{asset('vendor/template/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('vendor/template/owl-carousel/owl.carousel.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{asset('js/main.js')}}"></script>

    <!-- Custom Script for Minipopup -->
    <script>
        $(document).ready(function() {
            // Check if minipopup-area exists, if not create it
            if ($('.minipopup-area').length === 0) {
                console.log('Creating minipopup-area');
                var area = document.createElement('div');
                area.className = "minipopup-area";
                $('.page-wrapper').append(area);

                // Initialize Riode.Minipopup if it exists
                if (typeof Riode !== 'undefined' && Riode.Minipopup) {
                    console.log('Initializing Riode.Minipopup');
                    Riode.Minipopup.init();
                } else {
                    console.warn('Riode.Minipopup is not defined');
                }
            }
        });
    </script>
