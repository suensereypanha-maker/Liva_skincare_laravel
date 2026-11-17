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
        ];

        foreach ($urls as $url) {
            $response = $this->get($url);
            $response->assertStatus(200);
            $response->assertSee('floating-social');
            $response->assertSee('floating-social-telegram');
            $response->assertSee('floating-social-facebook');
            $response->assertSee('floating-social-tiktok');
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
}
