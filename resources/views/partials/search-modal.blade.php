<div id="site-search" class="header-search" hidden role="search" aria-label="Search products">
    <div class="search-modal-container">
        <!-- Main Search Form Capsule -->
        <form id="search-form" class="search-capsule" role="search" action="{{ route('shop') }}" method="GET">
            <div class="search-capsule-icon">
                <x-icon name="search" />
            </div>

            <input 
                type="search" 
                id="header-search-input" 
                name="q" 
                class="search-capsule-input" 
                placeholder="Search products, hair care, body care..." 
                aria-label="Search products" 
                autocomplete="off" 
                spellcheck="false"
            >

            <button type="button" id="header-search-clear" class="search-clear-btn" aria-label="Clear input" hidden>
                <x-icon name="close" />
            </button>

            <button class="search-capsule-submit" type="submit">
                <span class="search-submit-text" data-i18n="search">Search</span>
                <x-icon name="arrow" />
            </button>
        </form>

        <!-- Close Button -->
        <button type="button" class="icon-button search-close-btn search-toggle" aria-label="Close search">
            <x-icon name="close" />
        </button>
    </div>

    <!-- Live Instant Search Results (Only shown when typing) -->
    <div id="search-live-results" class="search-live-results container" hidden>
        <div class="search-results-grid" id="search-results-grid">
            <!-- Injected via JavaScript -->
        </div>
        <div class="search-results-footer" id="search-results-footer">
            <button type="submit" form="search-form" class="search-view-all-btn" id="search-view-all-btn">
                <span id="search-view-all-text" data-i18n="viewAllResults">View all matching products</span>
                <x-icon name="arrow" />
            </button>
        </div>
    </div>

    <!-- Empty State (Only shown when query has no matches) -->
    <div id="search-empty-state" class="search-empty-state container" hidden>
        <p class="search-empty-title" data-i18n="noProductsFound">No matching products found</p>
    </div>
</div>
