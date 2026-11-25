<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the customer profile dashboard design.
     *
     * Note: Design preview only (no database connected yet). Profile fields and
     * order history are hydrated from client-side demo state with default fallbacks.
     */
    public function index(): View
    {
        return $this->renderProfileView('overview');
    }

    /**
     * Display the profile page focused on order history.
     */
    public function orders(): View
    {
        return $this->renderProfileView('orders');
    }

    /**
     * Display the profile page focused on personal details & preferences.
     */
    public function settings(): View
    {
        return $this->renderProfileView('details');
    }

    /**
     * Render the shared profile view with structured demo schema defaults.
     */
    protected function renderProfileView(string $activeTab): View
    {
        return view('pages.profile.index', [
            'activeTab' => $activeTab,
            'cities' => $this->supportedCities(),
            'skinTypes' => Product::SKIN_TYPES,
            'hairConcerns' => $this->hairConcerns(),
            'sampleProfile' => $this->sampleProfileDefaults(),
        ]);
    }

    /**
     * Default demo profile template used when previewing without database persistence.
     *
     * @return array{name: string, email: string, phone: string, address: string, city: string, provider: string, skinType: string, hairConcern: string, memberSince: string}
     */
    protected function sampleProfileDefaults(): array
    {
        return [
            'name' => 'Sophea Alex',
            'email' => 'sophea.alex@gmail.com',
            'phone' => '012 345 678',
            'address' => 'Street 240, Daun Penh',
            'city' => 'Phnom Penh',
            'provider' => 'Google',
            'skinType' => 'Normal',
            'hairConcern' => 'Hydration & Shine',
            'memberSince' => 'November 2026',
        ];
    }

    /**
     * Supported delivery cities for the profile address selector.
     *
     * @return array<int, string>
     */
    protected function supportedCities(): array
    {
        return [
            'Phnom Penh',
            'Siem Reap',
            'Battambang',
            'Sihanoukville',
            'Kampot',
            'Kep',
            'Kampong Cham',
            'Other',
        ];
    }

    /**
     * Hair care focus options for the beauty profile preferences.
     *
     * @return array<int, string>
     */
    protected function hairConcerns(): array
    {
        return [
            'Hydration & Shine',
            'Scalp Balance',
            'Repair & Strength',
            'Volume & Lift',
            'Daily Gentle Care',
        ];
    }
}
