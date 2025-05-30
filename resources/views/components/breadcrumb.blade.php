@props([
    'items' => [],
    'class' => 'breadcrumb-nav',
    'theme' => 'light' // light or dark
])

@if(count($items) > 0)
<div class="container">
    <nav aria-label="Fil d'Ariane" class="{{ $class }} breadcrumb-{{ $theme }}">
        <ol class="breadcrumb breadcrumb-{{ $theme }}" itemscope itemtype="https://schema.org/BreadcrumbList">
        @foreach($items as $index => $item)
            <li class="breadcrumb-item{{ $loop->last ? ' active' : '' }}" 
                itemprop="itemListElement" 
                itemscope 
                itemtype="https://schema.org/ListItem">
                
                @if($loop->last)
                    <span itemprop="name" aria-current="page">
                        @if($loop->first && $item['name'] === 'Accueil')
                            <i class="fas fa-home" aria-hidden="true"></i>
                        @endif
                        {{ $item['name'] }}
                    </span>
                @else
                    <a href="{{ $item['url'] }}" itemprop="item">
                        <span itemprop="name">
                            @if($loop->first && $item['name'] === 'Accueil')
                                <i class="fas fa-home" aria-hidden="true"></i>
                            @endif
                            {{ $item['name'] }}
                        </span>
                    </a>
                @endif
                
                <meta itemprop="position" content="{{ $index + 1 }}">
            </li>
        @endforeach
        </ol>
    </nav>
</div>
@endif

<style>
.breadcrumb-nav {
    margin-bottom: 0;
    padding: 1.5rem 0;
}

.breadcrumb-nav .container {
    padding-left: 15px;
    padding-right: 15px;
}

.breadcrumb {
    display: flex;
    flex-wrap: wrap;
    padding: 0;
    margin-bottom: 0;
    list-style: none;
    background: transparent;
    border: none;
    font-size: 1.5rem;
    box-shadow: none;
}

.breadcrumb-item {
    display: flex;
    align-items: center;
    font-weight: 400;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: "›";
    padding: 0 0.5rem;
    color: #999;
    font-size: 1rem;
    font-weight: 300;
}

.breadcrumb-item a {
    color: #666;
    text-decoration: none;
    transition: color 0.2s ease;
    padding: 0;
    border-radius: 0;
    font-weight: 400;
}

.breadcrumb-item a:hover {
    color: #333;
    background-color: transparent;
    text-decoration: none;
    transform: none;
}

.breadcrumb-item.active {
    color: #333;
}

.breadcrumb-item.active span {
    font-weight: 400;
    color: #333;
    padding: 0;
    background-color: transparent;
    border-radius: 0;
}

/* Icon support */
.breadcrumb-item i {
    margin-right: 0.4rem;
    font-size: 0.9rem;
    opacity: 0.8;
}

/* Mobile responsive */
@media (max-width: 768px) {
    .breadcrumb {
        font-size: 0.95rem;
    }

    .breadcrumb-item + .breadcrumb-item::before {
        padding: 0 0.4rem;
        font-size: 0.95rem;
    }
}

@media (max-width: 480px) {
    .breadcrumb {
        font-size: 0.9rem;
    }

    .breadcrumb-item + .breadcrumb-item::before {
        padding: 0 0.35rem;
        font-size: 0.9rem;
    }
}

/* Dark theme styles */
.breadcrumb-dark .breadcrumb {
    background: transparent;
    border: none;
    color: rgba(255, 255, 255, 0.8);
}

.breadcrumb-dark .breadcrumb-item a {
    color: rgba(255, 255, 255, 0.7);
}

.breadcrumb-dark .breadcrumb-item a:hover {
    color: rgba(255, 255, 255, 1);
    background-color: transparent;
}

.breadcrumb-dark .breadcrumb-item.active span {
    color: rgba(255, 255, 255, 1);
    background-color: transparent;
}

.breadcrumb-dark .breadcrumb-item + .breadcrumb-item::before {
    color: rgba(255, 255, 255, 0.5);
}

.breadcrumb-dark .breadcrumb-item i {
    opacity: 0.6;
}


</style>
