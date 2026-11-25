<div class="liva-profile-panel" data-profile-panel="overview" {{ $activeTab === 'overview' ? '' : 'hidden' }}>
    <div class="liva-profile-stats">
        <article class="liva-stat-card">
            <span class="liva-stat-icon"><x-icon name="heart" /></span>
            <div>
                <strong id="liva-stat-wishlist">0</strong>
                <span>Saved items</span>
            </div>
        </article>
        <article class="liva-stat-card">
            <span class="liva-stat-icon"><x-icon name="bag" /></span>
            <div>
                <strong id="liva-stat-orders">0</strong>
                <span>Orders placed</span>
            </div>
        </article>
        <article class="liva-stat-card">
            <span class="liva-stat-icon"><x-icon name="sparkle" /></span>
            <div>
                <strong id="liva-stat-skin">Normal</strong>
                <span>Skin profile</span>
            </div>
        </article>
        <article class="liva-stat-card">
            <span class="liva-stat-icon"><x-icon name="leaf" /></span>
            <div>
                <strong id="liva-stat-city">Phnom Penh</strong>
                <span>Delivery city</span>
            </div>
        </article>
    </div>

    <section class="commerce-profile-section liva-overview-card-group">
        <div class="commerce-profile-section-head">
            <h2>Account snapshot</h2>
            <button type="button" class="liva-inline-action" data-profile-tab-jump="details">Edit profile →</button>
        </div>

        <dl class="liva-profile-summary-grid">
            <div>
                <dt>Full name</dt>
                <dd id="liva-overview-name">—</dd>
            </div>
            <div>
                <dt>Email address</dt>
                <dd id="liva-overview-email">—</dd>
            </div>
            <div>
                <dt>Phone number</dt>
                <dd id="liva-overview-phone">—</dd>
            </div>
            <div>
                <dt>Delivery address</dt>
                <dd id="liva-overview-address">Not added yet</dd>
            </div>
            <div>
                <dt>Hair &amp; care focus</dt>
                <dd id="liva-overview-hair">Hydration &amp; Shine</dd>
            </div>
            <div>
                <dt>Member status</dt>
                <dd id="liva-overview-since">LIVA Preview Member</dd>
            </div>
        </dl>
    </section>

    <section class="commerce-profile-section">
        <div class="commerce-profile-section-head">
            <h2>Quick actions</h2>
            <span>Explore your LIVA edit</span>
        </div>

        <div class="liva-quick-actions-grid">
            <a href="{{ route('routine') }}" class="liva-quick-action-card">
                <span class="liva-qa-icon"><x-icon name="leaf" /></span>
                <div>
                    <strong>Build your shelf</strong>
                    <p>Curate a custom hair &amp; body care set.</p>
                </div>
                <x-icon name="arrow" />
            </a>
            <a href="{{ route('shop') }}" class="liva-quick-action-card">
                <span class="liva-qa-icon"><x-icon name="bag" /></span>
                <div>
                    <strong>Shop the collection</strong>
                    <p>Browse shampoo, conditioner &amp; body essentials.</p>
                </div>
                <x-icon name="arrow" />
            </a>
        </div>
    </section>
</div>
