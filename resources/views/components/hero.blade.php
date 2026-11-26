<section class="campaign-hero" id="liva-campaign" role="region" aria-roledescription="carousel" aria-label="LIVA collection stories" data-theme="dark" style="--hero-progress:0">
    <div class="campaign-stage">
        <!-- Slide 01: Everyday -->
        <article class="campaign-slide is-active" data-slide="0" data-theme="dark" role="group" aria-roledescription="slide" aria-label="1 of 3: Everyday" aria-hidden="false">
            <div class="campaign-media">
                <video class="campaign-video is-playing" autoplay muted playsinline loop preload="auto" src="{{ asset('assets/logovideo.mp4') }}" aria-hidden="true" tabindex="-1" disablepictureinpicture>
                    <source src="{{ asset('assets/logovideo.mp4') }}" type="video/mp4">
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

        <!-- Slide 02: The hair pair -->
        <article class="campaign-slide" data-slide="1" data-theme="light" role="group" aria-roledescription="slide" aria-label="2 of 3: The hair pair" inert aria-hidden="true">
            <div class="campaign-media">
                <img class="campaign-poster" src="{{ asset('assets/campaign/banner-1.jpg') }}" alt="LIVA shampoo, conditioner and bath cream on stone surface" width="1280" height="720" loading="lazy" decoding="async">
            </div>
            <div class="campaign-copy">
                <p class="campaign-eyebrow">THE HAIR PAIR</p>
                <h2 class="campaign-title">Good things<br>come <em>in pairs.</em></h2>
                <p class="campaign-description">Shampoo &amp; conditioner.<br> Two essentials, one place to begin.</p>
                <a class="btn campaign-cta" href="{{ route('product.show', 'ritual-duo') }}">Discover the pair <x-icon name="arrow" /></a>
                <span class="campaign-note">2 × 250 mL · $38.00 · Sample collection</span>
            </div>
        </article>

        <!-- Slide 03: Your moment -->
        <article class="campaign-slide" data-slide="2" data-theme="dark" role="group" aria-roledescription="slide" aria-label="3 of 3: Your moment" inert aria-hidden="true">
            <div class="campaign-media">
                <img class="campaign-poster" src="{{ asset('assets/campaign/banner-2.jpg') }}" alt="LIVA shampoo on sunlit stone beside clear water" width="1280" height="720" loading="lazy" decoding="async">
            </div>
            <div class="campaign-copy">
                <p class="campaign-eyebrow">A MOMENT, JUST YOURS</p>
                <h2 class="campaign-title">A little time.<br><em>Entirely yours.</em></h2>
                <p class="campaign-description">Make room for the things<br> that belong in your everyday.</p>
                <a class="btn campaign-cta" href="{{ route('routine') }}">Build your shelf <x-icon name="arrow" /></a>
                <span class="campaign-note">CURATED BY YOU</span>
            </div>
        </article>
    </div>

    <div class="campaign-footer">
        <div class="campaign-pagination" role="group" aria-label="Choose a collection story">
            <button type="button" class="campaign-chapter" data-hero-go="0" aria-label="Show story 1: Everyday" aria-current="true">
                <span class="chapter-number" aria-hidden="true">01</span>
                <span class="chapter-name">Everyday</span>
                <span class="chapter-progress" aria-hidden="true"><span></span></span>
            </button>
            <button type="button" class="campaign-chapter" data-hero-go="1" aria-label="Show story 2: The hair pair">
                <span class="chapter-number" aria-hidden="true">02</span>
                <span class="chapter-name">The hair pair</span>
                <span class="chapter-progress" aria-hidden="true"><span></span></span>
            </button>
            <button type="button" class="campaign-chapter" data-hero-go="2" aria-label="Show story 3: Your moment">
                <span class="chapter-number" aria-hidden="true">03</span>
                <span class="chapter-name">Your moment</span>
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
