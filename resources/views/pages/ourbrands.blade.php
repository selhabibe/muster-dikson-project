@extends('.__base')

@section('content')
    <div class="page-wrapper">
        <main class="main">
            <div class="page-header"
                 style="background-image: url('images/demos/demo-beauty/page-header.jpg'); background-color: #ECEDF1;">
                <h1 class="page-title font-weight-bold text-dark">Nos marques</h1>
                <ul class="breadcrumb pb-0">
                    <li class="text-dark"><a href="{{route('index')}}" class="text-dark"><i class="d-icon-home"></i></a>
                    </li>
                    <li class="delimiter text-dark">/</li>
                    <li class="text-dark">Nos marques</li>
                </ul>
            </div>
            <!-- End PageHeader -->

            <div class="page-content mb-10 pb-3 mt-5">
                <div class="container">
                    <h2 class="title title-center mb-5">Marque Professionnelles</h2>

                    <div class="row justify-content-center">
                        <!-- Dikson Professionelle Brand -->
                        <div class="col-md-4 mb-5">
                            <div class="brand-card">
                                <img src="https://cdn.prod.website-files.com/67cecb7a3a28462cd4502f56/67dacee215113144868eaad2_01_HP_BOX_BRAND_DKPRO.webp" alt="Dikson Professionelle" class="brand-image">
                                <div class="brand-overlay">
                                    <!-- Logo will be added later -->
                                    <!-- <img src="{{asset('images/brands/dikson-logo.png')}}" alt="Dikson Professionelle" class="brand-logo"> -->
                                    <!-- <h3 class="brand-title">Dikson Professionelle</h3> -->
                                </div>
                                <div class="brand-content">
                                    <a href="{{route('brand.dikson')}}" class="btn-discover">Découvrir</a>
                                </div>
                            </div>
                        </div>

                        <!-- Muster Electric 4 Hair Brand -->
                        <div class="col-md-4 mb-5">
                            <div class="brand-card">
                                <img src="https://cdn.prod.website-files.com/67cecb7a3a28462cd4502f56/67dacfefa2d68ceca7b6e6b1_06_HP_BOX_BRAND_E4H.webp" alt="Muster Electric 4 Hair" class="brand-image">
                                <div class="brand-overlay">
                                    <!-- Logo will be added later -->
                                    <!-- <img src="{{asset('images/brands/muster-electric-logo.png')}}" alt="Muster Electric 4 Hair" class="brand-logo"> -->
                                    <!-- <h3 class="brand-title">Muster Electric 4 Hair</h3> -->
                                </div>
                                <div class="brand-content">
                                    <a href="{{route('brand.electric')}}" class="btn-discover">Découvrir</a>
                                </div>
                            </div>
                        </div>

                        <!-- Muster Benexere Professionelle Brand -->
                        <div class="col-md-4 mb-5">
                            <div class="brand-card">
                                <img src="https://cdn.prod.website-files.com/67cecb7a3a28462cd4502f56/67daef64234e4e8cf7e1de81_08_HP_BOX_BRAND_BXE.webp" alt="Muster Benexere Professionelle" class="brand-image">
                                <div class="brand-overlay">
                                    <!-- Logo will be added later -->
                                    <!-- <img src="{{asset('images/brands/muster-benexere-logo.png')}}" alt="Muster Benexere Professionelle" class="brand-logo"> -->
                                    <!-- <h3 class="brand-title">Muster Benexere Professionelle</h3> -->
                                </div>
                                <div class="brand-content">
                                    <a href="{{route('brand.benexere')}}" class="btn-discover">Découvrir</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <style>
                        
                        .brand-card {
                            position: relative;
                            height: 450px;
                            width: 100%;
                            border-radius: 16px;
                            overflow: hidden;
                            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                            transition: all 0.5s cubic-bezier(0.33, 1, 0.68, 1);
                        }

                        .brand-card:hover {
                            transform: translateY(-10px);
                            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
                        }

                        .brand-image {
                            width: 100%;
                            height: 100%;
                            object-fit: cover;
                            transition: transform 0.7s ease;
                        }

                        .brand-card:hover .brand-image {
                            transform: scale(1.05);
                        }

                        .brand-overlay {
                            position: absolute;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background: rgba(0,0,0,0.3);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            transition: all 0.5s ease;
                        }

                        .brand-card:hover .brand-overlay {
                            background: rgba(0,0,0,0.1);
                        }

                        .brand-logo {
                            max-width: 70%;
                            max-height: 70%;
                            filter: drop-shadow(0 0 10px rgba(0,0,0,0.3));
                            transition: all 0.5s ease;
                            z-index: 2;
                        }

                        .brand-card:hover .brand-logo {
                            transform: scale(1.1);
                            filter: drop-shadow(0 10px 20px rgba(0,0,0,0.5));
                        }

                        .brand-title {
                            color: white;
                            font-size: 24px;
                            font-weight: 700;
                            text-align: center;
                            margin: 0;
                            padding: 0 20px;
                            text-shadow: 0 2px 10px rgba(0,0,0,0.5);
                            transition: all 0.5s ease;
                        }

                        .brand-card:hover .brand-title {
                            transform: scale(1.1);
                        }

                        .brand-content {
                            position: absolute;
                            bottom: -100px;
                            left: 0;
                            width: 100%;
                            padding: 25px;
                            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0) 100%);
                            color: white;
                            text-align: center;
                            transition: all 0.5s ease;
                            opacity: 0;
                        }

                        .brand-card:hover .brand-content {
                            bottom: 0;
                            opacity: 1;
                        }

                        .btn-discover {
                            display: inline-block;
                            padding: 10px 25px;
                            background-color: white;
                            color: #333;
                            border-radius: 30px;
                            font-weight: 600;
                            text-decoration: none;
                            transition: all 0.3s ease;
                            transform: translateY(20px);
                            opacity: 0;
                            transition: all 0.5s ease 0.2s;
                        }

                        .brand-card:hover .btn-discover {
                            transform: translateY(0);
                            opacity: 1;
                        }

                        .btn-discover:hover {
                            background-color: #f8f9fa;
                            transform: translateY(-3px) !important;
                            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
                        }

                        /* Animation for smooth transitions */
                        @keyframes fadeIn {
                            from { opacity: 0; transform: translateY(20px); }
                            to { opacity: 1; transform: translateY(0); }
                        }

                        .brand-card {
                            animation: fadeIn 0.8s ease forwards;
                        }

                        .col-md-4:nth-child(1) .brand-card { animation-delay: 0.1s; }
                        .col-md-4:nth-child(2) .brand-card { animation-delay: 0.3s; }
                        .col-md-4:nth-child(3) .brand-card { animation-delay: 0.5s; }
                    </style>

                    {{-- @include('__new_product') --}}
                </div>
            </div>
        </main>
        <!-- End Footer -->
    </div>
@endsection('content')
