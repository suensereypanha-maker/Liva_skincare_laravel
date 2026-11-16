<?php

namespace App\Models;

use Illuminate\Support\Collection;

class Product
{
    /**
     * @var array<int, array<string, mixed>>|null
     */
    protected static ?array $items = null;

    /**
     * Category label mapping.
     *
     * @var array<string, string>
     */
    public const CATEGORIES = [
        'skin-care' => 'Skin Care',
        'makeup' => 'Makeup',
        'hair' => 'Hair Care',
        'fragrances' => 'Fragrances',
        'nail-care' => 'Nail Care',
        'body' => 'Body Care',
        'sets' => 'Sets',
    ];

    /**
     * Available skin types.
     *
     * @var array<int, string>
     */
    public const SKIN_TYPES = [
        'Normal',
        'Oily',
        'Dry',
        'Combination',
        'Sensitive',
    ];

    /**
     * Retrieve all products as a Collection.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public static function all(): Collection
    {
        if (static::$items === null) {
            $path = config_path('products_data.json');
            if (file_exists($path)) {
                static::$items = json_decode((string) file_get_contents($path), true) ?? [];
            } else {
                static::$items = [];
            }
        }

        return collect(static::$items);
    }

    /**
     * Find a product by its ID / slug.
     *
     * @return array<string, mixed>|null
     */
    public static function find(string $id): ?array
    {
        return static::all()->firstWhere('id', $id);
    }

    /**
     * Filter products by category.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public static function whereCategory(string $category): Collection
    {
        return static::all()->filter(fn (array $p) => ($p['category'] ?? '') === $category);
    }

    /**
     * Get featured products.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public static function featured(int $limit = 8): Collection
    {
        return static::all()->take($limit);
    }

    /**
     * Return category label for a key.
     */
    public static function categoryName(string $key): string
    {
        return self::CATEGORIES[$key] ?? ucfirst(str_replace('-', ' ', $key));
    }
}
