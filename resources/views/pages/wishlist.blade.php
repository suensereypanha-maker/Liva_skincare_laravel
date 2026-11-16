@extends('layouts.app')

@section('title', 'Saved Products — LIVA')

@section('content')
<div id="app">
    <section class="cat-wishlist-page container">
        <div class="cat-page-heading">
            <p class="eyebrow">YOUR DAILY EDIT</p>
            <h1>Saved for later.</h1>
            <p>Your shortlist, ready when you are.</p>
        </div>
        <div id="comparison-tray"></div>
        <div id="cat-wishlist-content">
            <div class="cat-empty">
                <span class="cat-empty-symbol"><x-icon name="heart" /></span>
                <h2>Keep your options open.</h2>
                <p>Use the heart on any product to save it here for later.</p>
                <a href="{{ route('shop') }}" class="btn btn-primary">Explore the collection <x-icon name="arrow" /></a>
            </div>
        </div>
    </section>
</div>
@endsection

