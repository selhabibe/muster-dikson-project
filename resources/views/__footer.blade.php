<footer class="footer">
    <div class="container">
        <div class="footer-middle">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="widget widget-about pl-0">
                        <div class="footer-logos">
                            <a href="" class="logo-footer">
                                <img src="{{asset("images/logo/M_D_Logo_white_font.png")}}" alt="logo-footer" width="180" height="70" />
                            </a>
                        </div>
                        <div class="widget-body">
                            <p>Une entreprise dynamique depuis plus de 50 ans au service permanent du coiffeur et de l'esthéticienne,
                                qui étudie, produit et agit pour offrir un service toujours meilleur et une gamme de produits de
                                qualité supérieure.
                            </p>
                        </div>
                    </div>
                    <!-- End Widget -->
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="widget">
                                <h4 class="widget-title">À Propos de Nous</h4>
                                <ul class="widget-body">
                                    <li>
                                        <a href="{{route('about_us')}}">À Propos de Nous</a>
                                    </li>
                                    <li>
                                        <a href="{{route('contact')}}">Contactez Nous</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Widget -->
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="widget">
                                <h4 class="widget-title">Liens Rapides</h4>
                                <ul class="widget-body">
                                    <li>
                                        <a href="{{route('ourbrands')}}">Nos marques</a>
                                    </li>
                                    <li>
                                        <a href="{{route('blog')}}">Blog</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Widget -->
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="widget">
                                <h4 class="widget-title">Contact</h4>
                                <ul class="widget-body">
                                    <li>
                                        <p><i class="d-icon-map"></i> N 15 rue Ennakhil cité dakhla Agadir</p>
                                    </li>
                                    <li>
                                        <p><i class="d-icon-headphone"></i> +212 671265232</p>
                                    </li>
                                    <li>
                                        <p><i class="d-icon-envelope"></i> contact@muster-dikson.ma</p>
                                    </li>
                                    <li>
                                        <p><i class="d-icon-envelope"></i> sales@muster-dikson.ma</p>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Widget -->
                        </div>

                        <div class="col-md-3 col-sm-12">
                            <div class="widget distributor-widget">
                                <h4 class="widget-title">Distribué par</h4>
                                <div class="distributor-logo">
                                    <img src="{{asset("images/logo/logo-ML2.png")}}" alt="logo-MLPharma" width="150" height="60" />
                                </div>
                                <div class="widget-body mt-2">
                                    <p>Entreprise marocaine spécialisée dans la distribution de produits cosmétiques professionnels de haute qualité pour les salons de coiffure et les centres d'esthétique.</p>
                                </div>
                            </div>
                            <!-- End Widget -->
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Middle -->
    <div class="container">
        <div class="footer-bottom">
            <div class="footer-center">
                <p class="copyright">Muster & Dikson &copy; 2025 | <a href="#"> Conditions Générales</a> </p>
            </div>
            <div class="footer-right">
                <div class="social-links">
                    <a href="#" title="social-list" class="social-link social-facebook fab fa-facebook-f"></a>
                    <a href="https://www.linkedin.com/company/muster-e-dikson-spa" title="social-list" class="social-link social-linkedin fab fa-linkedin-in"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
</footer>

<style>


    /* Footer Styles */
    .footer-middle {
        padding: 4rem 0;
    }

    .footer-middle .row {
        margin-left: -20px;
        margin-right: -20px;
    }

    .footer-middle .row > [class*="col-"] {
        padding-left: 20px;
        padding-right: 20px;
    }

    .footer .widget {
        margin-bottom: 2rem;
    }

    .footer .widget-title {
        margin-bottom: 1.5rem;
        font-size: 1.2rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .footer .widget-body {
        font-size: 1.3rem;
    }

    .footer .widget-body li {
        margin-bottom: 1rem;
    }

    .footer .widget-body p {
        font-size: 1.3rem;
        line-height: 1.6;
        color: #999;
        margin-bottom: 1rem;
    }

    .footer .widget-body i {
        margin-right: 0.8rem;
        width: 1.6rem;
        text-align: center;
    }

    /* MLPharma Distributor Styles */
    .distributor-widget {
        display: flex;
        flex-direction: column;
    }

    .distributor-logo {
        margin-bottom: 1rem;
    }

    .distributor-logo img {
        max-width: 100%;
        height: auto;
    }

    /* Footer Bottom Styles */
    .footer-bottom {
        padding: 2rem 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .footer-bottom .copyright {
        margin-bottom: 0;
    }

    .social-links .social-link {
        margin-left: 1rem;
    }

    /* Responsive Styles */
    @media (max-width: 991px) {
        .footer-middle {
            padding: 3rem 0;
        }

        .footer-middle .row > [class*="col-"] {
            margin-bottom: 2.5rem;
        }
    }

    @media (max-width: 767px) {
        .footer-middle {
            padding: 2.5rem 0;
        }

        .footer-middle .row {
            margin-left: -10px;
            margin-right: -10px;
        }

        .footer-middle .row > [class*="col-"] {
            padding-left: 10px;
            padding-right: 10px;
            margin-bottom: 2rem;
        }

        .footer .widget {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .footer .widget-title {
            margin-bottom: 1.2rem;
        }

        .distributor-logo {
            text-align: center;
            margin: 0 auto 1rem;
        }

        .distributor-logo img {
            max-width: 160px;
        }

        .footer-bottom {
            padding: 1.5rem 0;
            flex-direction: column;
            text-align: center;
        }

        .footer-right {
            margin-top: 1rem;
        }

        .social-links .social-link {
            margin: 0 0.5rem;
        }
    }
</style>
