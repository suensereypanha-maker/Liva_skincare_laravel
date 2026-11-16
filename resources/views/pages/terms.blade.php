@extends('layouts.app')

@section('title', 'About this preview — LIVA')

@section('content')
<div id="app">
    <section class="information-page container">
        <span class="eyebrow">A COLLECTION IN PROGRESS</span>
        <h1>The LIVA preview</h1>
        <div class="prose">
            <h2>A working design preview.</h2>
            <p>This frontend demonstrates product discovery, comparison, saved items, a personal shelf, shopping bag, account, checkout and order history.</p>
            <p>Product imagery, names, sizes and prices are illustrative. Ingredients, use instructions and product benefits require approved brand information. No customer ratings, reviews or certifications are presented.</p>
            <h2>No purchase is made.</h2>
            <p>Accounts, payment selections and orders are demonstrations. No SMS is sent, no payment is collected, no stock is reserved and no order is delivered. Delivery and returns policies and live customer care channels are not configured.</p>
            <a class="text-link" href="{{ route('contact') }}">Help & contact <x-icon name="arrow" /></a>
        </div>
    </section>
</div>
@endsection

