@extends('layouts.app')

@section('title', 'Compare Products — LIVA')

@section('content')
<div id="app">
    <section class="cat-compare-page container">
        <div class="cat-page-heading">
            <p class="eyebrow">YOUR SHORTLIST</p>
            <h1>Compare products.</h1>
            <p>Compare sample formats and prices before you decide.</p>
        </div>
        <div id="cat-compare-content">
            <div class="cat-empty">
                <h2>Start with two products.</h2>
                <p>Select up to three products from the collection to compare their category, format, size and price.</p>
                <a href="{{ route('shop') }}" class="btn btn-primary">Choose products <x-icon name="arrow" /></a>
            </div>
        </div>
    </section>
</div>
@endsection

