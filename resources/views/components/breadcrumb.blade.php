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
