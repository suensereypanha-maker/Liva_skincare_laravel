<aside class="commerce-profile-sidebar liva-profile-sidebar" aria-label="Profile navigation">
    <div class="liva-profile-avatar-wrap">
        <div class="commerce-avatar liva-profile-avatar" id="liva-sidebar-avatar">L</div>
        <span class="liva-profile-status-dot" title="Active session"></span>
    </div>

    <h2 id="liva-sidebar-name">LIVA Member</h2>
    <p id="liva-sidebar-contact">—</p>
    <span class="commerce-profile-label liva-profile-provider-badge" id="liva-sidebar-provider">LOCAL DEMO PROFILE</span>

    <nav class="liva-profile-nav" aria-label="Profile sections">
        <button type="button" class="liva-profile-tab {{ $activeTab === 'overview' ? 'is-active' : '' }}" data-profile-tab="overview">
            <x-icon name="user" />
            <span>Overview</span>
            <x-icon name="arrow" />
        </button>
        <button type="button" class="liva-profile-tab {{ $activeTab === 'details' ? 'is-active' : '' }}" data-profile-tab="details">
            <x-icon name="leaf" />
            <span>Personal details</span>
            <x-icon name="arrow" />
        </button>
        <button type="button" class="liva-profile-tab {{ $activeTab === 'orders' ? 'is-active' : '' }}" data-profile-tab="orders">
            <x-icon name="bag" />
            <span>Order history</span>
            <span class="liva-tab-count" id="liva-sidebar-orders-count">0</span>
        </button>
    </nav>

    <div class="liva-profile-shortcuts">
        <a href="{{ route('wishlist') }}">
            <x-icon name="heart" />
            <span data-i18n="yourFavourites">{{ __('storefront.yourFavourites') ?? 'Saved favourites' }}</span>
            <x-icon name="arrow" />
        </a>
        <a href="{{ route('tracking') }}">
            <x-icon name="truck" />
            <span data-i18n="trackOrder">{{ __('storefront.trackOrder') ?? 'Track an order' }}</span>
            <x-icon name="arrow" />
        </a>
    </div>

    <button type="button" class="commerce-logout liva-profile-signout" id="liva-profile-logout" data-i18n="signOut">
        {{ __('storefront.signOut') ?? 'Sign out' }}
    </button>
</aside>
