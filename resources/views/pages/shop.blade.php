@extends('layouts.app')

@section('title', 'Shop All — LIVA')

@section('content')
<div id="app">
    <div class="cat-shop-wrapper">
        <!-- Breadcrumb Header -->
        <section class="cat-shop-banner">
            <div class="container cat-shop-banner-content">
                <h1 id="shop-title" data-i18n="shop">Shop</h1>
                <nav class="cat-breadcrumb-trail" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}" data-i18n="home">Home</a>
                    <span aria-hidden="true">/</span>
                    <span aria-current="page" data-i18n="shop">Shop</span>
                </nav>
            </div>
        </section>

        <!-- Mobile Backdrop -->
        <div class="cat-sidebar-overlay" id="cat-sidebar-overlay"></div>

        <!-- Main 2-Column Grid Layout -->
        <div class="container cat-shop-layout">
            <!-- Column 1: Sidebar Filter -->
            <aside class="cat-filter-sidebar" id="cat-filter-sidebar" aria-label="Product filters">
                <div class="cat-filter-sidebar-head">
                    <h2 class="cat-filter-sidebar-title" data-i18n="filterOptions">Filter Options</h2>
                    <button type="button" class="icon-button cat-filter-close" id="cat-filter-close" aria-label="Close filters">
                        <x-icon name="close" />
                    </button>
                </div>

                <!-- Categories Filter -->
                <div class="cat-filter-group">
                    <h3 class="cat-filter-heading" data-i18n="byCategories">By Categories</h3>
                    <ul class="cat-filter-list">
                        <li>
                            <button type="button" class="cat-filter-link{{ empty($category) ? ' is-active' : '' }}" data-filter-type="category" data-filter-value="">
                                <span data-i18n="allCategories">All Categories</span>
                                <span class="cat-filter-count">{{ $totalAll ?? count($products) }}</span>
                            </button>
                        </li>
                        @php
                            $catI18nMap = [
                                'skin-care' => 'skinCare',
                                'makeup' => 'makeup',
                                'hair' => 'hairCare',
                                'fragrances' => 'fragrances',
                                'nail-care' => 'nailCare',
                                'body' => 'bodyCare',
                                'sets' => 'sets',
                            ];
                            $skinI18nMap = [
                                'Normal' => 'normal',
                                'Oily' => 'oily',
                                'Dry' => 'dry',
                                'Combination' => 'combination',
                                'Sensitive' => 'sensitive',
                            ];
                        @endphp
                        @foreach($categories as $key => $name)
                            <li>
                                <button type="button" class="cat-filter-link{{ ($category ?? '') === $key ? ' is-active' : '' }}" data-filter-type="category" data-filter-value="{{ $key }}">
                                    <span data-i18n="{{ $catI18nMap[$key] ?? '' }}">{{ $name }}</span>
                                    <span class="cat-filter-count">{{ $categoryCounts[$key] ?? 0 }}</span>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Skin Type Filter -->
                <div class="cat-filter-group">
                    <h3 class="cat-filter-heading" data-i18n="bySkinType">By Skin Type</h3>
                    <ul class="cat-filter-list">
                        @foreach($skinTypes as $type)
                            <li>
                                <button type="button" class="cat-filter-link{{ ($skinType ?? '') === $type ? ' is-active' : '' }}" data-filter-type="skinType" data-filter-value="{{ $type }}">
                                    <span data-i18n="{{ $skinI18nMap[$type] ?? '' }}">{{ $type }}</span>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Price Range Filter -->
                <div class="cat-filter-group">
                    <div class="cat-price-heading-row">
                        <h3 class="cat-filter-heading" data-i18n="price">Price</h3>
                    </div>
                    <p class="cat-price-val-display" id="cat-price-val-display">${{ number_format($minPrice ?? 10, 2) }} - ${{ number_format($maxPrice ?? 100, 2) }}</p>
                    <div class="cat-dual-slider">
                        <div class="cat-slider-track"></div>
                        <div class="cat-slider-range" id="cat-slider-range" style="left: 0%; right: 0%;"></div>
                        <input type="range" class="cat-slider-input" id="cat-range-min" min="10" max="100" step="5" value="{{ $minPrice ?? 10 }}" aria-label="Minimum price">
                        <input type="range" class="cat-slider-input" id="cat-range-max" min="10" max="100" step="5" value="{{ $maxPrice ?? 100 }}" aria-label="Maximum price">
                    </div>
                </div>

                <!-- Review / Ratings Filter -->
                <div class="cat-filter-group">
                    <h3 class="cat-filter-heading" data-i18n="review">Review</h3>
                    <ul class="cat-ratings-list">
                        @foreach([5, 4, 3, 2, 1] as $r)
                            <li>
                                <button type="button" class="cat-rating-btn" data-filter-type="rating" data-filter-value="{{ $r }}">
                                    <span class="cat-stars-row" aria-hidden="true">{{ str_repeat('★', $r) . str_repeat('☆', 5 - $r) }}</span>
                                    <span class="cat-rating-label">{{ $r }} <span data-i18n="star">Star</span>{{ $r === 5 ? '' : ' ' }}@if($r < 5)<span data-i18n="andAbove">& Above</span>@endif</span>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- By Promotions Filter -->
                <div class="cat-filter-group">
                    <h3 class="cat-filter-heading" data-i18n="byPromotions">By Promotions</h3>
                    <div class="cat-checkbox-group">
                        <label class="cat-custom-checkbox">
                            <input type="checkbox" class="cat-promo-toggle" value="new-arrival" {{ ($selectedPromo ?? '') === 'new-arrival' ? 'checked' : '' }}>
                            <span class="cat-checkbox-mark"></span>
                            <span class="cat-checkbox-text" data-i18n="newArrivals">New Arrivals</span>
                        </label>
                        <label class="cat-custom-checkbox">
                            <input type="checkbox" class="cat-promo-toggle" value="best-seller" {{ ($selectedPromo ?? '') === 'best-seller' ? 'checked' : '' }}>
                            <span class="cat-checkbox-mark"></span>
                            <span class="cat-checkbox-text" data-i18n="bestSellers">Best Sellers</span>
                        </label>
                        <label class="cat-custom-checkbox">
                            <input type="checkbox" class="cat-promo-toggle" value="on-sale" {{ in_array($selectedPromo ?? '', ['on-sale', 'promotion', 'promotions']) ? 'checked' : '' }}>
                            <span class="cat-checkbox-mark"></span>
                            <span class="cat-checkbox-text" data-i18n="promotions">Promotions</span>
                        </label>
                    </div>
                </div>

                <!-- Availability Filter -->
                <div class="cat-filter-group">
                    <h3 class="cat-filter-heading" data-i18n="availability">Availability</h3>
                    <div class="cat-checkbox-group">
                        <label class="cat-custom-checkbox">
                            <input type="checkbox" class="cat-stock-toggle" value="in-stock">
                            <span class="cat-checkbox-mark"></span>
                            <span class="cat-checkbox-text" data-i18n="inStock">In Stock</span>
                        </label>
                        <label class="cat-custom-checkbox">
                            <input type="checkbox" class="cat-stock-toggle" value="out-of-stock">
                            <span class="cat-checkbox-mark"></span>
                            <span class="cat-checkbox-text" data-i18n="outOfStock">Out of Stock</span>
                        </label>
                    </div>
                </div>

                <div class="cat-filter-reset-wrap">
                    <button type="button" class="cat-filter-reset-btn" id="cat-filter-reset" data-i18n="clearAll">Reset Filters</button>
                </div>
            </aside>

            <!-- Column 2: Main Products Area -->
            <main class="cat-shop-main" id="shop-main">
                <!-- Top Results Bar -->
                <div class="cat-results-header">
                    <div class="cat-results-counter">
                        <p aria-live="polite"><span data-i18n="showing">Showing</span> 1–{{ min(12, $totalCount) }} <span data-i18n="of">of</span> {{ $totalCount }} <span data-i18n="results">results</span></p>
                    </div>
                    <div class="cat-results-controls">
                        <button type="button" class="cat-mobile-filter-trigger" id="cat-mobile-filter-open">
                            <x-icon name="filter" />
                            <span data-i18n="filterOptions">Filter Options</span>
                        </button>
                        <div class="cat-sort-control">
                            <label for="cat-sort-select" class="cat-sort-label" data-i18n="sortBy">Sort by:</label>
                            <div class="cat-sort-select-wrap">
                                <select id="cat-sort-select" aria-label="Sort products">
                                    <option value="default" {{ ($currentSort ?? 'default') === 'default' ? 'selected' : '' }}>Default Sorting</option>
                                    <option value="price-low" {{ ($currentSort ?? '') === 'price-low' ? 'selected' : '' }}>Price: Low to High</option>
                                    <option value="price-high" {{ ($currentSort ?? '') === 'price-high' ? 'selected' : '' }}>Price: High to Low</option>
                                    <option value="rating" {{ ($currentSort ?? '') === 'rating' ? 'selected' : '' }}>Highest Rated</option>
                                    <option value="name" {{ ($currentSort ?? '') === 'name' ? 'selected' : '' }}>Name: A–Z</option>
                                </select>
                                <x-icon name="chevron" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Filter Chips -->
                <div id="cat-active-filters" class="cat-active-chips" aria-label="Active filters"></div>

                <!-- Comparison Tray -->
                <div id="comparison-tray"></div>

                <!-- Product Grid (3 Columns) -->
                <div class="cat-product-grid" id="cat-product-grid">
                    @foreach($products->take(12) as $p)
                        <x-product-card :product="$p" />
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($totalCount > 12 || count($products) > 0)
                    <nav class="cat-pagination" aria-label="Catalog pages">
                        <button type="button" class="cat-page-btn cat-page-prev" data-page="1" disabled aria-disabled="true" aria-label="Previous page">
                            <x-icon name="chevron" />
                        </button>
                        <div class="cat-page-numbers">
                            <button type="button" class="cat-page-number is-active" data-page="1" aria-current="page">1</button>
                            <button type="button" class="cat-page-number" data-page="2">2</button>
                        </div>
                        <button type="button" class="cat-page-btn cat-page-next" data-page="2" aria-label="Next page">
                            <x-icon name="chevron" />
                        </button>
                    </nav>
                @endif
            </main>
        </div>

        <!-- Trust Assurance Badges -->
        <div class="container">
            <section class="cat-trust-features" aria-label="Store guarantees">
                <div class="cat-trust-card">
                    <div class="cat-trust-icon-box"><x-icon name="box" /></div>
                    <div class="cat-trust-info">
                        <h4 data-i18n="freeShipping">Free Shipping</h4>
                        <p data-i18n="freeShippingDesc">Free shipping for order above $50</p>
                    </div>
                </div>
                <div class="cat-trust-card">
                    <div class="cat-trust-icon-box"><x-icon name="card" /></div>
                    <div class="cat-trust-info">
                        <h4 data-i18n="flexiblePayment">Flexible Payment</h4>
                        <p data-i18n="flexiblePaymentDesc">Multiple secure payment options</p>
                    </div>
                </div>
                <div class="cat-trust-card">
                    <div class="cat-trust-icon-box"><x-icon name="phone" /></div>
                    <div class="cat-trust-info">
                        <h4 data-i18n="support247">24×7 Support</h4>
                        <p data-i18n="support247Desc">We support online all days.</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
