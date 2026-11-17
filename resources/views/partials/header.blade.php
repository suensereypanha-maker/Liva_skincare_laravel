<header class="site-header">
    <div class="header-inner container">
        <button class="icon-button mobile-menu-toggle" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-navigation" data-icon="menu"></button>
        
        <a href="{{ route('home') }}" class="brand" aria-label="LIVA home">
            <span>LIVA</span>
            <svg viewBox="0 0 130 16" aria-hidden="true">
                <path d="M3 13C35-12 80 29 127 1C83 39 39-1 3 13Z" fill="currentColor" />
            </svg>
        </a>

        <nav class="desktop-nav" aria-label="Main navigation">
            <a href="{{ route('home') }}" data-nav="home" data-i18n="home" class="{{ request()->routeIs('home') ? 'active' : '' }}" {{ request()->routeIs('home') ? 'aria-current=page' : '' }}>Home</a>
            <a href="{{ route('shop') }}" data-nav="shop" data-i18n="shopAll" class="{{ request()->routeIs('shop*') && !request('category') && !request('promo') ? 'active' : '' }}" {{ request()->routeIs('shop*') && !request('category') && !request('promo') ? 'aria-current=page' : '' }}>Shop all</a>
            <a href="{{ route('shop', ['promo' => 'new-arrival']) }}" data-nav="new-arrival" data-i18n="newArrivals" class="{{ request('promo') === 'new-arrival' ? 'active' : '' }}" {{ request('promo') === 'new-arrival' ? 'aria-current=page' : '' }}>New Arrivals</a>
            <a href="{{ route('shop', ['promo' => 'best-seller']) }}" data-nav="best-seller" data-i18n="bestSellers" class="{{ request('promo') === 'best-seller' ? 'active' : '' }}" {{ request('promo') === 'best-seller' ? 'aria-current=page' : '' }}>Best Sellers</a>
            <a href="{{ route('shop', ['promo' => 'on-sale']) }}" data-nav="promotion" data-i18n="promotions" class="{{ in_array(request('promo'), ['on-sale', 'promotion', 'promotions']) ? 'active' : '' }}" {{ in_array(request('promo'), ['on-sale', 'promotion', 'promotions']) ? 'aria-current=page' : '' }}>Promotions</a>
            <a href="{{ route('routine') }}" data-nav="routine" class="{{ request()->routeIs('routine') ? 'active' : '' }}" {{ request()->routeIs('routine') ? 'aria-current=page' : '' }}>
                <span data-i18n="buildYourShelf">Build your shelf</span>
                <span aria-hidden="true">↗</span>
            </a>
            <a href="{{ route('about') }}" data-nav="about" data-i18n="aboutLiva" class="{{ request()->routeIs('about') ? 'active' : '' }}" {{ request()->routeIs('about') ? 'aria-current=page' : '' }}>About LIVA</a>
        </nav>

        <div class="header-actions">
            <div class="header-lang-switch" role="group" aria-label="Language selection">
                <button type="button" class="lang-toggle-btn {{ app()->getLocale() === 'km' ? '' : 'active' }}" data-lang="en" aria-label="English">EN</button>
                <button type="button" class="lang-toggle-btn {{ app()->getLocale() === 'km' ? 'active' : '' }}" data-lang="km" aria-label="ភាសាខ្មែរ">ខ្មែរ</button>
            </div>

            <button class="icon-button search-toggle" aria-label="Search products" aria-expanded="false" aria-controls="site-search" data-icon="search"></button>
            
            <a class="icon-button account-link {{ request()->routeIs('account*') ? 'active' : '' }}" href="{{ route('account') }}" aria-label="My account" data-icon="user"></a>
            
            <a class="icon-button wishlist-link {{ request()->routeIs('wishlist') ? 'active' : '' }}" href="{{ route('wishlist') }}" aria-label="Saved products">
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

    @include('partials.mobile-nav')
    @include('partials.search-modal')
</header>
