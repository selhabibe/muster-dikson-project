@extends('.__base')

@section('content')

    <div class="page-wrapper">

        <main class="main">
            <div class="page-header"
                 style="background-image: url('images/demos/demo-beauty/page-header.jpg'); background-color: #ECEDF1;">
                <h1 class="page-title font-weight-bold text-dark">Coiffure</h1>
                <ul class="breadcrumb pb-0">
                    <li class="text-dark"><a href="{{route('index')}}" class="text-dark"><i class="d-icon-home"></i></a>
                    </li>
                    <li class="delimiter text-dark">/</li>
                </ul>
            </div>
            <!-- End PageHeader -->
            <div class="page-content mb-10 pb-3 mt-5">
                <div class="container">
                    <section class="default-section">
{{--                        <h2 class="title title-center">Catégories</h2>--}}
                        <div class="code-template">
                            <div class="row g-4">
                                @foreach($categories as $category)
                                    <div class="col-12 col-sm-6 col-lg-4 mb-4">
                                        <div class="category category-default category-rounded category-absolute overlay-zoom code-content">
                                            <a href="{{ route('categories.show', $category->id) }}">
                                                <figure class="category-media">
                                                    <!-- Assuming each category has an image associated with it -->
                                                    <img src="{{ $category->image_url }}" alt="{{ $category->name }}" width="280" height="280">
                                                </figure>
                                            </a>
                                            <div class="category-content">
                                                <h4 class="category-name"><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></h4>
                                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary">Voir plus</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </section>

                    @include('__new_product')
                </div>
            </div>

        </main>

        <!-- End Footer -->
    </div>
@endsection('content')
