@extends('.__base')

@section('head')
    <!-- Add Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Add custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/product-page-custom.css') }}">
@endsection

@section('content')
    <div class="page-wrapper">
        <main class="main pt-6 with-border single-product">
            <div class="page-content mb-10 pb-6">
                <div class="container">
                    <!-- Product Section -->
                    <div class="product product-single row">
                        <!-- Product Gallery Column -->
                        <div class="col-md-6">
                            <div class="product-gallery product-gallery-sticky mb-lg-9 mb-4">
                                <!-- Main Product Carousel -->
                                <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
                                    @foreach($product->getMedia('product-images') as $media)
                                        @if ($media->getUrl())
                                            <figure class="product-image">
                                                <img src="{{ $media->getUrl() }}"
                                                     data-zoom-image="{{ $media->getUrl() }}"
                                                     alt="{{ $product->name }}"
                                                     class="product-image-main">
                                            </figure>
                                        @endif
                                    @endforeach
                                </div>

                                <!-- Product Thumbnails -->
                                <div class="product-thumbs-wrap">
                                    <div class="product-thumbs">
                                        @foreach($product->getMedia('product-images') as $media)
                                            @if ($media->getUrl())
                                                <div class="product-thumb {{ $loop->first ? 'active' : '' }}">
                                                    <img src="{{ $media->getUrl() }}"
                                                         alt="{{ $product->name }}">
                                                </div>
                                            @else
                                                <div class="product-thumb">
                                                    <img src="https://i.makeup.fr/i/i4/i4dfmpe8rxkj.png"
                                                         alt="Product Image">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <button class="thumb-up disabled"><i class="fas fa-chevron-left"></i></button>
                                    <button class="thumb-down disabled"><i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Product Details Column -->
                        <div class="col-md-6">
                            <div class="product-details">
                                <!-- Breadcrumb Navigation -->
                                <div class="product-navigation">
                                    <ul class="breadcrumb breadcrumb-lg">
                                        <li><a href="{{route("index")}}"><i class="d-icon-home"></i></a></li>
                                        <li>{{ $product->name }}</li>
                                    </ul>
                                </div>

                                <!-- Product Title -->
                                <h1 class="product-name">{{ $product->name }}</h1>

                                <!-- Product Ratings -->
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:80%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <span class="link-to-tab rating-reviews">( 6 avis )</span>
                                </div>

                                <!-- Product Meta Information -->
                                <div class="product-meta">
                                    @if(isset($product->brand->name))
                                        <div class="product-meta-item">
                                            <span class="product-meta-label">Code:</span>
                                            <span class="product-sku">{{ $product->code }}</span>
                                        </div>
                                    @endif
                                    @if(isset($product->brand->name))
                                        <div class="product-meta-item">
                                            <span class="product-meta-label">MARQUE:</span>
                                            <span class="product-brand">{{ $product->brand->name }}</span>
                                        </div>
                                    @endif
                                    <div class="product-meta-item">
                                        <span class="product-meta-label">CATÉGORIE:</span>
                                        <span class="product-brand">Soins Capillaires</span>
                                    </div>
                                </div>

                                <!-- Product Price -->
                                <div class="product-price">
                                    <span class="old-price">{{ number_format($product->price * 1.2, 2) }} MAD</span>
                                    {{ $product->price }} MAD
                                    <span class="discount-badge">-20%</span>
                                </div>

                                <!-- Product Urgency -->
                                <div class="product-urgency">
                                    <i class="fas fa-fire urgency-icon"></i>
                                    <span class="urgency-text">Populaire! Plus de 10 personnes ont acheté ce produit récemment</span>
                                </div>

                                <!-- Product Short Description -->
                                <div class="product-short-desc">
                                    @if (!is_null($product->short_desc))
                                        {!! \Illuminate\Support\Str::markdown($product->description ?? '') !!}
                                    @else
                                        <p>Un produit professionnel de haute qualité pour des résultats exceptionnels. Formulé avec des ingrédients premium pour des soins capillaires optimaux.</p>
                                    @endif
                                </div>

                                <!-- Product Benefits -->
                                <div class="product-benefits">
                                    <h4 class="benefits-title">Bénéfices Principaux</h4>
                                    <ul class="benefits-list">
                                        <li class="benefit-item">
                                            <i class="fas fa-check-circle benefit-icon"></i>
                                            <span class="benefit-text">Formule enrichie en actifs naturels</span>
                                        </li>
                                        <li class="benefit-item">
                                            <i class="fas fa-check-circle benefit-icon"></i>
                                            <span class="benefit-text">Résultats visibles dès la première utilisation</span>
                                        </li>
                                        <li class="benefit-item">
                                            <i class="fas fa-check-circle benefit-icon"></i>
                                            <span class="benefit-text">Sans parabènes ni sulfates</span>
                                        </li>
                                        <li class="benefit-item">
                                            <i class="fas fa-check-circle benefit-icon"></i>
                                            <span class="benefit-text">Testé dermatologiquement</span>
                                        </li>
                                    </ul>
                                </div>

                                <hr class="product-divider">

                                <!-- Product Form - Quantity and Add to Cart -->
                                <div class="product-form product-qty">
                                    <label>QUANTITÉ:</label>
                                    <div class="product-form-group">
                                        <div class="input-group">
                                            <button class="quantity-minus d-icon-minus"></button>
                                            <input class="quantity form-control" type="number" min="1" value="1" max="1000000" id="product-quantity">
                                            <button class="quantity-plus d-icon-plus"></button>
                                        </div>

                                        <!-- Add to Cart Button -->
                                        <button class="btn-product btn-cart" id="add-to-cart-btn" data-product-id="{{ $product->id }}">
                                            <i class="d-icon-bag"></i>Ajouter au panier
                                        </button>

                                        <!-- Wishlist Button -->
                                        <button class="btn-wishlist">
                                            <i class="d-icon-heart"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Display messages -->
                                <div id="message" style="display: none;"></div>

                                <!-- Trust Badges -->
                                <div class="trust-badges">
                                    <div class="trust-badge">
                                        <i class="fas fa-truck trust-badge-icon"></i>
                                        <div class="trust-badge-text">Livraison Rapide</div>
                                    </div>
                                    <div class="trust-badge">
                                        <i class="fas fa-shield-alt trust-badge-icon"></i>
                                        <div class="trust-badge-text">Paiement Sécurisé</div>
                                    </div>
                                    <div class="trust-badge">
                                        <i class="fas fa-exchange-alt trust-badge-icon"></i>
                                        <div class="trust-badge-text">Retours Faciles</div>
                                    </div>
                                    <div class="trust-badge">
                                        <i class="fas fa-award trust-badge-icon"></i>
                                        <div class="trust-badge-text">Qualité Garantie</div>
                                    </div>
                                </div>

                                <hr class="product-divider mb-3">

                                <!-- Product Ingredients -->
                                <div class="product-ingredients">
                                    <h4 class="ingredients-title">Ingrédients Clés</h4>
                                    <div class="ingredients-list">
                                        <span class="ingredient-tag">Kératine</span>
                                        <span class="ingredient-tag">Huile d'Argan</span>
                                        <span class="ingredient-tag">Panthénol</span>
                                        <span class="ingredient-tag">Vitamine E</span>
                                        <span class="ingredient-tag">Protéines de Soie</span>
                                    </div>
                                </div>

                                <!-- Product Footer - Social Links -->
                                <div class="product-footer">
                                    <div class="social-links mr-4">
                                        <a href="{{route('index')}}" class="social-link social-facebook fab fa-facebook-f"></a>
                                        <a href="{{route('index')}}" class="social-link social-pinterest fab fa-pinterest-p"></a>
                                        <a href="{{route('index')}}" class="social-link social-instagram fab fa-instagram"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Tabs - Description -->
                    <div class="tab tab-nav-simple product-tabs">
                        <ul class="nav nav-tabs justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#product-tab-description">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#product-tab-usage">Mode d'Emploi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#product-tab-reviews">Avis (6)</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active in" id="product-tab-description">
                                <div class="row mt-6">
                                    <div class="col-md-12 mb-8">
                                        @if(!is_null($product->description))
                                            <div class="product-description">
                                                {!! \Illuminate\Support\Str::markdown($product->description) !!}
                                            </div>
                                        @else
                                            <div class="product-description">
                                                <h3>Description du Produit</h3>
                                                <p>Notre produit professionnel de haute qualité est spécialement conçu pour offrir des résultats exceptionnels. Formulé avec des ingrédients premium soigneusement sélectionnés, ce produit répond aux exigences des professionnels de la coiffure.</p>

                                                <h4>Caractéristiques</h4>
                                                <ul>
                                                    <li>Formule enrichie en actifs naturels pour des résultats optimaux</li>
                                                    <li>Texture légère qui ne surcharge pas les cheveux</li>
                                                    <li>Parfum délicat et agréable</li>
                                                    <li>Convient à tous les types de cheveux</li>
                                                    <li>Résultats visibles dès la première utilisation</li>
                                                </ul>

                                                <h4>Résultats</h4>
                                                <p>Après utilisation, vos cheveux seront visiblement plus sains, plus brillants et plus faciles à coiffer. La formule avancée pénètre profondément dans la fibre capillaire pour nourrir et renforcer chaque mèche de l'intérieur.</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="product-tab-usage">
                                <div class="row mt-6">
                                    <div class="col-md-12 mb-8">
                                        <div class="product-description">
                                            <h3>Mode d'Emploi</h3>
                                            <p>Pour des résultats optimaux, suivez ces étapes simples :</p>

                                            <ol>
                                                <li>Appliquez une petite quantité de produit sur les cheveux humides ou secs, selon le type de produit.</li>
                                                <li>Répartissez uniformément sur les longueurs et les pointes.</li>
                                                <li>Massez délicatement pour faire pénétrer le produit.</li>
                                                <li>Ne pas rincer (sauf indication contraire sur l'emballage).</li>
                                                <li>Procédez au coiffage comme d'habitude.</li>
                                            </ol>

                                            <p><strong>Conseil de pro :</strong> Pour une efficacité maximale, utilisez ce produit en combinaison avec les autres produits de notre gamme professionnelle.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="product-tab-reviews">
                                <div class="row mt-6">
                                    <div class="col-md-12 mb-8">
                                        <div class="product-reviews">
                                            <h3>Avis Clients</h3>

                                            <div class="review-item">
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width:100%"></span>
                                                    </div>
                                                </div>
                                                <h4 class="review-title">Excellent produit!</h4>
                                                <div class="review-content">
                                                    <p>J'utilise ce produit depuis plusieurs semaines et les résultats sont impressionnants. Mes cheveux sont plus brillants et plus faciles à coiffer.</p>
                                                </div>
                                                <div class="review-meta">
                                                    <span class="review-author">Marie L.</span>
                                                    <span class="review-date">12/05/2023</span>
                                                </div>
                                            </div>

                                            <div class="review-item">
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width:80%"></span>
                                                    </div>
                                                </div>
                                                <h4 class="review-title">Très satisfaite</h4>
                                                <div class="review-content">
                                                    <p>Produit de qualité professionnelle, je recommande vivement!</p>
                                                </div>
                                                <div class="review-meta">
                                                    <span class="review-author">Sophie D.</span>
                                                    <span class="review-date">28/04/2023</span>
                                                </div>
                                            </div>

                                            <!-- Write a Review Button -->
                                            <a href="#" class="write-review-btn">
                                                <i class="fas fa-pencil-alt"></i> Écrire un avis
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Sticky Add to Cart for Mobile -->
    <div class="sticky-add-to-cart hidden">
        <div class="sticky-add-to-cart-content">
            <div class="sticky-product-info">
                @if($product->getFirstMedia('product-images'))
                    <img src="{{ $product->getFirstMedia('product-images')->getUrl() }}" alt="{{ $product->name }}" class="sticky-product-image">
                @endif
                <div class="sticky-product-details">
                    <div class="sticky-product-name">{{ $product->name }}</div>
                    <div class="sticky-product-price">{{ $product->price }} MAD</div>
                </div>
            </div>
            <button class="sticky-add-to-cart-btn" data-product-id="{{ $product->id }}">
                <i class="d-icon-bag"></i> Acheter
            </button>
        </div>
    </div>

    <!-- Include the necessary script at the bottom of the template -->
    @section('scripts')
    <!-- Load custom product page JavaScript -->
    <script src="{{ asset('js/product-page-custom.js') }}"></script>
    @endsection
@endsection('content')
