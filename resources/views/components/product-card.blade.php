@props(['product', 'eager' => false])

@php
    $categoryName = \App\Models\Product::categoryName($product['category'] ?? '');
    $ratingVal = isset($product['rating']) ? number_format((float) $product['rating'], 1) : '4.9';
    $priceFormatted = '$' . number_format((float) $product['price'], 2);
    $origPriceFormatted = !empty($product['originalPrice']) ? ('$' . number_format((float) $product['originalPrice'], 2)) : null;
    $catI18nMap = [
        'skin-care' => 'skinCare',
        'makeup' => 'makeup',
        'hair' => 'hairCare',
        'fragrances' => 'fragrances',
        'nail-care' => 'nailCare',
        'body' => 'bodyCare',
        'sets' => 'sets',
    ];
    $rawImages = !empty($product['images']) ? $product['images'] : array_values(array_filter([$product['image'] ?? null, $product['hoverImage'] ?? null]));
    $images = array_map(fn($img) => asset($img), $rawImages);
    $hasMultiple = count($images) >= 2;
    $primaryImg = $images[0] ?? asset($product['image'] ?? '');
    $hoverImg = !empty($product['hoverImage']) ? asset($product['hoverImage']) : ($hasMultiple ? $images[1] : null);
@endphp

<article class="product-card" data-product-id="{{ $product['id'] }}">
    <div class="cat-card-media">
        <div class="cat-card-image-wrap{{ $hasMultiple ? ' has-multiple-images' : '' }}" data-images='@json($images)' data-current-idx="0">
            <a class="cat-card-image{{ $hoverImg ? ' has-hover-image' : '' }}" href="{{ route('product.show', $product['id']) }}" aria-label="{{ $product['name'] }}">
                <img class="cat-card-img-primary" src="{{ $primaryImg }}" alt="LIVA {{ $product['name'] }}" loading="{{ $eager ? 'eager' : 'lazy' }}" width="720" height="720">
                @if($hoverImg)
                    <img class="cat-card-img-hover" src="{{ $hoverImg }}" alt="LIVA {{ $product['name'] }} alternate view" loading="lazy" width="720" height="720">
                @endif
            </a>
            @if($hasMultiple)
                <button type="button" class="cat-card-nav cat-card-prev" aria-label="Previous image" data-action="prev-img">
                    <x-icon name="chevron" />
                </button>
                <button type="button" class="cat-card-nav cat-card-next" aria-label="Next image" data-action="next-img">
                    <x-icon name="chevron" />
                </button>
                <div class="cat-card-dots" role="tablist" aria-label="Product image slides">
                    @foreach($images as $idx => $imgUrl)
                        <button type="button" class="cat-card-dot{{ $idx === 0 ? ' is-active' : '' }}" data-idx="{{ $idx }}" aria-label="Slide {{ $idx + 1 }}"></button>
                    @endforeach
                </div>
            @endif
        </div>
        @if(!empty($product['discount']))
            <span class="cat-card-badge">{{ $product['discount'] }}</span>
        @endif
        <div class="cat-card-actions-float">
            <button class="cat-action-circle cat-wishlist" type="button" data-id="{{ $product['id'] }}" aria-label="Save {{ $product['name'] }} to wishlist" aria-pressed="false">
                <x-icon name="heart" />
            </button>
            <button class="cat-action-circle cat-quickview-btn" type="button" data-id="{{ $product['id'] }}" aria-label="Quick view {{ $product['name'] }}">
                <x-icon name="eye" />
            </button>
            <button class="cat-action-circle cat-quick-add" type="button" data-id="{{ $product['id'] }}" aria-label="Add {{ $product['name'] }} to bag">
                <x-icon name="bag" />
            </button>
        </div>
    </div>
    <div class="cat-card-body">
        <div class="cat-card-meta-line">
            <span class="cat-card-category" data-i18n="{{ $catI18nMap[$product['category'] ?? ''] ?? '' }}">{{ $categoryName }}</span>
            <span class="cat-card-rating">
                <x-icon name="starFill" />
                {{ $ratingVal }}
            </span>
        </div>
        <h3 class="cat-card-name">
            <a href="{{ route('product.show', $product['id']) }}">{{ $product['name'] }}</a>
        </h3>
        <div class="cat-card-price-line">
            <span class="cat-card-price">{{ $priceFormatted }}</span>
            @if($origPriceFormatted)
                <span class="cat-card-orig-price">{{ $origPriceFormatted }}</span>
            @endif
            @php
                $stockVal = (int) ($product['stock'] ?? 20);
                $isOutOfStock = $stockVal <= 0;
                $isLowStock = $stockVal > 0 && $stockVal <= 5;
                $stockClass = $isOutOfStock ? ' is-out-of-stock' : ($isLowStock ? ' is-low-stock' : '');
            @endphp
            <span class="cat-card-stock{{ $stockClass }}">
                <span class="cat-stock-dot"></span>
                <span class="cat-stock-label" data-i18n="stock">{{ __('storefront.stock') ?? 'Stock' }}:</span>
                <strong class="cat-stock-qty">{{ $stockVal }}</strong>
            </span>
        </div>
    </div>
</article>

