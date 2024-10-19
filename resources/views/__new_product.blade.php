<section class="featured-collection mt-8 pt-6 mt-lg-10 pt-lg-10 pb-10">
    <div class="container">
        <h3 class="text-center font-weight-bold lh-1 ls-m mt-4 mb-5">Quoi de neuf</h3>

        <div class="products-group split-line row box-shadow-2 bg-white gutter-no mb-6">
            @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="{{ route('products.show', $product->id) }}">

                                    <img src="{{ asset('storage/'.$product->image_1) }}"
                                         alt="{{ $product->name }}"
                                         width="300"
                                         height="338"
                                         style="object-fit: cover; width: 100%; height: 100%;">
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-name">
                                    <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                                </h3>
                                <div class="product-price">
                                    MAD {{ number_format($product->price, 2) }}
                                </div>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:{{ $product->rating * 20 }}%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="{{ route('products.show', $product->slug) }}" class="rating-reviews">({{ $product->reviews_count }} reviews)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>
