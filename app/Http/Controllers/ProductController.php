<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a specific product detail page.
     */
    public function show(string $slug): View
    {
        $product = Product::find($slug) ?? Product::all()->first();
        $cat = $product['category'] ?? 'hair';
        $categoryName = Product::categoryName($cat);

        $related = Product::whereCategory($cat)
            ->where('id', '!=', $product['id'])
            ->take(3);

        $productSizes = $product['sizes'] ?? [$product['size'] ?? '250 mL'];
        $productImages = $product['images'] ?? array_values(
            array_filter([$product['image'] ?? null, $product['hoverImage'] ?? null, 'assets/daily-edit-detail.webp'])
        );

        // Community Real Results study data by category
        $resultHeadline = 'Visible vitality from roots to ends.';
        $resultStats = [
            ['num' => '96%', 'text' => 'Noticeably softer texture & lasting hydration'],
            ['num' => '94%', 'text' => 'Balanced, calmed scalp & hair with zero buildup'],
            ['num' => '91%', 'text' => 'Visible shine and restored vitality within 14 days'],
        ];

        if ($cat === 'body') {
            $resultHeadline = 'Deep comfort and silky care for everyday skin.';
            $resultStats = [
                ['num' => '97%', 'text' => 'Instant moisture & long-lasting softness'],
                ['num' => '95%', 'text' => 'Calmed, nourished skin barrier feel'],
                ['num' => '92%', 'text' => 'Skin stays comfortable and hydrated all day'],
            ];
        } elseif ($cat === 'skin-care') {
            $resultHeadline = 'Visible vitality in everyday skin.';
            $resultStats = [
                ['num' => '96%', 'text' => 'Felt instant hydration & noticeably smoother texture'],
                ['num' => '94%', 'text' => 'Replenished moisture barrier with zero heaviness'],
                ['num' => '91%', 'text' => 'Renewed natural, healthy glow in 14 days'],
            ];
        }

        $resultCards = [
            [
                'img' => 'assets/result-1.webp',
                'tag' => 'Day 14 · Hydration',
                'quote' => '“Leaves a silky, nourished feel from the very first routine.”',
                'author' => 'Maya K.',
            ],
            [
                'img' => 'assets/result-2.webp',
                'tag' => 'Day 21 · Vitality',
                'quote' => '“Weightless absorption and clean finish. My everyday staple.”',
                'author' => 'Elena R.',
            ],
            [
                'img' => 'assets/result-3.webp',
                'tag' => 'Day 28 · Radiance',
                'quote' => '“Visible improvement in softness and natural radiance.”',
                'author' => 'Anya T.',
            ],
        ];

        return view('pages.product', [
            'product' => $product,
            'slug' => $slug,
            'categoryName' => $categoryName,
            'related' => $related,
            'productSizes' => $productSizes,
            'productImages' => $productImages,
            'resultHeadline' => $resultHeadline,
            'resultStats' => $resultStats,
            'resultCards' => $resultCards,
        ]);
    }
}
