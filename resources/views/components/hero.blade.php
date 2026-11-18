<section class="campaign-hero" id="liva-campaign" role="region" aria-roledescription="carousel" aria-label="LIVA collection stories" data-theme="dark" style="--hero-progress:0">
    <div class="campaign-stage">
        <!-- Slide 01: Everyday -->
        <article class="campaign-slide is-active" data-slide="0" data-theme="dark" role="group" aria-roledescription="slide" aria-label="1 of 3: Everyday" aria-hidden="false">
            <div class="campaign-media">
                <img class="campaign-poster" src="{{ asset('assets/campaign/slide-1-poster.webp') }}" alt="LIVA hair and body essentials in warm, sculptural light" width="1280" height="720" fetchpriority="high" loading="eager" decoding="async">
                <video class="campaign-video is-playing" autoplay muted playsinline loop preload="auto" src="{{ asset('assets/campaign/slide-1-everyday.mp4') }}" poster="{{ asset('assets/campaign/slide-1-poster.webp') }}" aria-hidden="true" tabindex="-1" disablepictureinpicture>
                    <source src="{{ asset('assets/campaign/slide-1-everyday.mp4') }}" type="video/mp4">
                </video>
            </div>
            <div class="campaign-copy">
                <p class="campaign-eyebrow">THE LIVA DAILY EDIT</p>
                <h1 class="campaign-title">The art of<br><em>the everyday.</em></h1>
                <p class="campaign-description">Hair and body essentials.<br> A little space for yourself.</p>
                <a class="btn campaign-cta" href="{{ route('shop') }}">Shop the collection <x-icon name="arrow" /></a>
                <span class="campaign-note">HAIR + BODY CARE</span>
            </div>
        </article>

        <!-- Slide 02: Natural Glow Banner -->
        <article class="campaign-slide is-banner" data-slide="1" data-theme="light" role="group" aria-roledescription="slide" aria-label="2 of 3: Natural Glow" inert aria-hidden="true">
            <div class="campaign-media">
                <img class="campaign-poster" src="{{ asset('assets/campaign/banner-1.jpg') }}" alt="LIVA Skincare - Healthy Skin, Natural Glow" width="1024" height="576" loading="lazy" decoding="async">
            </div>
            <a href="{{ route('shop') }}" class="campaign-banner-link" aria-label="Shop LIVA Skincare - Healthy Skin, Natural Glow"></a>
        </article>

        <!-- Slide 03: Natural Beauty Banner -->
        <article class="campaign-slide is-banner" data-slide="2" data-theme="light" role="group" aria-roledescription="slide" aria-label="3 of 3: Natural Beauty" inert aria-hidden="true">
            <div class="campaign-media">
                <img class="campaign-poster" src="{{ asset('assets/campaign/banner-2.jpg') }}" alt="LIVA Skincare - Reveal Your Natural Beauty" width="1024" height="576" loading="lazy" decoding="async">
            </div>
            <a href="{{ route('shop') }}" class="campaign-banner-link" aria-label="Shop LIVA Skincare - Reveal Your Natural Beauty"></a>
        </article>
    </div>

    <div class="campaign-footer">
        <div class="campaign-pagination" role="group" aria-label="Choose a collection story">
            <button type="button" class="campaign-chapter" data-hero-go="0" aria-label="Show story 1: Everyday" aria-current="true">
                <span class="chapter-number" aria-hidden="true">01</span>
                <span class="chapter-name">Everyday</span>
                <span class="chapter-progress" aria-hidden="true"><span></span></span>
            </button>
            <button type="button" class="campaign-chapter" data-hero-go="1" aria-label="Show story 2: Natural Glow">
                <span class="chapter-number" aria-hidden="true">02</span>
                <span class="chapter-name">Natural Glow</span>
                <span class="chapter-progress" aria-hidden="true"><span></span></span>
            </button>
            <button type="button" class="campaign-chapter" data-hero-go="2" aria-label="Show story 3: Natural Beauty">
                <span class="chapter-number" aria-hidden="true">03</span>
                <span class="chapter-name">Natural Beauty</span>
                <span class="chapter-progress" aria-hidden="true"><span></span></span>
            </button>
        </div>
        <div class="campaign-controls">
            <span class="campaign-counter" aria-hidden="true">01 / 03</span>
            <button type="button" class="campaign-arrow" data-hero-prev aria-label="Previous story"><x-icon name="arrow" /></button>
            <button type="button" class="campaign-arrow" data-hero-next aria-label="Next story"><x-icon name="arrow" /></button>
            <button type="button" class="campaign-motion" data-hero-motion aria-label="Pause slideshow and video">
                <svg class="icon campaign-pause-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 5v14M15 5v14"/></svg>
                <svg class="icon campaign-play-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m8 5 11 7-11 7Z"/></svg>
                <span>Pause</span>
            </button>
        </div>
    </div>
    <p class="campaign-status sr-only" role="status" aria-atomic="true"></p>
</section>
