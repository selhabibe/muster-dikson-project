@extends('.__base')

@section('content')

    <div class="page-wrapper">

        <main class="main">
            <div class="page-header"
                 style="background-image: url('images/demos/demo-beauty/page-header.jpg'); background-color: #ECEDF1;">
                <h1 class="page-title font-weight-bold text-dark">{{$category->name}}</h1>
                <ul class="breadcrumb pb-0">
                    <li class="text-dark"><a href="{{route('index')}}" class="text-dark"><i class="d-icon-home"></i></a>
                    </li>
{{--                    <li class="delimiter text-dark">/</li>--}}
{{--                    <li class="text-dark">Categorie</li>--}}
                </ul>
            </div>
            <!-- End PageHeader -->
            <div class="page-content mb-10 pb-3">
                <div class="container">
                    <nav class="toolbox toolbox-horizontal sticky-toolbox sticky-content fix-top">
                        <aside class="sidebar sidebar-fixed shop-sidebar">
                            <div class="sidebar-overlay"></div>
                            <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
                        </aside>
                    </nav>
                    <div class="row cols-2 cols-sm-3 cols-md-4 product-wrapper" style="display: flex; flex-wrap: wrap;">
                        @foreach($products as $product)
                            @if ($product->is_visible)
                                <div class="product-wrap" style="flex: 1 1 calc(25% - 1rem); margin: 0.5rem; display: flex; flex-direction: column;">
                                <div class="product text-center" style="flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between;">
                                    <figure class="product-media" style="position: relative; padding-bottom: 100%; overflow: hidden;">
                                        <a href="{{ route('products.show', $product->id) }}">
                                            @if ($product->getFirstMediaUrl('product-images'))
                                                <img src="{{ $product->getFirstMediaUrl('product-images') }}" alt="{{ $product->name }}"
                                                     style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain;">
                                                <img src="{{ $product->getFirstMediaUrl('product-images') }}" alt="{{ $product->name }}"
                                                     style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain;">
                                            @endif
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="{{ route('cart.show') }}" class="btn-product-icon btn-cart" title="Select Options">
                                                <i class="d-icon-bag"></i>
                                            </a>
                                        </div>
                                    </figure>
                                    <div class="product-details" style="padding: 10px; text-align: center;">
                                        <h3 class="product-name">
                                            <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                        </h3>
                                        <div class="product-price">
                                            <ins class="new-price">{{ number_format($product->price, 2) }} MAD</ins>
                                            <del class="old-price">{{ number_format($product->old_price, 2) }} MAD</del>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width:90%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="{{ route('products.show', $product->id) }}" class="rating-reviews">{!! $product->reviews_count !!} </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>


                    <nav class="toolbox toolbox-pagination mb-1">
{{--                        <p class="toolbox-item show-info d-block mb-2 mb-sm-0">Showing 1–12 of 24 Products</p>--}}
{{--                        <ul class="pagination">--}}
{{--                            <li class="page-item disabled">--}}
{{--                                <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"--}}
{{--                                   aria-disabled="true">--}}
{{--                                    <i class="d-icon-arrow-left"></i>Prev--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                            <li class="page-item">--}}
{{--                                <a class="page-link page-link-next" href="#" aria-label="Next">--}}
{{--                                    Next<i class="d-icon-arrow-right"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                    </nav>
                </div>
            </div>

        </main>

        <!-- End of Main -->
    </div>
@endsection('content')
