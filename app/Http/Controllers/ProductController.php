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

        return view('pages.product', [
            'product' => $product,
            'slug' => $slug,
            'categoryName' => $categoryName,
            'related' => $related,
            'productSizes' => $productSizes,
            'productImages' => $productImages,
        ]);
    }
}
