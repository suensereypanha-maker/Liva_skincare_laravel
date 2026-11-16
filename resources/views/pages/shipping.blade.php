@extends('layouts.app')

@section('title', 'Delivery & returns — LIVA')

@section('content')
<div id="app">
    <section class="information-page container">
        <span class="eyebrow">BEFORE YOU ORDER</span>
        <h1>Delivery & returns</h1>
        <div class="prose">
            <h2>Details are being confirmed.</h2>
            <p>Delivery coverage, fees, timing and returns conditions have not been supplied for this preview. No delivery or returns service is offered through this demo.</p>
            <p>You can explore the address form and the order tracking interface. Saving a demo order does not arrange delivery. Approved store policies will be needed before a live launch.</p>
            <a class="text-link" href="{{ route('contact') }}">Help & contact <x-icon name="arrow" /></a>
        </div>
    </section>
</div>
@endsection

