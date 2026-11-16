@extends('layouts.app')

@section('title', 'Order Tracking — LIVA')

@section('content')
<div id="app">
    <section class="commerce-page commerce-tracking-page container">
        <div class="cat-page-heading">
            <p class="eyebrow">ORDER LOOKUP</p>
            <h1>Track a demo order.</h1>
            <p>Look up an order saved on this device, or explore a sample tracking view.</p>
        </div>

        <div class="commerce-tracking-layout">
            <div>
                <form id="commerce-tracking-form" class="commerce-tracking-form">
                    <h2>Where’s my order?</h2>
                    <p>Enter your order number to take a look.</p>
                    <div class="form-field">
                        <label for="commerce-order-id">Order number</label>
                        <input id="commerce-order-id" name="orderId" required maxlength="40" placeholder="e.g. LIVA-1024" value="{{ $orderNumber ?? '' }}" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-primary">Find my order <x-icon name="arrow" /></button>
                    <div id="commerce-tracking-error" class="commerce-form-error" role="alert"></div>
                    <p class="commerce-tracking-example">Just exploring? <button type="button" class="commerce-sample-order">Try sample order LIVA-1024</button></p>
                </form>

                <div class="commerce-tracking-help">
                    <span><x-icon name="heart" /></span>
                    <h3>About this preview</h3>
                    <p>Tracking uses local demo records. It is not connected to a delivery service.</p>
                    <a href="{{ url('/contact') }}#contact" class="commerce-text-link">View help <x-icon name="arrow" /></a>
                </div>
            </div>

            <div id="commerce-tracking-output" aria-live="polite">
                <div class="commerce-tracking-placeholder">
                    <div class="commerce-tracking-illustration">
                        <x-icon name="bag" />
                        <span><x-icon name="leaf" /></span>
                    </div>
                    <p class="eyebrow">DEMO TRACKING</p>
                    <h2>Your order,<br>at a glance.</h2>
                    <p>Enter an order number to see its demo details.</p>
                    <span class="commerce-tracking-fineprint">Demo tracking · Local and sample orders only</span>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

