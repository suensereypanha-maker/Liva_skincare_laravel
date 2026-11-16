<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Display the About LIVA page.
     */
    public function about(): View
    {
        return view('pages.about');
    }

    /**
     * Display the Help & Contact page with FAQs.
     */
    public function contact(): View
    {
        $faqs = [
            [
                'question' => 'Can I buy products here?',
                'answer' => 'This storefront is a design preview. Prices and sizes are illustrative. Checkout saves a demo order on your device and does not create a purchase.',
            ],
            [
                'question' => 'What are the delivery and returns policies?',
                'answer' => 'Delivery fees, delivery coverage, timing and returns terms have not been supplied. No delivery is arranged through this preview.',
            ],
            [
                'question' => 'How does the payment preview work?',
                'answer' => 'Cash on delivery and ABA transfer are example selections. There is no payment connection, no active payment code and no money is collected.',
            ],
            [
                'question' => 'Where can I find product information?',
                'answer' => 'The collection shows sample products. Verified ingredients, instructions, benefits and certifications have not been supplied.',
            ],
            [
                'question' => 'Can I add a previous order again?',
                'answer' => 'Open a saved demo order or your account history and choose Add again. Available products are added to your existing bag at current illustrative prices so you can review them.',
            ],
        ];

        return view('pages.contact', [
            'faqs' => $faqs,
        ]);
    }

    /**
     * Display Delivery & Returns policy page.
     */
    public function shipping(): View
    {
        return view('pages.shipping');
    }

    /**
     * Display Privacy policy page.
     */
    public function privacy(): View
    {
        return view('pages.privacy');
    }

    /**
     * Display Terms & Conditions page.
     */
    public function terms(): View
    {
        return view('pages.terms');
    }

    /**
     * Display Wishlist / Saved items page.
     */
    public function wishlist(): View
    {
        return view('pages.wishlist');
    }

    /**
     * Display Compare products page.
     */
    public function compare(): View
    {
        return view('pages.compare');
    }

    /**
     * Display Customer account & profile page.
     */
    public function account(): View
    {
        return view('pages.account');
    }

    /**
     * Display Order tracking page.
     */
    public function tracking(Request $request): View
    {
        return view('pages.tracking', [
            'orderNumber' => $request->query('order'),
        ]);
    }
}
