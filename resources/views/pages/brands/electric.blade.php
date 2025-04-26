@extends('.__base')

@section('content')
    <div class="page-wrapper">
        <main class="main">
            <div class="page-header"
                 style="background-image: url('{{asset('images/demos/demo-beauty/page-header.jpg')}}'); background-color: #ECEDF1;">
                <h1 class="page-title font-weight-bold text-dark">Muster Electric 4 Hair</h1>
                <ul class="breadcrumb pb-0">
                    <li class="text-dark"><a href="{{route('index')}}" class="text-dark"><i class="d-icon-home"></i></a>
                    </li>
                    <li class="delimiter text-dark">/</li>
                    <li class="text-dark"><a href="{{route('ourbrands')}}" class="text-dark">Nos marques</a></li>
                    <li class="delimiter text-dark">/</li>
                    <li class="text-dark">Muster Electric 4 Hair</li>
                </ul>
            </div>
            <!-- End PageHeader -->

            <div class="page-content mb-10 pb-3 mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 mb-4">
                            <div class="brand-image-container">
                                <img src="https://cdn.prod.website-files.com/67cecb7a3a28462cd4502f56/67dacfefa2d68ceca7b6e6b1_06_HP_BOX_BRAND_E4H.webp" alt="Muster Electric 4 Hair" class="img-fluid rounded shadow-sm">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="brand-description">
                                <h2 class="title">Muster Electric 4 Hair</h2>
                                <p class="lead">Des appareils électriques professionnels innovants pour les salons de coiffure modernes.</p>

                                <p>Muster Electric 4 Hair est une marque spécialisée dans la conception et la fabrication d'appareils électriques professionnels pour les salons de coiffure. Avec une attention particulière portée à l'innovation technologique et au design ergonomique, Muster Electric 4 Hair propose des outils qui allient performance, fiabilité et facilité d'utilisation.</p>

                                <p>La gamme comprend des sèche-cheveux professionnels, des fers à lisser, des fers à friser, des tondeuses et d'autres appareils essentiels pour les coiffeurs. Chaque produit est conçu pour répondre aux exigences des professionnels qui recherchent des outils de haute qualité pour offrir les meilleurs services à leurs clients.</p>

                                <div class="brand-features mt-4">
                                    <h4>Points forts de la marque:</h4>
                                    <ul class="list list-type-check">
                                        <li>Technologie avancée pour des résultats professionnels</li>
                                        <li>Design ergonomique pour un confort d'utilisation optimal</li>
                                        <li>Matériaux de haute qualité pour une durabilité accrue</li>
                                        <li>Efficacité énergétique pour réduire la consommation d'électricité</li>
                                        <li>Large gamme d'appareils pour tous les besoins des salons</li>
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
                                <h4>Sèche-cheveux</h4>
                                <p>Des sèche-cheveux professionnels puissants et légers, dotés de technologies avancées comme les moteurs AC et les générateurs d'ions négatifs pour un séchage rapide et une brillance maximale.</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="product-category-card">
                                <h4>Fers à lisser et à friser</h4>
                                <p>Des fers à lisser avec plaques en céramique, titane ou tourmaline pour un lissage parfait sans abîmer les cheveux. Des fers à friser de différents diamètres pour créer tous types de boucles.</p>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="product-category-card">
                                <h4>Tondeuses et accessoires</h4>
                                <p>Des tondeuses professionnelles précises et puissantes pour les coupes homme et les finitions. Une gamme complète d'accessoires pour faciliter le travail des coiffeurs au quotidien.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-6">
                        <div class="col-12">
                            <h3 class="title title-border mb-4">Innovation et technologie</h3>
                            <p>Muster Electric 4 Hair investit constamment dans la recherche et le développement pour proposer des appareils à la pointe de la technologie. La marque intègre les dernières innovations dans ses produits pour offrir des performances optimales tout en préservant la santé des cheveux.</p>
                            <p>Les appareils Muster Electric 4 Hair sont conçus pour être ergonomiques, légers et faciles à manipuler, réduisant ainsi la fatigue des professionnels qui les utilisent quotidiennement. De plus, ils sont équipés de fonctionnalités avancées comme le contrôle précis de la température, les revêtements protecteurs et les systèmes de sécurité automatiques.</p>
                        </div>
                    </div>

                    <div class="row mt-6">
                        <div class="col-12">
                            <h3 class="title title-border mb-4">Produit phare: iMaster Vaporisateur avec Ozone et Ionisation</h3>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="product-image-container">
                                <img src="https://cosmital.gr/wp-content/uploads/2024/05/imaster1.jpg" alt="iMaster Vaporisateur" class="img-fluid rounded shadow-lg">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-description">
                                <h4 class="mb-3">iMaster Vaporisateur avec Ozone et Ionisation</h4>
                                <p class="lead">Le nouveau vaporisateur moderne iMaster avec ozone et ionisation représente une technologie innovante qui améliore considérablement les services dans les salons de coiffure.</p>

                                <div class="product-features mt-4">
                                    <h5>Caractéristiques principales:</h5>
                                    <ul class="list list-type-check">
                                        <li>24 programmes de fonctionnement préréglés</li>
                                        <li>Idéal pour les traitements profonds du cuir chevelu</li>
                                        <li>Parfait pour les travaux techniques</li>
                                        <li>Action antibactérienne et anti-inflammatoire</li>
                                        <li>Élimine l'électricité statique</li>
                                        <li>Fonctionne simplement avec de l'eau potable</li>
                                    </ul>
                                </div>

                                <div class="product-benefits mt-4">
                                    <h5>Avantages pour les cheveux:</h5>
                                    <p>L'iMaster combine vapeur, ozone et ionisation pour ouvrir les écailles du cheveu en profondeur, permettant une meilleure pénétration des traitements. La présence d'ions négatifs est cruciale car ils tonifient la structure du cheveu tout en nettoyant en profondeur le cuir chevelu.</p>
                                    <p>Le système fonctionne en deux phases: d'abord avec vapeur + ozone + ionisation, puis avec ozone + ionisation pour refermer les écailles et stabiliser les traitements.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="product-gallery">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <img src="https://cosmital.gr/wp-content/uploads/2024/05/imaster2.jpg" alt="iMaster Vaporisateur Vue 2" class="img-fluid rounded shadow-sm">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <img src="https://cosmital.gr/wp-content/uploads/2024/05/imaster3.jpg" alt="iMaster Vaporisateur Vue 3" class="img-fluid rounded shadow-sm">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <img src="https://cosmital.gr/wp-content/uploads/2024/05/imaster4.jpg" alt="iMaster Vaporisateur Vue 4" class="img-fluid rounded shadow-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-6">
                        <div class="col-12 text-center">
                            <a href="{{route('shop.muster')}}" class="btn btn-primary btn-rounded mr-2">Découvrir nos appareils Muster Electric</a>
                            <a href="{{asset('documents/brands/electric-catalog.pdf')}}" class="btn btn-outline btn-rounded" target="_blank">
                                <i class="d-icon-file-pdf"></i> Télécharger le catalogue
                            </a>
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

        /* Product Showcase Styles */
        .product-image-container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
        }

        .product-image-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        .product-description h4 {
            color: #333;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .product-features h5,
        .product-benefits h5 {
            color: #444;
            font-weight: 600;
            margin-bottom: 15px;
            border-left: 3px solid #26b170;
            padding-left: 10px;
        }

        .product-gallery img {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .product-gallery img:hover {
            transform: scale(1.03);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
@endsection('content')
