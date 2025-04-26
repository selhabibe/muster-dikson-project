@extends('.__base')

@section('content')
    <div class="page-wrapper">
        <main class="main">
            <div class="page-header"
                 style="background-image: url('{{asset('images/demos/demo-beauty/page-header.jpg')}}'); background-color: #ECEDF1;">
                <h1 class="page-title font-weight-bold text-dark">Blog</h1>
                <ul class="breadcrumb pb-0">
                    <li class="text-dark"><a href="{{route('index')}}" class="text-dark"><i class="d-icon-home"></i></a>
                    </li>
                    <li class="delimiter text-dark">/</li>
                    <li class="text-dark">Blog</li>
                </ul>
            </div>
            
            <div class="page-content mb-10 pb-3 mt-5">
                <div class="container">
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="blog-card">
                                    <div class="blog-image">
                                        <a href="{{ route('posts.show', $post->id) }}">
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                                        </a>
                                        <div class="blog-date">
                                            <span class="day">{{ $post->created_at->format('d') }}</span>
                                            <span class="month">{{ $post->created_at->format('M') }}</span>
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <h3 class="blog-title">
                                            <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                                        </h3>
                                        <p class="blog-excerpt">{{ Str::limit($post->body, 150) }}</p>
                                        <a href="{{ route('posts.show', $post->id) }}" class="blog-link">En savoir plus <i class="d-icon-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="pagination-wrapper">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <style>
        /* Blog Card Styles */
        .blog-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            height: 100%;
            transition: all 0.3s ease;
        }
        
        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .blog-image {
            position: relative;
            overflow: hidden;
        }
        
        .blog-image img {
            width: 100%;
            height: 240px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .blog-card:hover .blog-image img {
            transform: scale(1.05);
        }
        
        .blog-date {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: #1A2A3A;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-align: center;
            line-height: 1.2;
        }
        
        .blog-date .day {
            display: block;
            font-size: 1.5rem;
            font-weight: 700;
        }
        
        .blog-date .month {
            display: block;
            font-size: 0.9rem;
            text-transform: uppercase;
        }
        
        .blog-content {
            padding: 1.5rem;
        }
        
        .blog-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1rem;
            line-height: 1.4;
        }
        
        .blog-title a {
            color: #1A2A3A;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .blog-title a:hover {
            color: #4A8B9F;
        }
        
        .blog-excerpt {
            font-size: 1rem;
            line-height: 1.6;
            color: #666;
            margin-bottom: 1.5rem;
        }
        
        .blog-link {
            color: #1A2A3A;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: color 0.3s ease;
        }
        
        .blog-link i {
            margin-left: 0.5rem;
            transition: transform 0.3s ease;
        }
        
        .blog-link:hover {
            color: #4A8B9F;
        }
        
        .blog-link:hover i {
            transform: translateX(5px);
        }
        
        /* Pagination Styles */
        .pagination-wrapper {
            margin-top: 3rem;
            display: flex;
            justify-content: center;
        }
    </style>
@endsection('content')
