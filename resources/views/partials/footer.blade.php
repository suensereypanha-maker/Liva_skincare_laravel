<footer class="site-footer">
    <div class="footer-top container">
        <a href="{{ route('home') }}" class="brand" aria-label="LIVA home">
            <span>LIVA</span>
            <svg viewBox="0 0 130 16" aria-hidden="true">
                <path d="M3 13C35-12 80 29 127 1C83 39 39-1 3 13Z" fill="currentColor" />
            </svg>
        </a>
        <p>Personal care.<br>Personally yours.</p>
        <a href="{{ route('shop') }}" class="footer-shop">
            Find your daily edit <span aria-hidden="true">↗</span>
        </a>
    </div>

    <div class="footer-main container">
        <div class="footer-intro">
            <span class="eyebrow">THE DAILY EDIT</span>
            <p>Hair. Body. Your everyday.<br>A little space for yourself.</p>
            <p class="footer-currency">USD $ · English</p>
        </div>
        <div>
            <h2>Shop</h2>
            <a href="{{ route('shop', ['category' => 'hair']) }}">Hair care</a>
            <a href="{{ route('shop', ['category' => 'body']) }}">Body care</a>
            <a href="{{ route('shop', ['category' => 'sets']) }}">Sets</a>
            <a href="{{ route('routine') }}">Build your shelf</a>
        </div>
        <div>
            <h2>Your LIVA</h2>
            <a href="{{ route('wishlist') }}">Saved products</a>
            <a href="{{ route('account') }}">Account & orders</a>
            <a href="{{ route('tracking') }}">Track an order</a>
            <a href="{{ route('compare') }}">Compare products</a>
        </div>
        <div>
            <h2>Good to know</h2>
            <a href="{{ route('about') }}">About LIVA</a>
            <a href="{{ route('contact') }}">Help & contact</a>
            <a href="{{ route('shipping') }}">Delivery & returns</a>
            <a href="{{ route('privacy') }}">Privacy</a>
        </div>
    </div>

    <div class="footer-bottom container">
        <span>© {{ date('Y') }} LIVA</span>
        <p>Collection preview · Product imagery, sizes and prices are illustrative.</p>
        <a href="{{ route('terms') }}">About this preview</a>
    </div>
</footer>
