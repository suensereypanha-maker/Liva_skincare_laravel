@extends('layouts.app')

@section('title', 'My Profile — LIVA')

@section('content')
<div id="app">
    <section class="commerce-page liva-profile-page container" data-profile-page data-active-tab="{{ $activeTab }}">
        {{-- Guest Prompt (shown when not logged in yet) --}}
        <div id="liva-profile-guest" class="liva-profile-guest-card" hidden>
            <div class="liva-profile-guest-badge">
                <x-icon name="user" />
            </div>
            <p class="eyebrow" data-i18n="yourProfile">{{ __('storefront.yourProfile') ?? 'YOUR PROFILE' }}</p>
            <h1>Sign in to open<br><em>your LIVA profile.</em></h1>
            <p>Access your saved personal details, skincare &amp; hair preferences, wishlist, and order history in one place.</p>
            <div class="liva-profile-guest-actions">
                <a href="{{ route('login') }}" class="btn btn-primary">
                    <span data-i18n="signIn">{{ __('storefront.signIn') ?? 'Sign in' }}</span>
                    <x-icon name="arrow" />
                </a>
                <button type="button" class="btn btn-secondary" id="liva-load-demo-profile" data-demo-profile='@json($sampleProfile)'>
                    <span>Preview demo profile</span>
                </button>
            </div>
        </div>

        {{-- Authenticated Member Profile View (Design Preview) --}}
        <div id="liva-profile-member" hidden>
            <div class="commerce-heading liva-profile-heading">
                <p class="eyebrow" data-i18n="yourLiva">{{ __('storefront.yourLiva') ?? 'YOUR LIVA' }}</p>
                <h1 id="liva-profile-greeting">Hello, Guest.</h1>
                <p>Manage your personal details, beauty profile preferences, and saved orders.</p>
            </div>

            <div class="commerce-profile-layout liva-profile-layout">
                @include('pages.profile.partials.sidebar', ['activeTab' => $activeTab])

                <div class="commerce-profile-content liva-profile-content">
                    <div class="commerce-demo-notice liva-profile-preview-banner">
                        <x-icon name="sparkle" />
                        <span>Design preview mode — your profile is saved on this browser until database authentication is connected.</span>
                    </div>

                    @include('pages.profile.partials.overview', ['activeTab' => $activeTab])
                    @include('pages.profile.partials.details-form', [
                        'activeTab' => $activeTab,
                        'cities' => $cities,
                        'skinTypes' => $skinTypes,
                        'hairConcerns' => $hairConcerns,
                    ])
                    @include('pages.profile.partials.orders', ['activeTab' => $activeTab])
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
