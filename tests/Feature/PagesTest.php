<?php

namespace Tests\Feature;

use Tests\TestCase;

class PagesTest extends TestCase
{
    /**
     * Test all primary storefront pages return 200.
     */
    public function test_storefront_pages_render_successfully(): void
    {
        $urls = [
            '/',
            '/shop',
            '/shop/category/hair',
            '/product/conditioner',
            '/routine',
            '/about',
            '/contact',
            '/shipping',
            '/privacy',
            '/terms',
            '/account',
            '/tracking',
            '/wishlist',
            '/compare',
            '/checkout',
        ];

        foreach ($urls as $url) {
            $response = $this->get($url);
            $response->assertStatus(200);
            $response->assertSee('floating-social');
            $response->assertSee('floating-social-telegram');
            $response->assertSee('floating-social-facebook');
            $response->assertSee('floating-social-tiktok');
            $response->assertSee('footer-payment-support');
            $response->assertSee('Support KH QR');
            $response->assertSee('khqr.png');
        }
    }

    /**
     * Test shop page displays product card elements.
     */
    public function test_shop_page_contains_product_cards(): void
    {
        $response = $this->get('/shop');
        $response->assertStatus(200);
        $response->assertSee('product-card');
        $response->assertSee('SilkSkin Conditioner');
        $response->assertSee('cat-card-img-primary');
        $response->assertSee('cat-card-img-hover');
    }

    /**
     * Test header navigation contains promotional links and filters products.
     */
    public function test_header_navigation_and_promo_filtering(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('New Arrivals');
        $response->assertSee('Best Sellers');
        $response->assertSee('Promotions');

        $promoResponse = $this->get('/shop?promo=new-arrival');
        $promoResponse->assertStatus(200);
        $promoResponse->assertViewHas('selectedPromo', 'new-arrival');

        $bestSellerResponse = $this->get('/shop?promo=best-seller');
        $bestSellerResponse->assertStatus(200);
        $bestSellerResponse->assertSee('data-nav="best-seller" data-i18n="bestSellers" class="active"', false);
        $bestSellerResponse->assertDontSee('data-nav="shop" data-i18n="shopAll" class="active"', false);
    }

    /**
     * Test product page displays product details without real results section, with video reels and related products.
     */
    public function test_product_page_displays_product_details(): void
    {
        $response = $this->get('/product/shampoo');
        $response->assertStatus(200);
        $response->assertSee('cat-product-detail');
        $response->assertSee('SilkSculpt Shampoo');
        $response->assertSee('cat-detail-share');
        $response->assertSee('cat-product-actions');
        $response->assertDontSee('cat-product-results');
        $response->assertDontSee('REAL RESULTS');
        $response->assertSee('cat-product-videos');
        $response->assertSee('media/videos/video-1.mp4');
        $response->assertSee('media/videos/video-2.mp4');
        $response->assertSee('media/videos/video-3.mp4');
        $response->assertSee('media/videos/video-4.mp4');
        $response->assertSee('cat-related');
        $response->assertSee('CONTINUE EXPLORING');
        $response->assertSee('More in Hair Care');
    }

    /**
     * Test home controller supplies demo data to home view.
     */
    public function test_home_controller_supplies_demo_data(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewHas('categoryCards');
        $response->assertViewHas('hairProducts');
        $response->assertViewHas('bodyProducts');
        $response->assertViewHas('setsProducts');
        $response->assertSee('SilkSculpt Shampoo');
        $response->assertSee('All products');
        $response->assertSee('campaign-hero');
        $response->assertSee('slide-1-poster.webp');
        $response->assertSee('banner-1.jpg');
        $response->assertSee('banner-2.jpg');
    }

    /**
     * Test routine controller supplies shelf items to routine view.
     */
    public function test_routine_controller_supplies_shelf_items(): void
    {
        $response = $this->get('/routine');
        $response->assertStatus(200);
        $response->assertViewHas('hairItems');
        $response->assertViewHas('bodyItems');
        $response->assertViewHas('shelfIds');
        $response->assertSee('Build your shelf');
    }

