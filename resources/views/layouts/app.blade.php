<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale() ?? 'en') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() ?? '' }}">
    <meta name="theme-color" content="#faf8f4">
    <meta name="description" content="@yield('meta_description', 'The LIVA Daily Edit. Explore hair care, body care and a personal selection of everyday essentials.')">
    <title>@yield('title', 'LIVA — The Daily Edit')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preload" href="{{ asset('fonts/dm-sans.ttf') }}" as="font" type="font/ttf" crossorigin>
    <link rel="preload" href="{{ asset('fonts/cormorant.ttf') }}" as="font" type="font/ttf" crossorigin>
    <link rel="preload" href="{{ asset('fonts/manrope.ttf') }}" as="font" type="font/ttf" crossorigin>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ config('app.version', '1.0.0') }}">
    <link rel="stylesheet" href="{{ asset('css/hero.css') }}?v={{ config('app.version', '1.0.0') }}">
    <link rel="stylesheet" href="{{ asset('css/catalog.css') }}?v={{ config('app.version', '1.0.0') }}">
    <link rel="stylesheet" href="{{ asset('css/commerce.css') }}?v={{ config('app.version', '1.0.0') }}">

    @stack('styles')
</head>

<body data-page="{{ request()->routeIs('home') ? 'home' : (request()->routeIs('shop*') ? 'shop' : (request()->routeIs('product*') ? 'product' : (request()->routeIs('routine') ? 'routine' : (request()->routeIs('about') ? 'about' : (request()->routeIs('contact') ? 'contact' : (request()->routeIs('account*') ? 'account' : (request()->routeIs('wishlist') ? 'wishlist' : (request()->routeIs('compare') ? 'compare' : (request()->routeIs('tracking') ? 'tracking' : 'default'))))))))) }}">
    <a class="skip-link" href="#main-content">Skip to content</a>

    {{-- @include('partials.announcement') --}}
    @include('partials.header')

    <main id="main-content" tabindex="-1">
        @yield('content')
    </main>

    @include('partials.footer')
    @include('partials.floating-social')
    @include('partials.cart-drawer')
    @include('partials.toast')

    <noscript>
        <p class="empty-state">Please enable JavaScript to explore the LIVA shopping experience.</p>
    </noscript>

    <!-- Core Scripts -->
    <script defer src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script defer src="{{ asset('js/core.js') }}"></script>
    <script defer src="{{ asset('js/catalog.js') }}"></script>
    <script defer src="{{ asset('js/commerce.js') }}"></script>
    <script defer src="{{ asset('js/routine.js') }}"></script>
    <script defer src="{{ asset('js/hero.js') }}"></script>
    <script defer src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')
</body>

</html>
