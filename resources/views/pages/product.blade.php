@extends('layouts.app')

@php
    $product = $product ?? \App\Models\Product::all()->first();
    $categoryName = $categoryName ?? \App\Models\Product::categoryName($product['category'] ?? '');
    $related = $related ?? \App\Models\Product::whereCategory($product['category'] ?? 'hair')->where('id', '!=', $product['id'])->take(3);
    $productSizes = $productSizes ?? ($product['sizes'] ?? [$product['size'] ?? '250 mL']);
    $productImages = $productImages ?? ($product['images'] ?? array_values(array_filter([$product['image'] ?? null, $product['hoverImage'] ?? null, 'assets/daily-edit-detail.webp'])));
@endphp

@section('title', ($product['name'] ?? 'Product Details') . ' — LIVA')

@section('content')
    <div id="app">
        <div class="cat-product-page container">
            <!-- Breadcrumb -->
            <nav class="cat-breadcrumb" aria-label="Breadcrumb">
                <a href="{{ route('shop') }}">The Collection</a>
                <span aria-hidden="true">/</span>
                <a href="{{ route('shop', ['category' => $product['category'] ?? '']) }}">{{ $categoryName }}</a>
                <span aria-hidden="true">/</span>
                <span aria-current="page">{{ $product['name'] }}</span>
            </nav>

            <!-- Product Detail Main -->
            <section class="cat-product-detail" aria-labelledby="cat-product-title">
                <div class="cat-product-gallery">
                    <div class="cat-gallery-layout">
                        @if (count($productImages) > 1)
                            <div class="cat-gallery-thumbs" role="tablist" aria-label="Product image thumbnails">
                                @foreach ($productImages as $index => $img)
                                    <button type="button" class="cat-gallery-thumb{{ $index === 0 ? ' is-active' : '' }}"
                                        data-image="{{ asset($img) }}" role="tab"
                                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
                                        aria-label="View product image {{ $index + 1 }}">
                                        <img src="{{ asset($img) }}"
                                            alt="{{ $product['name'] }} thumbnail {{ $index + 1 }}" loading="lazy"
                                            width="120" height="135">
                                    </button>
                                @endforeach
                            </div>
                        @endif

                        <div class="cat-product-photo">
                            <img id="cat-main-img" src="{{ asset($product['image']) }}" alt="LIVA {{ $product['name'] }}"
                                loading="eager" width="720" height="720">
                            <span class="cat-photo-label">{{ $categoryName }}</span>
                            @if (count($productImages) > 1)
                                <button type="button" class="cat-photo-nav cat-photo-prev" id="cat-photo-prev" aria-label="Previous image">
                                    <x-icon name="chevron" />
                                </button>
                                <button type="button" class="cat-photo-nav cat-photo-next" id="cat-photo-next" aria-label="Next image">
                                    <x-icon name="chevron" />
                                </button>
                                <span class="cat-photo-counter" id="cat-photo-counter">1 / {{ count($productImages) }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="cat-product-info">
                    <p class="eyebrow">LIVA / {{ strtoupper($categoryName) }}</p>
                    <div class="cat-product-title-row">
                        <h1 id="cat-product-title">{{ $product['name'] }}</h1>
                        <div class="cat-product-actions">
                            <button class="icon-button cat-detail-action cat-detail-share" id="cat-detail-share" type="button"
                                data-id="{{ $product['id'] }}" data-name="{{ $product['name'] }}"
                                data-url="{{ url()->current() }}"
                                aria-label="Share {{ $product['name'] }}" title="Share {{ $product['name'] }}">
                                <x-icon name="share" />
                            </button>
                            <button class="icon-button cat-wishlist cat-detail-wishlist" type="button"
                                data-id="{{ $product['id'] }}" aria-label="Save {{ $product['name'] }} to wishlist"
                                aria-pressed="false" title="Save to wishlist">
                                <x-icon name="heart" />
                            </button>
                        </div>
                    </div>

                    <div class="cat-product-price-row">
                        <p class="cat-product-price" id="cat-display-price">
                            ${{ number_format((float) $product['price'], 2) }}</p>
                      
                    </div>

                    <p class="cat-description">{{ $product['description'] }}</p>

                    <dl class="cat-product-facts">
                        <div>
                            <dt>Format</dt>
                            <dd>{{ $product['format'] }}</dd>
                        </div>
                        <div>
                            <dt>Size</dt>
                            <dd id="cat-fact-size">{{ $product['size'] }}</dd>
                        </div>
                        <div>
                            <dt>Stock</dt>
                            <dd id="cat-fact-stock">{{ $product['stock'] ?? 20 }} available</dd>
                        </div>
                        @if (!empty($product['contents']))
                            <div>
                                <dt>Included</dt>
                                <dd>{{ $product['contents'] }}</dd>
                            </div>
                        @endif
                    </dl>

                    <form id="cat-product-form" data-id="{{ $product['id'] }}" data-selected-size="{{ $product['size'] }}"
                        data-selected-price="{{ $product['price'] }}">
                        @if (count($productSizes) > 1)
                            <div class="cat-size-selector-wrap">
                                <div class="cat-size-selector-header">
                                    <span class="cat-size-selector-label">Select size</span>
                                    <strong id="cat-current-size-name">{{ $product['size'] }}</strong>
                                </div>
                                <div class="cat-size-pills" role="radiogroup" aria-label="Select size">
                                    @foreach ($productSizes as $s)
                                        @php
                                            $p = $product['sizePrices'][$s] ?? $product['price'];
                                            $isSelected = $s === $product['size'];
                                        @endphp
                                        <button type="button" class="cat-size-pill{{ $isSelected ? ' is-active' : '' }}"
                                            data-size="{{ $s }}" data-price="{{ $p }}"
                                            role="radio" aria-checked="{{ $isSelected ? 'true' : 'false' }}">
                                            <span class="cat-size-vol">{{ $s }}</span>
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="cat-purchase-label">
                            <label for="cat-product-qty">Quantity</label>
                            <span>USD</span>
                        </div>

                        <div class="cat-purchase-row">
                            <div class="cat-quantity">
                                <button type="button" class="cat-qty-change" data-delta="-1"
                                    aria-label="Decrease quantity">
                                    <x-icon name="minus" />
                                </button>
                                <input id="cat-product-qty" name="quantity" type="number" min="1" max="99"
                                    step="1" value="1" inputmode="numeric">
                                <button type="button" class="cat-qty-change" data-delta="1" aria-label="Increase quantity">
                                    <x-icon name="plus" />
                                </button>
                            </div>
                            <button class="cat-detail-add" type="submit">
                                <span>Add to bag</span>
                                <span data-cat-total>${{ number_format((float) $product['price'], 2) }}</span>
                                <x-icon name="arrow" />
                            </button>
                        </div>
                    </form>

                    <div class="cat-preview-note cat-product-preview">
                        <strong>Sample product</strong>
                        <span>This is a storefront preview. Product details and prices are subject to confirmation; checkout
                            is a demonstration.</span>
                    </div>

                    <div class="cat-product-accordions">
                        @foreach (['Formula & ingredients', 'Suitability', 'How to use'] as $label)
                            <details>
                                <summary>{{ $label }} <x-icon name="plus" /></summary>
                                <p>Brand-confirmed details will be added before launch.</p>
                            </details>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- Mobile Purchase Sticky Bar -->
            <div class="cat-mobile-purchase" id="cat-mobile-purchase" aria-label="Product purchase">
                <div>
                    <strong>{{ $product['name'] }}</strong>
                    <span id="cat-mobile-size-display">{{ $product['size'] }} · <span data-cat-quantity>1</span>
                        selected</span>
                </div>
                <button type="submit" form="cat-product-form">
                    <span>Add to bag</span>
                    <span data-cat-total>${{ number_format((float) $product['price'], 2) }}</span>
                </button>
            </div>

            <!-- Product Video Reels (Video only, no text) -->
            @include('partials.video-reels')

            <!-- Related Products Section -->
            @if (count($related))
                <section class="cat-related" aria-labelledby="cat-related-title">
                    <div class="cat-section-heading">
                        <div>
                            <p class="eyebrow">CONTINUE EXPLORING</p>
                            <h2 id="cat-related-title">More in {{ $categoryName }}</h2>
                            <p>Other products from this category.</p>
                        </div>
                        <a class="cat-text-link"
                            href="{{ route('shop', ['category' => $product['category'] ?? '']) }}">
                            View collection <x-icon name="arrow" />
                        </a>
                    </div>
                    <div class="cat-product-grid">
                        @foreach ($related as $rel)
                            <x-product-card :product="$rel" />
                        @endforeach
                    </div>
                </section>
            @endif
        </div>
    </div>
@endsection
