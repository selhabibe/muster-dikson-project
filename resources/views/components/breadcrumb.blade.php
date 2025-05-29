@props([
    'items' => [],
    'class' => 'breadcrumb-nav'
])

@if(count($items) > 0)
<nav aria-label="Fil d'Ariane" class="{{ $class }}">
    <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
        @foreach($items as $index => $item)
            <li class="breadcrumb-item{{ $loop->last ? ' active' : '' }}" 
                itemprop="itemListElement" 
                itemscope 
                itemtype="https://schema.org/ListItem">
                
                @if($loop->last)
                    <span itemprop="name" aria-current="page">{{ $item['name'] }}</span>
                @else
                    <a href="{{ $item['url'] }}" itemprop="item">
                        <span itemprop="name">{{ $item['name'] }}</span>
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
    margin-bottom: 1.5rem;
}

.breadcrumb {
    display: flex;
    flex-wrap: wrap;
    padding: 0.75rem 1rem;
    margin-bottom: 1rem;
    list-style: none;
    background-color: #f8f9fa;
    border-radius: 0.375rem;
    font-size: 0.875rem;
}

.breadcrumb-item {
    display: flex;
    align-items: center;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: "/";
    padding: 0 0.5rem;
    color: #6c757d;
}

.breadcrumb-item a {
    color: #0d6efd;
    text-decoration: none;
    transition: color 0.15s ease-in-out;
}

.breadcrumb-item a:hover {
    color: #0a58ca;
    text-decoration: underline;
}

.breadcrumb-item.active {
    color: #6c757d;
}

.breadcrumb-item.active span {
    font-weight: 500;
}

/* Mobile responsive */
@media (max-width: 768px) {
    .breadcrumb {
        padding: 0.5rem 0.75rem;
        font-size: 0.8rem;
    }
    
    .breadcrumb-item + .breadcrumb-item::before {
        padding: 0 0.25rem;
    }
}
</style>
