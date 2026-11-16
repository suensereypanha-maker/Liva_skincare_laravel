@extends('layouts.app')

@section('title', 'Shop All — LIVA')

@section('content')
<div id="app">
    <div class="cat-shop-wrapper">
        <!-- Breadcrumb Header -->
        <section class="cat-shop-banner">
            <div class="container cat-shop-banner-content">
                <h1 id="shop-title">Shop</h1>
                <nav class="cat-breadcrumb-trail" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}">Home</a>
                    <span aria-hidden="true">/</span>
                    <span aria-current="page">Shop</span>
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
                    <h2 class="cat-filter-sidebar-title">Filter Options</h2>
                    <button type="button" class="icon-button cat-filter-close" id="cat-filter-close" aria-label="Close filters">
                        <x-icon name="close" />
                    </button>
                </div>

                <!-- Categories Filter -->
                <div class="cat-filter-group">
                    <h3 class="cat-filter-heading">By Categories</h3>
                    <ul class="cat-filter-list">
                        <li>
                            <button type="button" class="cat-filter-link{{ empty($category) ? ' is-active' : '' }}" data-filter-type="category" data-filter-value="">
                                <span>All Categories</span>
                                <span class="cat-filter-count">{{ $totalAll ?? count($products) }}</span>
                            </button>
                        </li>
                        @foreach($categories as $key => $name)
                            <li>
                                <button type="button" class="cat-filter-link{{ ($category ?? '') === $key ? ' is-active' : '' }}" data-filter-type="category" data-filter-value="{{ $key }}">
                                    <span>{{ $name }}</span>
                                    <span class="cat-filter-count">{{ $categoryCounts[$key] ?? 0 }}</span>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Skin Type Filter -->
                <div class="cat-filter-group">
                    <h3 class="cat-filter-heading">By Skin Type</h3>
                    <ul class="cat-filter-list">
                        @foreach($skinTypes as $type)
                            <li>
                                <button type="button" class="cat-filter-link" data-filter-type="skinType" data-filter-value="{{ $type }}">
                                    <span>{{ $type }}</span>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Price Range Filter -->
                <div class="cat-filter-group">
                    <h3 class="cat-filter-heading">Price Range</h3>
                    <div class="cat-range-slider">
                        <div class="cat-slider-track">
                            <div class="cat-slider-range" id="cat-slider-range-fill" style="left:0%;right:0%;"></div>
                        </div>
                        <input type="range" class="cat-range-input cat-range-min" id="cat-range-min" min="10" max="100" value="{{ $minPrice ?? 10 }}" step="1" aria-label="Minimum price">
                        <input type="range" class="cat-range-input cat-range-max" id="cat-range-max" min="10" max="100" value="{{ $maxPrice ?? 100 }}" step="1" aria-label="Maximum price">
                    </div>
                    <div class="cat-range-values">
                        <span id="cat-min-price-display">${{ number_format($minPrice ?? 10, 2) }}</span>
                        <span id="cat-max-price-display">${{ number_format($maxPrice ?? 100, 2) }}</span>
                    </div>
                </div>

                <!-- Promotion Filter -->
                <div class="cat-filter-group">
                    <h3 class="cat-filter-heading">Promotions</h3>
                    <ul class="cat-filter-list">
                        <li>
                            <button type="button" class="cat-filter-link" data-filter-type="promo" data-filter-value="new-arrival">
                                <span>New Arrivals</span>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="cat-filter-link" data-filter-type="promo" data-filter-value="best-seller">
                                <span>Best Sellers</span>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="cat-filter-link" data-filter-type="promo" data-filter-value="on-sale">
                                <span>On Sale</span>
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- Stock Availability -->
                <div class="cat-filter-group">
                    <h3 class="cat-filter-heading">Availability</h3>
                    <ul class="cat-filter-list">
                        <li>
                            <button type="button" class="cat-filter-link" data-filter-type="stock" data-filter-value="in-stock">
                                <span>In Stock</span>
                            </button>
                        </li>
                    </ul>
                </div>

                <div class="cat-filter-reset-wrap">
                    <button type="button" class="cat-filter-reset-btn" id="cat-filter-reset">Reset Filters</button>
                </div>
            </aside>

            <!-- Column 2: Main Products Area -->
            <main class="cat-shop-main" id="shop-main">
                <!-- Top Results Bar -->
                <div class="cat-results-header">
                    <div class="cat-results-counter">
                        <p aria-live="polite">Showing 1–{{ min(12, $totalCount) }} of {{ $totalCount }} results</p>
                    </div>
                    <div class="cat-results-controls">
                        <button type="button" class="cat-mobile-filter-trigger" id="cat-mobile-filter-open">
                            <x-icon name="filter" />
                            <span>Filter Options</span>
                        </button>
                        <div class="cat-sort-control">
                            <label for="cat-sort-select" class="cat-sort-label">Sort by:</label>
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
                @if($totalCount > 12)
                    <nav class="cat-pagination-bar" aria-label="Product catalog pagination">
                        <ul class="cat-pagination-list">
                            <li><button type="button" class="cat-page-btn is-active" data-page="1" aria-current="page">1</button></li>
                            <li><button type="button" class="cat-page-btn" data-page="2">2</button></li>
                            <li><button type="button" class="cat-page-btn cat-page-next" data-page="2" aria-label="Next page"><x-icon name="arrow" /></button></li>
                        </ul>
                    </nav>
                @endif
            </main>
        </div>
    </div>
</div>
@endsection
