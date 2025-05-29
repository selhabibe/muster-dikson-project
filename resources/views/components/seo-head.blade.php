@props([
    'title' => 'Muster & Dikson - Produits Professionnels de Coiffure et Beauté',
    'description' => 'Découvrez les produits professionnels Muster & Dikson pour coiffeurs et esthéticiennes. Qualité et innovation depuis 1965.',
    'keywords' => 'Muster, Dikson, coiffure professionnelle, produits capillaires, beauté, Maroc',
    'canonical' => null,
    'image' => null,
    'type' => 'website',
    'structuredData' => null,
    'breadcrumbs' => null,
    'noindex' => false
])

@php
    $canonical = $canonical ?? url()->current();
    $image = $image ?? asset('images/front/social-share-default.jpg');
    $siteName = 'Muster & Dikson';
@endphp

<!-- Primary Meta Tags -->
<title>{{ $title }}</title>
<meta name="title" content="{{ $title }}">
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="{{ $keywords }}">
<meta name="author" content="Muster & Dikson">

<!-- Canonical URL -->
<link rel="canonical" href="{{ $canonical }}">

<!-- Robots Meta -->
@if($noindex)
    <meta name="robots" content="noindex, nofollow">
@else
    <meta name="robots" content="index, follow">
@endif

<!-- Open Graph / Facebook -->
<meta property="og:type" content="{{ $type }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $image }}">
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:locale" content="fr_FR">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ $canonical }}">
<meta property="twitter:title" content="{{ $title }}">
<meta property="twitter:description" content="{{ $description }}">
<meta property="twitter:image" content="{{ $image }}">

<!-- Additional Meta Tags -->
<meta name="theme-color" content="#1a365d">
<meta name="msapplication-TileColor" content="#1a365d">

<!-- Favicon -->
<link rel="icon" href="{{ asset('images/front/favicon-32x32.png') }}" type="image/x-icon">
<link rel="apple-touch-icon" href="{{ asset('images/front/favicon-32x32.png') }}">

<!-- Structured Data -->
@if($structuredData)
    <script type="application/ld+json">
        {!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
@endif

<!-- Breadcrumb Structured Data -->
@if($breadcrumbs)
    @php
        $breadcrumbItems = [];
        foreach ($breadcrumbs as $index => $breadcrumb) {
            $breadcrumbItems[] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $breadcrumb['name'],
                'item' => $breadcrumb['url']
            ];
        }
        
        $breadcrumbStructuredData = [
            '@context' => 'https://schema.org/',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $breadcrumbItems
        ];
    @endphp
    
    <script type="application/ld+json">
        {!! json_encode($breadcrumbStructuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
@endif

<!-- Organization Structured Data (Global) -->
<script type="application/ld+json">
{
    "@context": "https://schema.org/",
    "@type": "Organization",
    "name": "Muster & Dikson",
    "description": "Distributeur de produits professionnels de coiffure et beauté au Maroc depuis 1965",
    "url": "{{ url('/') }}",
    "logo": "{{ asset('images/logo/M_D_Logo_white_font.png') }}",
    "contactPoint": {
        "@type": "ContactPoint",
        "contactType": "customer service",
        "availableLanguage": "French"
    },
    "address": {
        "@type": "PostalAddress",
        "addressCountry": "MA",
        "addressLocality": "Casablanca"
    },
    "sameAs": []
}
</script>

<!-- Preconnect to external domains for performance -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://cdn.jsdelivr.net">

<!-- DNS Prefetch for better performance -->
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link rel="dns-prefetch" href="//cdn.jsdelivr.net">
