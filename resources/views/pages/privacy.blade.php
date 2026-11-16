@extends('layouts.app')

@section('title', 'Privacy — LIVA')

@section('content')
<div id="app">
    <section class="information-page container">
        <span class="eyebrow">ABOUT THIS PREVIEW</span>
        <h1>Your saved information</h1>
        <div class="prose">
            <h2>On this device.</h2>
            <p>Your shopping bag, saved products, demo profile and demo orders are stored in this browser. No account server, analytics or payment service is connected.</p>
            <p>The contact form only shows a confirmation; it does not send or store your message. Use sample information while exploring account and checkout screens.</p>
            <h2>You’re in control.</h2>
            <p>Clear this site’s browser data to remove saved information. This describes the prototype’s behavior, not a privacy policy for a future live store.</p>
            <a class="text-link" href="{{ route('contact') }}">Help & contact <x-icon name="arrow" /></a>
        </div>
    </section>
</div>
@endsection