    /**
     * Test contact controller supplies faqs to contact view.
     */
    public function test_contact_controller_supplies_faqs(): void
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response->assertViewHas('faqs');
        $response->assertSee('Can I buy products here?');
    }

    /**
     * Test account page renders authentication card, sign in and create profile mode buttons.
     */
    public function test_account_page_renders_auth_card_and_mode_buttons(): void
    {
        $response = $this->get('/account');
        $response->assertStatus(200);
        $response->assertSee('commerce-account-page');
        $response->assertSee('commerce-auth-card');
        $response->assertSee('commerce-account-mode');
        $response->assertSee('data-mode="signin"', false);
        $response->assertSee('data-mode="register"', false);
        $response->assertSee('commerce-login-form');
        $response->assertSee('commerce-name');
        $response->assertSee('commerce-email');
        $response->assertSee('commerce-phone');
    }

    /**
     * Test search modal markup and search query handling in catalog.
     */
    public function test_search_modal_and_query_filtering(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('site-search');
        $response->assertSee('search-capsule');
        $response->assertSee('header-search-input');
        $response->assertSee('header-search-clear');
        $response->assertSee('search-live-results');

        // Test search query on shop
        $searchResponse = $this->get('/shop?q=conditioner');
        $searchResponse->assertStatus(200);
        $searchResponse->assertSee('SilkSkin Conditioner');
        $searchResponse->assertViewHas('searchQuery', 'conditioner');
    }

    /**
     * Test checkout page renders correctly with container and data attributes.
     */
    public function test_checkout_page_renders_successfully(): void
    {
        $response = $this->get('/checkout');
        $response->assertStatus(200);
        $response->assertSee('data-page="checkout"', false);
        $response->assertSee('commerce-page container', false);
        $response->assertSee('commerce-heading');
        $response->assertSee('Checkout');
        $response->assertSee('Back to the collection');
        $response->assertSee('cart-drawer');
    }

    /**
     * Test home page displays video product reels above the footer.
     */
    public function test_home_page_displays_video_product_reels(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('cat-product-videos');
        $response->assertSee('cat-video-grid');
        $response->assertSee('media/videos/video-1.mp4');
    }

    /**
     * Test hero carousel has video on first slide and static banner images with text overlays on next slides.
     */
    public function test_hero_carousel_has_video_first_and_image_next(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('logovideo.mp4');
        $response->assertDontSee('slide-1-everyday.mp4');
        $response->assertDontSee('slide-2-hair-pair.mp4');
        $response->assertSee('banner-1.jpg');
        $response->assertSee('banner-2.jpg');
        $response->assertSee('Good things');
        $response->assertSee('A little time');
    }

    /**
     * Test checkout fields include name, phone, address, province, and note, and footer supports KHQR and ABA.
     */
    public function test_checkout_fields_and_footer_aba_support(): void
    {
        $response = $this->get('/checkout');
        $response->assertStatus(200);
        $response->assertSee('commerce.js');
        $response->assertSee('commerce.css');
        $response->assertSee('commerce-add-demo-btn');

        $commerceJs = file_get_contents(public_path('js/commerce.js'));
        $this->assertStringContainsString('Full name', $commerceJs);
        $this->assertStringContainsString('Phone number', $commerceJs);
        $this->assertStringContainsString('Delivery address', $commerceJs);
        $this->assertStringContainsString('City / province', $commerceJs);
        $this->assertStringContainsString('Delivery note', $commerceJs);
        $this->assertStringContainsString('commerce-location-pin-btn', $commerceJs);
        $this->assertStringContainsString('commerce-map-modal', $commerceJs);
        $this->assertStringContainsString('commerce-map-locate-btn', $commerceJs);
        $this->assertStringContainsString('getCurrentPosition', $commerceJs);
        $this->assertStringContainsString('data-pay="cod"', $commerceJs);
        $this->assertStringContainsString('data-pay="transfer"', $commerceJs);
        $this->assertStringNotContainsString('data-pay="card"', $commerceJs);

        $response->assertSee('leaflet.css');
        $response->assertSee('leaflet.js');

        $footerResponse = $this->get('/');
        $footerResponse->assertStatus(200);
        $footerResponse->assertSee('img/aba.png');
        $footerResponse->assertSee('img/khqr.png');

        $indexHtml = file_get_contents(base_path('index.html'));
        $this->assertStringContainsString('aba.png', $indexHtml);
        $this->assertStringContainsString('khqr.png', $indexHtml);
        $this->assertStringContainsString('leaflet.css', $indexHtml);
        $this->assertStringContainsString('leaflet.js', $indexHtml);
    }

    /**
     * Test announcement bar and sticky header wrapper render properly on storefront and static deploy.
     */
    public function test_announcement_bar_and_sticky_header_render_successfully(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('site-header-sticky-wrapper');
        $response->assertSee('announcement-bar');
        $response->assertSee('announcement-inner');
        $response->assertSee('timer');

        $indexHtml = file_get_contents(base_path('index.html'));
        $this->assertStringContainsString('site-header-sticky-wrapper', $indexHtml);
        $this->assertStringContainsString('announcement-bar', $indexHtml);
        $this->assertStringContainsString('announcement-inner container', $indexHtml);
        $this->assertStringContainsString('id="timer"', $indexHtml);

        $stylesCss = file_get_contents(public_path('css/styles.css'));
        $this->assertStringContainsString('.site-header-sticky-wrapper{position:sticky;top:0', $stylesCss);
        $this->assertStringContainsString('.announcement-bar', $stylesCss);
        $this->assertStringContainsString('.announcement-inner', $stylesCss);
    }
}
