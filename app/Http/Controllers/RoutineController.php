<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class RoutineController extends Controller
{
    /**
     * Display the Build Your Shelf / Routine builder page.
     */
    public function index(): View
    {
        $shelfIds = ['shampoo', 'conditioner', 'hair-mask', 'body-wash', 'shower-gel', 'body-lotion'];
        $hairItems = Product::whereCategory('hair')->filter(fn (array $p) => in_array($p['id'], $shelfIds));
        $bodyItems = Product::whereCategory('body')->filter(fn (array $p) => in_array($p['id'], $shelfIds));

        return view('pages.routine', [
            'hairItems' => $hairItems,
            'bodyItems' => $bodyItems,
            'shelfIds' => $shelfIds,
        ]);
    }
}
