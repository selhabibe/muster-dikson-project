@extends('.__base')

@section('content')
    <div class="page-wrapper">
        <main class="main">
            <div class="page-header"
                 style="background-image: url('{{asset('images/demos/demo-beauty/page-header.jpg')}}'); background-color: #ECEDF1;">
                <h1 class="page-title font-weight-bold text-dark">Dikson Professionelle</h1>
                <ul class="breadcrumb pb-0">
                    <li class="text-dark"><a href="{{route('index')}}" class="text-dark"><i class="d-icon-home"></i></a>
                    </li>
                    <li class="delimiter text-dark">/</li>
                    <li class="text-dark"><a href="{{route('ourbrands')}}" class="text-dark">Nos marques</a></li>
                    <li class="delimiter text-dark">/</li>
                    <li class="text-dark">Dikson Professionelle</li>
                </ul>
            </div>
            <!-- End PageHeader -->

            <div class="page-content mb-10 pb-3 mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 mb-4">
                            <div class="brand-image-container">
                                <img src="https://cdn.prod.website-files.com/67cecb7a3a28462cd4502f56/67dacee215113144868eaad2_01_HP_BOX_BRAND_DKPRO.webp" alt="Dikson Professionelle" class="img-fluid rounded shadow-sm">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="brand-description">
                                <h2 class="title">Dikson Professionelle</h2>
                                <p class="lead">Une marque italienne de produits professionnels pour les cheveux, reconnue pour sa qualité et son innovation.</p>

                                <p>Dikson Professionelle est une marque italienne de produits capillaires professionnels qui combine tradition et innovation. Depuis sa création, Dikson s'est engagé à développer des produits de haute qualité pour les professionnels de la coiffure.</p>

                                <p>La marque propose une gamme complète de produits pour tous les types de cheveux et pour répondre à tous les besoins des salons de coiffure modernes. Des colorations permanentes aux soins réparateurs, en passant par les produits de coiffage et de finition, Dikson offre des solutions professionnelles pour chaque étape du service en salon.</p>

                                <div class="brand-features mt-4">
                                    <h4>Points forts de la marque:</h4>
                                    <ul class="list list-type-check">
                                        <li>Produits formulés avec des ingrédients de haute qualité</li>
                                        <li>Gamme complète pour tous les types de cheveux</li>
                                        <li>Solutions professionnelles pour les coloristes</li>
                                        <li>Produits de coiffage innovants</li>
                                        <li>Engagement envers la recherche et le développement</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-6">
                        <div class="col-12">
                            <h3 class="title title-border mb-4">Gammes de produits</h3>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="product-category-card">
                                <h4>Coloration</h4>
                                <p>Des colorations permanentes et semi-permanentes pour des résultats professionnels. Formules riches en pigments pour une couverture parfaite des cheveux blancs et une tenue longue durée.</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="product-category-card">
                                <h4>Soins</h4>
                                <p>Shampoings, après-shampoings et masques adaptés à tous les types de cheveux. Des formules enrichies en actifs naturels pour nourrir, réparer et protéger la fibre capillaire.</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="product-category-card">
                                <h4>Coiffage</h4>
                                <p>Gels, mousses, laques et cires pour créer tous les styles. Des produits professionnels qui offrent maintien, volume et brillance sans alourdir les cheveux.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-6">
                        <div class="col-12">
                            <h3 class="title title-border mb-4">Pourquoi choisir Dikson Professionelle?</h3>
                            <p>Dikson Professionelle est le choix idéal pour les professionnels qui recherchent des produits de haute qualité, efficaces et faciles à utiliser. La marque s'engage à fournir des solutions innovantes qui répondent aux besoins des coiffeurs modernes et de leurs clients.</p>
                            <p>Avec plus de 50 ans d'expérience dans l'industrie de la coiffure, Dikson continue d'évoluer et d'innover pour offrir les meilleurs produits et services à ses clients professionnels.</p>

                            <div class="text-center mt-5">
                                <a href="{{route('shop.dikson')}}" class="btn btn-primary btn-rounded mr-2">Découvrir nos produits Dikson</a>
                                <a href="{{asset('documents/brands/dikson-catalog.pdf')}}" class="btn btn-outline btn-rounded" target="_blank">
                                    <i class="d-icon-file-pdf"></i> Télécharger le catalogue
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- End Footer -->
    </div>

    <style>
        .brand-image-container {
            border-radius: 10px;
            overflow: hidden;
        }

        .product-category-card {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 25px;
            height: 100%;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }

        .product-category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .product-category-card h4 {
            margin-bottom: 15px;
            color: #333;
            font-weight: 600;
        }

        .list-type-check li {
            position: relative;
            padding-left: 30px;
            margin-bottom: 10px;
        }

        .list-type-check li:before {
            content: '\f00c';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            left: 0;
            top: 2px;
            color: #26b170;
        }
    </style>
@endsection('content')
