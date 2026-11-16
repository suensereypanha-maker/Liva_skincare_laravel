<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
    /**
     * Switch application locale between English and Khmer.
     */
    public function switch(string $lang): RedirectResponse
    {
        if (in_array($lang, ['en', 'km', 'kh'])) {
            session(['locale' => $lang]);
        }

        return redirect()->back();
    }
}
