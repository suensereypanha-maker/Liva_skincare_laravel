@extends('layouts.app')

@section('title', 'LIVA — The Daily Edit')

@section('content')
<div id="app">
    <x-hero />

    <!-- Category Index -->
    <nav class="category-index container" aria-label="Shop by category">
        @foreach($categoryCards as $card)
            <a href="{{ $card['url'] }}">
                <div>
                    <h2>{{ $card['title'] }}</h2>
                    <p>{{ $card['description'] }}</p>
                </div>
                <img src="{{ asset($card['image']) }}" alt="{{ $card['title'] }}" width="150" height="150">
                <x-icon name="arrow" />
            </a>
        @endforeach
    </nav>

    <!-- Daily Selection -->
    <section class="daily-selection container">
        <div class="section-heading">
            <div>
                <span class="eyebrow">MEET YOUR EVERYDAY</span>
                <h2>Find your <em>everyday.</em></h2>
            </div>
            <div class="selection-intro">
                <p>Start with what you came for.<br>Make room for something else.</p>
                <a href="{{ route('shop') }}" class="text-link"> All products <x-icon name="arrow" /></a>
            </div>
        </div>

        <div class="edit-layout">
            <aside class="edit-navigation">
                <div class="edit-tabs" role="group" aria-label="Choose a product edit">
                    <button type="button" data-edit="hair" aria-pressed="true" class="active">Hair Care</button>
                    <button type="button" data-edit="body" aria-pressed="false">Body Care</button>
                    <button type="button" data-edit="sets" aria-pressed="false">Sets</button>
                </div>
                <div class="edit-note">
                    <span class="eyebrow">A CLOSER LOOK</span>
                    <p>Size, price, format.<br>The details that help you choose.</p>
                </div>
            </aside>

            <div>
                <div class="home-product-grid" id="home-products" aria-live="polite">
                    @foreach($hairProducts as $product)
                        <div class="home-card-wrapper" data-category="hair">
                            <x-product-card :product="$product" />
                        </div>
                    @endforeach
                    @foreach($bodyProducts as $product)
                        <div class="home-card-wrapper" data-category="body" style="display: none;">
                            <x-product-card :product="$product" />
                        </div>
                    @endforeach
                    @foreach($setsProducts as $product)
                        <div class="home-card-wrapper" data-category="sets" style="display: none;">
                            <x-product-card :product="$product" />
                        </div>
                    @endforeach
                </div>
                <div id="comparison-tray"></div>
            </div>
        </div>
    </section>

    <!-- Shelf Feature Section -->
    <section class="shelf-feature container">
        <div class="shelf-feature-art">
            <img src="{{ asset('assets/daily-edit-detail.webp') }}" alt="A hand reaching for a personal care bottle on a sunlit terracotta ledge" loading="lazy" width="1536" height="1024">
            <span class="image-note">MAKE IT A PERSONAL SELECTION.</span>
        </div>
        <div class="shelf-feature-copy">
            <span class="eyebrow">CURATED BY YOU</span>
            <h2>A shelf that<br>feels like <em>you.</em></h2>
            <p>A hair pair, a body duo, or a little of both.<br>Choose the essentials you want, see your total,<br class="desktop-break"> and bring them together in one bag.</p>
            <a href="{{ route('routine') }}" class="btn btn-primary">Build your shelf <x-icon name="plus" /></a>
            <span class="shelf-footnote">NO SET ROUTINE. JUST YOUR SELECTION.</span>
        </div>
    </section>

    <!-- Brand Statement -->
    <section class="brand-statement container">
        <span class="eyebrow">THIS IS LIVA</span>
        <h2>Care is personal.<br><em>Let’s keep it that way.</em></h2>
        <div>
            <p>For the first shower of the day, the quiet moment after a long one, and whatever everyday looks like to you.</p>
            <a class="text-link" href="{{ route('about') }}">A little more about LIVA <x-icon name="arrow" /></a>
        </div>
    </section>

    <!-- Product Video Reels -->
    @include('partials.video-reels')
</div>
@endsection
