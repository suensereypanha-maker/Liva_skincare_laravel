<nav id="mobile-navigation" class="mobile-nav" aria-label="Mobile navigation" hidden>
    <!-- Language Selection Bar -->
    <div class="mobile-nav-lang-bar">
        <span class="mobile-nav-lang-label" data-i18n="language">Language / ភាសា</span>
        <div class="mobile-nav-lang-toggle" role="group" aria-label="Language selection">
            <button type="button" class="mobile-lang-btn {{ app()->getLocale() === 'km' ? '' : 'active' }}" data-lang="en">EN</button>
            <button type="button" class="mobile-lang-btn {{ app()->getLocale() === 'km' ? 'active' : '' }}" data-lang="km">ខ្មែរ</button>
        </div>
    </div>

    <!-- Quick Search Bar -->
    <div class="mobile-nav-search-bar">
        <form class="mobile-nav-search-form" role="search" action="{{ route('shop') }}" method="GET">
            <span class="mobile-nav-search-icon" data-icon="search"></span>
            <input type="search" name="q" class="mobile-nav-search-input" placeholder="Search products, rituals…" aria-label="Search collection">
            <button type="submit" class="mobile-nav-search-submit" aria-label="Submit search">
                <span data-icon="arrow"></span>
            </button>
        </form>
    </div>

    <!-- Collection Categories Section -->
    <div class="mobile-nav-section">
        <span class="mobile-nav-eyebrow" data-i18n="theCollection">The Collection</span>
        <div class="mobile-nav-links">
            <a href="{{ route('home') }}" class="mobile-nav-link">
                <span class="mobile-nav-link-text" data-i18n="home">Home</span>
                <span class="mobile-nav-pill">✦</span>
            </a>
            <a href="{{ route('shop') }}" class="mobile-nav-link">
                <span class="mobile-nav-link-text" data-i18n="shopAll">Shop all</span>
                <span class="mobile-nav-pill">18</span>
            </a>
            <a href="{{ route('shop', ['promo' => 'new-arrival']) }}" class="mobile-nav-link">
                <span class="mobile-nav-link-text" data-i18n="newArrivals">New Arrivals</span>
                <span class="mobile-nav-pill">04</span>
            </a>
            <a href="{{ route('shop', ['promo' => 'best-seller']) }}" class="mobile-nav-link">
                <span class="mobile-nav-link-text" data-i18n="bestSellers">Best Sellers</span>
                <span class="mobile-nav-pill">10</span>
            </a>
            <a href="{{ route('shop', ['promo' => 'on-sale']) }}" class="mobile-nav-link">
                <span class="mobile-nav-link-text" data-i18n="promotions">Promotions</span>
                <span class="mobile-nav-pill">15</span>
            </a>
            <a href="{{ route('shop', ['category' => 'skin-care']) }}" class="mobile-nav-link">
                <span class="mobile-nav-link-text" data-i18n="skinCare">Skin Care</span>
                <span class="mobile-nav-pill">04</span>
            </a>
            <a href="{{ route('shop', ['category' => 'hair']) }}" class="mobile-nav-link">
                <span class="mobile-nav-link-text" data-i18n="hairCare">Hair Care</span>
                <span class="mobile-nav-pill">03</span>
            </a>
            <a href="{{ route('shop', ['category' => 'body']) }}" class="mobile-nav-link">
                <span class="mobile-nav-link-text" data-i18n="bodyCare">Body Care</span>
                <span class="mobile-nav-pill">05</span>
            </a>
            <a href="{{ route('shop', ['category' => 'makeup']) }}" class="mobile-nav-link">
                <span class="mobile-nav-link-text" data-i18n="makeup">Makeup</span>
                <span class="mobile-nav-pill">02</span>
            </a>
            <a href="{{ route('shop', ['category' => 'fragrances']) }}" class="mobile-nav-link">
                <span class="mobile-nav-link-text" data-i18n="fragrances">Fragrances</span>
                <span class="mobile-nav-pill">01</span>
            </a>
            <a href="{{ route('shop', ['category' => 'nail-care']) }}" class="mobile-nav-link">
                <span class="mobile-nav-link-text" data-i18n="nailCare">Nail Care</span>
                <span class="mobile-nav-pill">01</span>
            </a>
            <a href="{{ route('shop', ['category' => 'sets']) }}" class="mobile-nav-link">
                <span class="mobile-nav-link-text" data-i18n="setsAndRituals">Sets & Rituals</span>
                <span class="mobile-nav-pill">02</span>
            </a>
        </div>
    </div>

    <!-- Experience & Curated Section -->
    <div class="mobile-nav-section">
        <span class="mobile-nav-eyebrow" data-i18n="experiences">Experiences</span>
        <div class="mobile-nav-cards">
            <a href="{{ route('routine') }}" class="mobile-nav-feature-card">
                <div class="mobile-nav-feature-icon" data-icon="leaf"></div>
                <div class="mobile-nav-feature-body">
                    <strong data-i18n="buildYourShelf">Build your shelf</strong>
                    <span data-i18n="customRoutine">Curate a personalised daily ritual ↗</span>
                </div>
            </a>
            <a href="{{ route('wishlist') }}" class="mobile-nav-feature-card">
                <div class="mobile-nav-feature-icon" data-icon="heart"></div>
                <div class="mobile-nav-feature-body">
                    <strong data-i18n="savedProducts">Saved products</strong>
                    <span data-i18n="viewSaved">View items saved to your wishlist</span>
                </div>
                <span class="wishlist-count count-badge" hidden>0</span>
            </a>
        </div>
    </div>

    <!-- Client Services & Account -->
    <div class="mobile-nav-section">
        <span class="mobile-nav-eyebrow" data-i18n="accountCare">Account & Care</span>
        <div class="mobile-nav-grid">
            <a href="{{ route('login') }}" class="mobile-nav-sublink" id="liva-mobile-account-link" data-profile-url="{{ route('profile') }}" data-login-url="{{ route('login') }}">
                <span data-icon="user"></span>
                <span id="liva-mobile-account-label" data-i18n="signIn">{{ __('storefront.signIn') ?? 'Sign in' }}</span>
            </a>
            <a href="{{ route('tracking') }}" class="mobile-nav-sublink">
                <span data-icon="truck"></span>
                <span data-i18n="trackOrder">Track order</span>
            </a>
            <a href="{{ route('about') }}" class="mobile-nav-sublink">
                <span data-icon="sun"></span>
                <span data-i18n="aboutLiva">About LIVA</span>
            </a>
            <a href="{{ route('contact') }}" class="mobile-nav-sublink">
                <span data-icon="support"></span>
                <span data-i18n="helpContact">Help & contact</span>
            </a>
        </div>
    </div>

    <!-- Menu Footer Tagline -->
    <div class="mobile-nav-footer">
        <p class="mobile-nav-tagline">Care is personal. Personally yours.</p>
        <span class="mobile-nav-badge">LIVA © {{ date('Y') }}</span>
    </div>
</nav>
