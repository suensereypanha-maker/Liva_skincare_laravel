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
            <a href="{{ route('shop') }}" data-nav="shop" data-i18n="shopAll" class="{{ request()->routeIs('shop*') && !request('category') ? 'active' : '' }}">Shop all</a>
            <a href="{{ route('shop', ['category' => 'skin-care']) }}" data-i18n="skinCare" class="{{ request('category') === 'skin-care' ? 'active' : '' }}">Skin Care</a>
            <a href="{{ route('shop', ['category' => 'hair']) }}" data-i18n="hair" class="{{ request('category') === 'hair' ? 'active' : '' }}">Hair</a>
            <a href="{{ route('shop', ['category' => 'body']) }}" data-i18n="body" class="{{ request('category') === 'body' ? 'active' : '' }}">Body</a>
            <a href="{{ route('shop', ['category' => 'makeup']) }}" data-i18n="makeup" class="{{ request('category') === 'makeup' ? 'active' : '' }}">Makeup</a>
            <a href="{{ route('shop', ['category' => 'sets']) }}" data-i18n="sets" class="{{ request('category') === 'sets' ? 'active' : '' }}">Sets</a>
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
