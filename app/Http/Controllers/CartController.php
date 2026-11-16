<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display the shopping bag page or redirect to storefront.
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('home');
    }

    /**
     * Add an item to the shopping bag.
     */
    public function add(Request $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Item added to bag',
        ]);
    }

    /**
     * Update an item in the shopping bag.
     */
    public function update(Request $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Bag updated',
        ]);
    }

    /**
     * Remove an item from the shopping bag.
     */
    public function remove(Request $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Item removed',
        ]);
    }
}
