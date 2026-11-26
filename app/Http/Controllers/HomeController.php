<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the storefront home page.
     */
    public function index(): View
    {
        $categories = Product::CATEGORIES;

        $categoryCards = [
            [
                'title' => 'Hair',
                'description' => 'Shampoo, conditioner & more',
                'image' => 'assets/conditioner.webp',
                'category' => 'hair',
                'url' => route('shop', ['category' => 'hair']),
            ],
            [
                'title' => 'Body',
                'description' => 'From your shower to your shelf',
                'image' => 'assets/body-wash.webp',
                'category' => 'body',
                'url' => route('shop', ['category' => 'body']),
            ],
            [
                'title' => 'Sets',
                'description' => 'A few things, together',
                'image' => 'assets/ritual-duo.webp',
                'category' => 'sets',
                'url' => route('shop', ['category' => 'sets']),
            ],

        ];

        $hairProducts = Product::whereCategory('hair')->take(6);
        $bodyProducts = Product::whereCategory('body')->take(6);
        $setsProducts = Product::whereCategory('sets')->take(6);

        return view('pages.home', [
            'categories' => $categories,
            'categoryCards' => $categoryCards,
            'hairProducts' => $hairProducts,
            'bodyProducts' => $bodyProducts,
            'setsProducts' => $setsProducts,
        ]);
    }
}
