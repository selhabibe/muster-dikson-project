@extends('.__base')

@section('content')
    <div class="page-wrapper">
        <main class="main">
            <div class="page-header"
                 style="background-image: url('{{asset('images/demos/demo-beauty/page-header.jpg')}}'); background-color: #ECEDF1;">
                <h1 class="page-title font-weight-bold text-dark">Muster Benexere Professionelle</h1>
                <ul class="breadcrumb pb-0">
                    <li class="text-dark"><a href="{{route('index')}}" class="text-dark"><i class="d-icon-home"></i></a>
                    </li>
                    <li class="delimiter text-dark">/</li>
                    <li class="text-dark"><a href="{{route('ourbrands')}}" class="text-dark">Nos marques</a></li>
                    <li class="delimiter text-dark">/</li>
                    <li class="text-dark">Muster Benexere Professionelle</li>
                </ul>
            </div>
            <!-- End PageHeader -->

            <div class="page-content mb-10 pb-3 mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 mb-4">
                            <div class="brand-image-container">
                                <img src="https://cdn.prod.website-files.com/67cecb7a3a28462cd4502f56/67daef64234e4e8cf7e1de81_08_HP_BOX_BRAND_BXE.webp" alt="Muster Benexere Professionelle" class="img-fluid rounded shadow-sm">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="brand-description">
                                <h2 class="title">Muster Benexere Professionelle</h2>
                                <p class="lead">Des produits de beauté et de bien-être professionnels pour les salons et spas.</p>

                                <p>Muster Benexere Professionelle est une marque italienne spécialisée dans les produits de beauté et de bien-être pour les professionnels. La marque propose une gamme complète de produits pour le visage, le corps et les soins spa, conçus pour offrir des expériences sensorielles uniques et des résultats visibles.</p>

                                <p>Avec une philosophie centrée sur le bien-être global, Benexere combine des ingrédients naturels de haute qualité avec des formulations avancées pour créer des produits qui nourrissent, protègent et embellissent la peau. Chaque produit est développé pour répondre aux besoins spécifiques des professionnels de la beauté et de leurs clients.</p>

                                <div class="brand-features mt-4">
                                    <h4>Points forts de la marque:</h4>
                                    <ul class="list list-type-check">
                                        <li>Formulations enrichies en ingrédients naturels</li>
                                        <li>Produits testés dermatologiquement</li>
                                        <li>Solutions professionnelles pour tous les types de peau</li>
                                        <li>Gamme complète pour les soins du visage et du corps</li>
                                        <li>Expériences sensorielles uniques pour les clients</li>
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
                                <h4>Soins du visage</h4>
                                <p>Des nettoyants, toniques, sérums et crèmes adaptés à tous les types de peau. Des formules enrichies en actifs naturels pour hydrater, apaiser, purifier et revitaliser la peau du visage.</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="product-category-card">
                                <h4>Soins du corps</h4>
                                <p>Des exfoliants, enveloppements, huiles de massage et crèmes corporelles pour une peau douce et nourrie. Des produits spécifiques pour le traitement de la cellulite et le raffermissement de la peau.</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="product-category-card">
                                <h4>Soins spa</h4>
                                <p>Des produits pour créer une véritable expérience spa dans votre salon. Des huiles essentielles, des bougies parfumées et des produits de relaxation pour une expérience sensorielle complète.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-6">
                        <div class="col-12">
                            <h3 class="title title-border mb-4">L'expérience Benexere</h3>
                            <p>Muster Benexere Professionelle ne se contente pas de proposer des produits de qualité, mais offre une véritable expérience de bien-être. Chaque produit est conçu pour stimuler les sens et créer un moment de détente et de plaisir pour les clients des salons et spas.</p>
                            <p>La marque s'engage également à respecter l'environnement en utilisant des ingrédients naturels et des emballages recyclables. Cette approche éco-responsable s'inscrit dans une vision globale du bien-être qui inclut le respect de la nature et de ses ressources.</p>

                            <div class="text-center mt-5">
                                <a href="{{route('shop.muster')}}" class="btn btn-primary btn-rounded mr-2">Découvrir nos produits Benexere</a>
                                <a href="{{asset('documents/brands/benexere-catalog.pdf')}}" class="btn btn-outline btn-rounded" target="_blank">
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
