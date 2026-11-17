@extends('layouts.app')

@section('title', 'Checkout — LIVA')

@section('content')
<div id="app">
    <section class="commerce-page container">
        <a href="{{ route('shop') }}" class="commerce-back">
            <x-icon name="arrow" /> Back to the collection
        </a>

        <div class="commerce-heading">
            <p class="eyebrow" data-i18n="yourSelection">YOUR SELECTION</p>
            <h1 data-i18n="checkout">{{ __('storefront.checkout') ?? 'Checkout' }}</h1>
            <p>Review your selection and complete your order details.</p>
        </div>

        <div id="commerce-checkout-container">
            <div class="commerce-empty empty-state">
                <span class="commerce-empty-icon"><x-icon name="bag" /></span>
                <h2>Your bag is empty.</h2>
                <p>Add products to your bag before trying checkout.</p>
                <a class="btn btn-primary" href="{{ route('shop') }}">
                    Explore the collection <x-icon name="arrow" />
                </a>
            </div>
        </div>
    </section>
</div>
@endsection

