@extends('layouts.app')

@section('title', 'Build Your Shelf — LIVA')

@php
    $shelfIds = $shelfIds ?? ['shampoo', 'conditioner', 'hair-mask', 'body-wash', 'shower-gel', 'body-lotion'];
    $hairItems = $hairItems ?? \App\Models\Product::whereCategory('hair')->filter(fn($p) => in_array($p['id'], $shelfIds));
    $bodyItems = $bodyItems ?? \App\Models\Product::whereCategory('body')->filter(fn($p) => in_array($p['id'], $shelfIds));
@endphp

@section('content')
<div id="app">
    <section class="shelf-page container">
        <div class="shelf-page-head">
            <div>
                <span class="eyebrow">THE DAILY EDIT, BY YOU</span>
                <h1>Build your shelf.</h1>
            </div>
            <p>Pick what belongs in your everyday.<br>Start with a pair, or make your own selection.</p>
        </div>

        <div class="shelf-builder-layout">
            <div>
                <div class="shelf-presets">
                    <span>START WITH</span>
                    <button type="button" class="shelf-preset" data-preset="hair">The hair pair <x-icon name="plus" /></button>
                    <button type="button" class="shelf-preset" data-preset="body">The body pair <x-icon name="plus" /></button>
                    <button type="button" class="shelf-clear">Clear selection</button>
                </div>

                <!-- Group 01: For your hair -->
                <section class="shelf-group">
                    <h2><span>01</span> For your hair</h2>
                    <div class="shelf-options">
                        @foreach($hairItems as $p)
                            <article class="shelf-option" data-shelf-card="{{ $p['id'] }}">
                                <a href="{{ route('product.show', $p['id']) }}" class="shelf-option-image" aria-label="View {{ $p['name'] }}">
                                    <img src="{{ asset($p['image']) }}" alt="{{ $p['name'] }} concept packaging" width="240" height="240">
                                </a>
                                <div>
                                    <h3><a href="{{ route('product.show', $p['id']) }}">{{ $p['name'] }}</a></h3>
                                    <p>{{ $p['size'] }} <span>·</span> <strong class="shelf-option-price">${{ number_format($p['price'], 2) }}</strong></p>
                                    <button class="shelf-select" data-shelf="{{ $p['id'] }}" aria-pressed="false" aria-label="Select {{ $p['name'] }} for your shelf">
                                        <x-icon name="plus" />
                                        <span>Select</span>
                                    </button>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>

                <!-- Group 02: For your body -->
                <section class="shelf-group">
                    <h2><span>02</span> For your body</h2>
                    <div class="shelf-options">
                        @foreach($bodyItems as $p)
                            <article class="shelf-option" data-shelf-card="{{ $p['id'] }}">
                                <a href="{{ route('product.show', $p['id']) }}" class="shelf-option-image" aria-label="View {{ $p['name'] }}">
                                    <img src="{{ asset($p['image']) }}" alt="{{ $p['name'] }} concept packaging" width="240" height="240">
                                </a>
                                <div>
                                    <h3><a href="{{ route('product.show', $p['id']) }}">{{ $p['name'] }}</a></h3>
                                    <p>{{ $p['size'] }} <span>·</span> <strong class="shelf-option-price">${{ number_format($p['price'], 2) }}</strong></p>
                                    <button class="shelf-select" data-shelf="{{ $p['id'] }}" aria-pressed="false" aria-label="Select {{ $p['name'] }} for your shelf">
                                        <x-icon name="plus" />
                                        <span>Select</span>
                                    </button>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>

                <p class="sample-caption">This is a user-selected collection, not a product recommendation. Product imagery, sizes and prices are illustrative.</p>
            </div>

            <!-- Shelf Summary Aside -->
            <aside id="shelf-summary" class="shelf-summary" aria-label="Your shelf selection">
                <div class="shelf-summary-top">
                    <span class="eyebrow">YOUR PERSONAL SELECTION</span>
                    <h2>Your shelf <span>(0)</span></h2>
                </div>
                <div class="shelf-selected">
                    <div class="shelf-empty">
                        <x-icon name="plus" />
                        <p>A little room for your essentials.<br>Select a product to get started.</p>
                    </div>
                </div>
                <div class="shelf-total">
                    <span>Selection subtotal</span>
                    <strong>$0.00</strong>
                </div>
                <button class="btn btn-primary shelf-add" disabled>
                    Select your essentials <x-icon name="arrow" />
                </button>
                <p class="shelf-summary-note">One of each selected product. No bundle discount.<br>Illustrative prices. Delivery is not configured.</p>
            </aside>
            <p id="shelf-status" class="sr-only" role="status" aria-live="polite"></p>
        </div>
    </section>
</div>
@endsection
