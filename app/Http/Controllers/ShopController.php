<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShopController extends Controller
{
    /**
     * Display the product catalog / shop page.
     */
    public function index(Request $request, ?string $category = null): View
    {
        $selectedCategory = $category ?? $request->query('category');
        $all = Product::all();

        // Compute counts per category
        $categoryCounts = [];
        foreach (Product::CATEGORIES as $key => $name) {
            $categoryCounts[$key] = count(Product::whereCategory($key));
        }

        // Apply filters
        $products = $all;

        if (! empty($selectedCategory)) {
            $products = $products->filter(fn (array $p) => ($p['category'] ?? '') === $selectedCategory);
        }

        $skinType = $request->query('skinType');
        if (! empty($skinType)) {
            $products = $products->filter(fn (array $p) => in_array($skinType, $p['skinType'] ?? []));
        }

        $minPrice = (float) $request->query('min_price', 10);
        $maxPrice = (float) $request->query('max_price', 100);
        if ($request->has('min_price') || $request->has('max_price')) {
            $products = $products->filter(fn (array $p) => ($p['price'] ?? 0) >= $minPrice && ($p['price'] ?? 0) <= $maxPrice);
        }

        $promo = $request->query('promo');
        if (! empty($promo)) {
            $products = $products->filter(fn (array $p) => in_array($promo, $p['promo'] ?? []));
        }

        $inStock = $request->query('stock');
        if ($inStock === 'in-stock') {
            $products = $products->filter(fn (array $p) => ! empty($p['inStock']));
        }

        // Sorting
        $sort = (string) $request->query('sort', 'default');
        $products = match ($sort) {
            'price-low' => $products->sortBy('price'),
            'price-high' => $products->sortByDesc('price'),
            'rating' => $products->sortByDesc('rating'),
            'name' => $products->sortBy('name'),
            default => $products,
        };

        $totalCount = $products->count();
        $totalAll = $all->count();

        return view('pages.shop', [
            'category' => $selectedCategory,
            'categoryCounts' => $categoryCounts,
            'categories' => Product::CATEGORIES,
            'skinTypes' => Product::SKIN_TYPES,
            'products' => $products,
            'totalCount' => $totalCount,
            'totalAll' => $totalAll,
            'currentSort' => $sort,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
        ]);
    }
}
