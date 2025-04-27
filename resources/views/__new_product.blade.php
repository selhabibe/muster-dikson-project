<section class="featured-collection mt-8 pt-6 mt-lg-10 pt-lg-10 pb-10">
    <div class="container">
        <h3 class="text-center font-weight-bold lh-1 ls-m mt-4 mb-5">Quoi de neuf</h3>

        <div class="products-group split-line row box-shadow-2 bg-white gutter-no mb-6">
            @foreach($products as $product)
                @if ($product->is_visible)
                    <div class="col-lg-3 col-md-4 col-6">
                    <div class="product-wrap">
                        <div class="product text-center">
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
                            <div class="product-details">
                                <h3 class="product-name">
                                    <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                </h3>
                                <div class="product-price">
                                    MAD {{ number_format($product->price, 2) }}
                                </div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:{{ $product->rating * 20 }}%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="{{ route('products.show', $product->id) }}" class="rating-reviews">({{ $product->reviews_count }} reviews)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach

        </div>

    </div>
</section>
