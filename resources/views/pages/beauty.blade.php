@extends('.__base')

@section('content')

    <div class="page-wrapper">

        <main class="main">
            <div class="page-header"
                 style="background-image: url('images/demos/demo-beauty/page-header.jpg'); background-color: #ECEDF1;">
                <h1 class="page-title font-weight-bold text-dark">Beauté</h1>
                <ul class="breadcrumb pb-0">
                    <li class="text-dark"><a href="{{route('index')}}" class="text-dark"><i class="d-icon-home"></i></a>
                    </li>
                    <li class="delimiter text-dark">/</li>
                    <li class="text-dark">Beauté</li>
                </ul>
            </div>
            <!-- End PageHeader -->
            <div class="page-content mb-10 pb-3 mt-5">
                <div class="container">
                    <section class="default-section">
{{--                        <h2 class="title title-center">Catégories</h2>--}}
                        <section class="default-section">
                            <h2 class="title title-center"></h2>
                            <div class="tab tab-boxed tab-nav-boxed tab-simple tab-inverse">
                                <ul class="nav nav-tabs justify-content-center" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#tab9-1">Catégories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tab9-2">Téléchargements</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tab9-3">Video</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab9-1">
                                        <div class="code-template">
                                            <div class="row">
                                                <div class="col-sm-6 col-lg-4 mb-4">
                                                    <div class="category category-default category-rounded category-absolute overlay-zoom code-content">
                                                        <a href="{{route('hairstyle')}}">
                                                            <figure class="category-media">
                                                                <img src="{{asset("images/front/hair.png")}}" alt="Produits cosmétiques" width="280" height="280">
                                                            </figure>
                                                        </a>
                                                        <div class="category-content">
                                                            <h4 class="category-name"><a href="">Coiffure</a></h4>
                                                            <a href="{{route('hairstyle')}}" class="btn btn-primary">Voir plus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-lg-4 mb-4">
                                                    <div class="category category-default category-rounded category-absolute overlay-zoom code-content">
                                                        <a href="#">
                                                            <figure class="category-media">
                                                                <img src="{{asset("images/front/cosmitic.png")}}" alt="Produits cosmétiques" width="280" height="280">
                                                            </figure>
                                                        </a>
                                                        <div class="category-content">
                                                            <h4 class="category-name"><a href="">Produits cosmétiques</a></h4>
                                                            <a href="#" class="btn btn-primary">Voir plus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-lg-4 mb-4">
                                                    <div class="category category-default category-rounded category-absolute overlay-zoom">
                                                        <a href="#">
                                                            <figure class="category-media">
                                                                <img src="{{asset("images/front/nail.png")}}" alt="category" width="280" height="280">
                                                            </figure>
                                                        </a>
                                                        <div class="category-content">
                                                            <h4 class="category-name"><a href="">Clous</a></h4>
                                                            <a href="#" class="btn btn-primary">Voir plus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab9-2">
                                        <div class="products-group split-line row mb-8 mb-lg-8 box-shadow-2 bg-white pt-8 g-4">
                                            <div class="col-lg-4 col-md-4 col-12 mb-4">
                                                <div class="product-wrap">
                                                    <div class="product text-center">
                                                        <figure class="product-media">
                                                            <a href="{{ asset('pdf/3.pdf') }}">
                                                                <img src="https://muster-dikson.com/images/attachment/88.jpg" alt="produit" width="300" height="338">
                                                            </a>
                                                            <div class="product-action">
                                                                <a href="{{ asset('pdf/3.pdf') }}" class="btn-product btn-download" title="Télécharger">Télécharger</a>
                                                            </div>
                                                        </figure>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-12 mb-4">
                                                <div class="product-wrap">
                                                    <div class="product text-center">
                                                        <figure class="product-media">
                                                            <a href="{{ asset('pdf/2.pdf') }}">
                                                                <img src="https://muster-dikson.com/images/attachment/78.jpg" alt="produit" width="300" height="338">
                                                            </a>
                                                            <div class="product-action">
                                                                <a href="{{ asset('pdf/2.pdf') }}" class="btn-product btn-download" title="Télécharger">Télécharger</a>
                                                            </div>
                                                        </figure>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-12 mb-4">
                                                <div class="product-wrap">
                                                    <div class="product text-center">
                                                        <figure class="product-media">
                                                            <a href="{{ asset('pdf/1.pdf') }}">
                                                                <img src="https://muster-dikson.com/images/attachment/11.jpg" alt="produit" width="300" height="338">
                                                            </a>
                                                            <div class="product-action">
                                                                <a href="{{ asset('pdf/1.pdf') }}" class="btn-product btn-download" title="Télécharger">Télécharger</a>
                                                            </div>
                                                        </figure>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="tab-pane" id="tab9-3">
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 video-wrap">
                                                <div class="video">
                                                    <figure class="video-media">
                                                        <a href="https://www.youtube.com/watch?v=h6rP2yP4VWo" target="_blank">
                                                            <img src="https://img.youtube.com/vi/h6rP2yP4VWo/hqdefault.jpg" alt="vidéo" width="360" height="400" style="border-radius: 10px;">
                                                        </a>
                                                        <div class="video-action-vertical">
                                                            <a href="https://www.youtube.com/watch?v=h6rP2yP4VWo" class="btn-video-icon btn-watch" title="Regarder la vidéo">
                                                                <i class="d-icon-play"></i>
                                                            </a>
                                                        </div>
                                                    </figure>
                                                    <div class="video-details">
                                                        <h6 class="video-name">
                                                            <a href="https://www.youtube.com/watch?v=h6rP2yP4VWo">Apprendre les bases du coiffage</a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 video-wrap">
                                                <div class="video">
                                                    <figure class="video-media">
                                                        <a href="https://www.youtube.com/watch?v=h6rP2yP4VWo" target="_blank">
                                                            <img src="https://img.youtube.com/vi/h6rP2yP4VWo/hqdefault.jpg" alt="vidéo" width="360" height="400" style="border-radius: 10px;">
                                                        </a>
                                                        <div class="video-action-vertical">
                                                            <a href="https://www.youtube.com/watch?v=h6rP2yP4VWo" class="btn-video-icon btn-watch" title="Regarder la vidéo">
                                                                <i class="d-icon-play"></i>
                                                            </a>
                                                        </div>
                                                    </figure>
                                                    <div class="video-details">
                                                        <h6 class="video-name">
                                                            <a href="https://www.youtube.com/watch?v=h6rP2yP4VWo">Apprendre les bases du coiffage</a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 video-wrap">
                                                <div class="video">
                                                    <figure class="video-media">
                                                        <a href="https://www.youtube.com/watch?v=h6rP2yP4VWo" target="_blank">
                                                            <img src="https://img.youtube.com/vi/h6rP2yP4VWo/hqdefault.jpg" alt="vidéo" width="360" height="400" style="border-radius: 10px;">
                                                        </a>
                                                        <div class="video-action-vertical">
                                                            <a href="https://www.youtube.com/watch?v=h6rP2yP4VWo" class="btn-video-icon btn-watch" title="Regarder la vidéo">
                                                                <i class="d-icon-play"></i>
                                                            </a>
                                                        </div>
                                                    </figure>
                                                    <div class="video-details">
                                                        <h6 class="video-name">
                                                            <a href="https://www.youtube.com/watch?v=h6rP2yP4VWo">Apprendre les bases du coiffage</a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 video-wrap">
                                                <div class="video">
                                                    <figure class="video-media">
                                                        <a href="https://www.youtube.com/watch?v=h6rP2yP4VWo" target="_blank">
                                                            <img src="https://img.youtube.com/vi/h6rP2yP4VWo/hqdefault.jpg" alt="vidéo" width="360" height="400" style="border-radius: 10px;">
                                                        </a>
                                                        <div class="video-action-vertical">
                                                            <a href="https://www.youtube.com/watch?v=h6rP2yP4VWo" class="btn-video-icon btn-watch" title="Regarder la vidéo">
                                                                <i class="d-icon-play"></i>
                                                            </a>
                                                        </div>
                                                    </figure>
                                                    <div class="video-details">
                                                        <h6 class="video-name">
                                                            <a href="https://www.youtube.com/watch?v=h6rP2yP4VWo">Apprendre les bases du coiffage</a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 video-wrap">
                                                <div class="video">
                                                    <figure class="video-media">
                                                        <a href="https://www.youtube.com/watch?v=h6rP2yP4VWo" target="_blank">
                                                            <img src="https://img.youtube.com/vi/h6rP2yP4VWo/hqdefault.jpg" alt="vidéo" width="360" height="400" style="border-radius: 10px;">
                                                        </a>
                                                        <div class="video-action-vertical">
                                                            <a href="https://www.youtube.com/watch?v=h6rP2yP4VWo" class="btn-video-icon btn-watch" title="Regarder la vidéo">
                                                                <i class="d-icon-play"></i>
                                                            </a>
                                                        </div>
                                                    </figure>
                                                    <div class="video-details">
                                                        <h6 class="video-name">
                                                            <a href="https://www.youtube.com/watch?v=h6rP2yP4VWo">Apprendre les bases du coiffage</a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>
                    </section>



                    @include('__new_product')

                </div>
            </div>
        </main>

        <!-- End Footer -->
    </div>
@endsection('content')
