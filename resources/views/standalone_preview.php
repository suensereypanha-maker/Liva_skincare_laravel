<?php
// Simple asset helper function for standalone PHP preview mode
if (! function_exists('asset')) {
    function asset($path)
    {
        return '/'.ltrim($path, '/');
    }
}
if (! function_exists('csrf_token')) {
    function csrf_token()
    {
        return 'mock-csrf-token';
    }
}
if (! function_exists('config')) {
    function config($key, $default = null)
    {
        return $default;
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?= csrf_token() ?>">
    <meta name="theme-color" content="#faf8f4">
    <meta name="description" content="The LIVA Daily Edit. Explore hair care, body care and a personal selection of everyday essentials.">
    <title>LIVA — The Daily Edit (Laravel Preview)</title>

    <link rel="icon" href="<?= asset('favicon.svg') ?>" type="image/svg+xml">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preload" href="<?= asset('fonts/dm-sans.ttf') ?>" as="font" type="font/ttf" crossorigin>
    <link rel="preload" href="<?= asset('fonts/cormorant.ttf') ?>" as="font" type="font/ttf" crossorigin>
    <link rel="preload" href="<?= asset('fonts/manrope.ttf') ?>" as="font" type="font/ttf" crossorigin>

    <link rel="stylesheet" href="<?= asset('css/styles.css') ?>?v=8">
    <link rel="stylesheet" href="<?= asset('css/hero.css') ?>?v=3">
    <link rel="stylesheet" href="<?= asset('css/catalog.css') ?>?v=19">
    <link rel="stylesheet" href="<?= asset('css/commerce.css') ?>?v=7">

    <script defer src="<?= asset('js/jquery-3.7.1.min.js') ?>"></script>
    <script defer src="<?= asset('js/core.js') ?>?v=6"></script>
    <script defer src="<?= asset('js/catalog.js') ?>?v=18"></script>
    <script defer src="<?= asset('js/commerce.js') ?>?v=4"></script>
    <script defer src="<?= asset('js/routine.js') ?>?v=6"></script>
    <script defer src="<?= asset('js/hero.js') ?>?v=3"></script>
    <script defer src="<?= asset('js/app.js') ?>?v=11"></script>
</head>

<body>
    <a class="skip-link" href="#main-content">Skip to content</a>

    <header class="site-header">
        <div class="header-inner container">
            <button class="icon-button mobile-menu-toggle" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-navigation" data-icon="menu"></button>
            <a href="#home" class="brand" aria-label="LIVA home">
                <span>LIVA</span>
                <svg viewBox="0 0 130 16" aria-hidden="true">
                    <path d="M3 13C35-12 80 29 127 1C83 39 39-1 3 13Z" fill="currentColor" />
                </svg>
            </a>
            <nav class="desktop-nav" aria-label="Main navigation">
                <a href="#home" data-nav="home" data-i18n="home">Home</a>
                <a href="#shop" data-nav="shop" data-i18n="shopAll">Shop all</a>
                <a href="#shop?promo=new-arrival" data-nav="new-arrival" data-i18n="newArrivals">New Arrivals</a>
                <a href="#shop?promo=best-seller" data-nav="best-seller" data-i18n="bestSellers">Best Sellers</a>
                <a href="#shop?promo=on-sale" data-nav="promotion" data-i18n="promotions">Promotions</a>
                <a href="#routine" data-nav="routine">
                    <span data-i18n="buildYourShelf">Build your shelf</span> <span aria-hidden="true">↗</span>
                </a>
                <a href="#about" data-nav="about" data-i18n="aboutLiva">About LIVA</a>
            </nav>
            <div class="header-actions">
                <div class="header-lang-switch" role="group" aria-label="Language selection">
                    <button type="button" class="lang-toggle-btn active" data-lang="en" aria-label="English">EN</button>
                    <button type="button" class="lang-toggle-btn" data-lang="km" aria-label="ភាសាខ្មែរ">ខ្មែរ</button>
                </div>
                <button class="icon-button search-toggle" aria-label="Search products" aria-expanded="false" aria-controls="site-search" data-icon="search"></button>
                <a class="icon-button account-link" href="#account" aria-label="My account" data-icon="user"></a>
                <a class="icon-button wishlist-link" href="#wishlist" aria-label="Saved products">
                    <span data-icon="heart"></span>
                    <span class="wishlist-count count-badge" hidden>0</span>
                </a>
                <button class="bag-toggle" aria-label="Shopping bag">
                    <span data-icon="bag"></span>
                    <span class="bag-label" data-i18n="bag">Bag</span>
                    <span class="bag-count">0</span>
                </button>
            </div>
        </div>

        <?php if (file_exists(__DIR__.'/partials/mobile-nav.blade.php')) {
            // Render mobile navigation
            include __DIR__.'/partials/mobile-nav.blade.php';
        } ?>

        <div id="site-search" class="header-search" hidden>
            <form id="search-form" class="container" role="search">
                <span data-icon="search"></span>
                <input type="search" id="header-search-input" name="q" placeholder="Shampoo, body wash, a little of both…" aria-label="Search products">
                <button class="text-link" type="submit">Search <span aria-hidden="true">→</span></button>
                <button type="button" class="icon-button search-toggle" aria-label="Close search" data-icon="close"></button>
            </form>
            <p class="container">Explore by <a href="#shop?category=hair">hair</a>, <a href="#shop?category=body">body</a> or <a href="#shop?category=sets">sets</a>.</p>
        </div>
    </header>

    <main id="main-content" tabindex="-1">
        <div id="app"></div>
    </main>

    <?php if (file_exists(__DIR__.'/partials/footer.blade.php')) {
        include __DIR__.'/partials/footer.blade.php';
    } ?>

    <?php if (file_exists(__DIR__.'/partials/floating-social.blade.php')) {
        include __DIR__.'/partials/floating-social.blade.php';
    } ?>

    <div id="overlay" class="overlay"></div>
    <aside id="cart-drawer" class="cart-drawer" aria-label="Shopping bag" aria-hidden="true"></aside>
    <div id="toast" class="toast" role="status" aria-live="polite"></div>

    <noscript>
        <p class="empty-state">Please enable JavaScript to explore the LIVA shopping prototype.</p>
    </noscript>
</body>

</html>
