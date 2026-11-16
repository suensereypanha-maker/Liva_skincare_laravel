@props(['product', 'eager' => false])

@php
    $categoryName = \App\Models\Product::categoryName($product['category'] ?? '');
    $ratingVal = isset($product['rating']) ? number_format((float) $product['rating'], 1) : '4.9';
    $hasHover = !empty($product['hoverImage']);
    $priceFormatted = '$' . number_format((float) $product['price'], 2);
    $origPriceFormatted = !empty($product['originalPrice']) ? ('$' . number_format((float) $product['originalPrice'], 2)) : null;
@endphp

<article class="product-card" data-product-id="{{ $product['id'] }}">
    <div class="cat-card-media">
        <a class="cat-card-image{{ $hasHover ? ' has-hover-image' : '' }}" href="{{ route('product.show', $product['id']) }}" aria-label="{{ $product['name'] }}">
            <img class="cat-card-img-primary" src="{{ asset($product['image']) }}" alt="LIVA {{ $product['name'] }}" loading="{{ $eager ? 'eager' : 'lazy' }}" width="720" height="720">
            @if($hasHover)
                <img class="cat-card-img-hover" src="{{ asset($product['hoverImage']) }}" alt="LIVA {{ $product['name'] }} alternate view" loading="lazy" width="720" height="720">
            @endif
        </a>
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
            <span class="cat-card-category">{{ $categoryName }}</span>
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
            <span class="cat-card-stock">
                <span class="cat-stock-dot"></span>Stock: {{ $product['stock'] ?? 20 }}
            </span>
        </div>
    </div>
</article>

