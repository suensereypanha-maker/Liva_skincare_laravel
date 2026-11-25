<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Display the customer sign-in design page.
     *
     * Note: Design preview only (no database connected yet). Authentication state
     * is simulated in browser storage before redirecting to the profile page.
     */
    public function showLogin(Request $request): View
    {
        $mode = $request->query('mode') === 'register' ? 'register' : 'signin';

        return view('pages.auth.login', [
            'mode' => $mode,
        ]);
    }

    /**
     * Display the customer registration / create-profile design page.
     */
    public function showRegister(): View
    {
        return view('pages.auth.login', [
            'mode' => 'register',
        ]);
    }
}
