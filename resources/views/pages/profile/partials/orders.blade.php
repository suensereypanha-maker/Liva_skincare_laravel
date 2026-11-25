<div class="liva-profile-panel" data-profile-panel="orders" {{ $activeTab === 'orders' ? '' : 'hidden' }}>
    <section class="commerce-profile-section">
        <div class="commerce-profile-section-head">
            <h2>Order history</h2>
            <span id="liva-orders-badge">0 orders</span>
        </div>

        <div id="liva-profile-orders-list" class="commerce-order-history"></div>

        <div id="liva-profile-orders-empty" class="commerce-orders-empty">
            <x-icon name="bag" />
            <h3>No demo orders yet.</h3>
            <p>Once you place an order at checkout, it will appear here with quick repeat-order access.</p>
            <a href="{{ route('shop') }}" class="commerce-text-link">
                <span>Explore the collection</span>
                <x-icon name="arrow" />
            </a>
        </div>
    </section>
</div>
