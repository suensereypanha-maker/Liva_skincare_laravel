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
     * Test product page displays the real results section with community result cards.
     */
    public function test_product_page_displays_real_results_section(): void
    {
        $response = $this->get('/product/shampoo');
        $response->assertStatus(200);
        $response->assertSee('cat-product-results');
        $response->assertSee('REAL RESULTS');
        $response->assertSee('cat-results-stats');
        $response->assertSee('cat-results-grid');
        $response->assertSee('assets/result-1.webp');
        $response->assertSee('assets/result-2.webp');
        $response->assertSee('assets/result-3.webp');
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
}
