<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->session()->get('locale') ?? $request->cookie('liva_lang');

        if ($locale && in_array($locale, ['en', 'km', 'kh'])) {
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
