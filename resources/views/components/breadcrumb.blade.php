@props([
    'items' => [],
    'class' => 'breadcrumb-nav',
    'theme' => 'light' // light or dark
])

@if(count($items) > 0)
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
@endif

<style>
.breadcrumb-nav {
    margin-bottom: 2rem;
    padding: 1rem 0;
}

.breadcrumb {
    display: flex;
    flex-wrap: wrap;
    padding: 1rem 1.5rem;
    margin-bottom: 0;
    list-style: none;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 8px;
    font-size: 1rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    border: 1px solid #dee2e6;
}

.breadcrumb-item {
    display: flex;
    align-items: center;
    font-weight: 500;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: "›";
    padding: 0 0.75rem;
    color: #6c757d;
    font-size: 1.2rem;
    font-weight: 400;
}

.breadcrumb-item a {
    color: #20c7d9;
    text-decoration: none;
    transition: all 0.3s ease;
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    font-weight: 500;
}

.breadcrumb-item a:hover {
    color: #1ba3b3;
    background-color: rgba(32, 199, 217, 0.1);
    text-decoration: none;
    transform: translateY(-1px);
}

.breadcrumb-item.active {
    color: #495057;
}

.breadcrumb-item.active span {
    font-weight: 600;
    color: #343a40;
    padding: 0.25rem 0.5rem;
    background-color: rgba(52, 58, 64, 0.1);
    border-radius: 4px;
}

/* Icon support */
.breadcrumb-item i {
    margin-right: 0.5rem;
    font-size: 0.9rem;
}

/* Enhanced visual hierarchy */
.breadcrumb-item:first-child a {
    padding-left: 0;
}

.breadcrumb-item:last-child {
    font-weight: 600;
}

/* Mobile responsive */
@media (max-width: 768px) {
    .breadcrumb-nav {
        margin-bottom: 1.5rem;
        padding: 0.5rem 0;
    }

    .breadcrumb {
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
    }

    .breadcrumb-item + .breadcrumb-item::before {
        padding: 0 0.5rem;
        font-size: 1rem;
    }

    .breadcrumb-item a,
    .breadcrumb-item.active span {
        padding: 0.2rem 0.4rem;
    }
}

@media (max-width: 480px) {
    .breadcrumb {
        padding: 0.5rem 0.75rem;
        font-size: 0.85rem;
    }

    .breadcrumb-item + .breadcrumb-item::before {
        padding: 0 0.3rem;
    }
}

/* Dark theme styles */
.breadcrumb-dark .breadcrumb {
    background: rgba(0, 0, 0, 0.3);
    border: 1px solid rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    color: #f8f9fa;
}

.breadcrumb-dark .breadcrumb-item a {
    color: #20c7d9;
}

.breadcrumb-dark .breadcrumb-item a:hover {
    color: #ffffff;
    background-color: rgba(32, 199, 217, 0.2);
}

.breadcrumb-dark .breadcrumb-item.active span {
    color: #f8f9fa;
    background-color: rgba(255, 255, 255, 0.1);
}

.breadcrumb-dark .breadcrumb-item + .breadcrumb-item::before {
    color: rgba(255, 255, 255, 0.6);
}

/* Auto dark mode support */
@media (prefers-color-scheme: dark) {
    .breadcrumb-light .breadcrumb {
        background: linear-gradient(135deg, #343a40 0%, #495057 100%);
        border-color: #495057;
        color: #f8f9fa;
    }

    .breadcrumb-light .breadcrumb-item a {
        color: #20c7d9;
    }

    .breadcrumb-light .breadcrumb-item a:hover {
        background-color: rgba(32, 199, 217, 0.2);
    }

    .breadcrumb-light .breadcrumb-item.active span {
        color: #f8f9fa;
        background-color: rgba(248, 249, 250, 0.1);
    }
}
</style>
