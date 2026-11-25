@extends('layouts.app')

@section('title', ($mode === 'register' ? 'Create Profile' : 'Sign In') . ' — LIVA')

@section('content')
<div id="app">
    <section class="commerce-account-page container" data-auth-page data-initial-mode="{{ $mode }}">
        <div class="commerce-account-intro">
            <p class="eyebrow" data-i18n="yourLiva">{{ __('storefront.yourLiva') ?? 'YOUR LIVA' }}</p>
            <h1>Your favourites.<br>Your profile.<br><em>All together.</em></h1>
            <p>Sign in to open your personal LIVA profile, save your skincare preferences, and revisit your orders.</p>
            <div class="commerce-account-benefits">
                <span><x-icon name="user" /> <span data-i18n="personalProfileBadge">{{ __('storefront.personalProfileBadge') ?? 'Personal care profile' }}</span></span>
                <span><x-icon name="heart" /> <span data-i18n="yourFavourites">{{ __('storefront.yourFavourites') ?? 'Saved favourites' }}</span></span>
                <span><x-icon name="bag" /> <span data-i18n="localOrderHistory">{{ __('storefront.localOrderHistory') ?? 'Local order history' }}</span></span>
                <span><x-icon name="leaf" /> <span data-i18n="savedCheckoutDetails">{{ __('storefront.savedCheckoutDetails') ?? 'Saved checkout details' }}</span></span>
            </div>
            <div class="commerce-account-signature">
                <span>LIVA</span>
            </div>
        </div>

        <div class="commerce-auth-card" id="liva-auth-card">
            {{-- Shown when user is already signed in locally --}}
            <div id="liva-auth-active-session" class="liva-auth-active-session" hidden>
                <p class="eyebrow" data-i18n="yourProfile">{{ __('storefront.yourProfile') ?? 'YOUR PROFILE' }}</p>
                <div class="liva-auth-user-preview">
                    <div class="commerce-avatar liva-auth-user-avatar" data-auth-avatar>L</div>
                    <div>
                        <h2 data-auth-name>LIVA Member</h2>
                        <p data-auth-contact></p>
                        <span class="liva-provider-pill" data-auth-provider>LOCAL DEMO PROFILE</span>
                    </div>
                </div>
                <div class="liva-auth-active-actions">
                    <a href="{{ route('profile') }}" class="btn btn-primary">
                        <span data-i18n="openMyProfile">{{ __('storefront.openMyProfile') ?? 'Open my profile' }}</span>
                        <x-icon name="arrow" />
                    </a>
                    <button type="button" class="btn btn-secondary" id="liva-auth-switch-account">
                        <span data-i18n="signOut">{{ __('storefront.signOut') ?? 'Sign out' }}</span>
                    </button>
                </div>
            </div>

            {{-- Credentials / Registration Form --}}
            <div id="liva-auth-credentials-step">
                <p class="eyebrow" data-i18n="yourAccount">{{ __('storefront.yourAccount') ?? 'YOUR ACCOUNT' }}</p>
                <h2 id="liva-auth-heading" data-i18n="{{ $mode === 'register' ? 'createDemoProfile' : 'welcomeBack' }}">
                    {{ $mode === 'register' ? (__('storefront.createDemoProfile') ?? 'Create a demo profile.') : (__('storefront.welcomeBack') ?? 'Welcome back.') }}
                </h2>
                <p class="commerce-auth-description" data-i18n="keepDetailsTogether">
                    {{ __('storefront.keepDetailsTogether') ?? 'Keep your shopping details together on this device.' }}
                </p>

                <div class="commerce-auth-tabs" role="group" aria-label="Account action">
                    <button type="button" class="liva-auth-mode {{ $mode !== 'register' ? 'is-active' : '' }}" data-mode="signin" data-i18n="signIn" aria-pressed="{{ $mode !== 'register' ? 'true' : 'false' }}">
                        {{ __('storefront.signIn') ?? 'Sign in' }}
                    </button>
                    <button type="button" class="liva-auth-mode {{ $mode === 'register' ? 'is-active' : '' }}" data-mode="register" data-i18n="createProfile" aria-pressed="{{ $mode === 'register' ? 'true' : 'false' }}">
                        {{ __('storefront.createProfile') ?? 'Create a profile' }}
                    </button>
                </div>

                <div class="commerce-social-auth">
                    <button type="button" class="commerce-social-btn liva-social-login" data-social="google" aria-label="Continue with Google">
                        <svg class="commerce-social-icon" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true">
                            <path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.82-2.4 3.68v3.05h3.88c2.27-2.09 3.665-5.17 3.665-9.17z"/>
                            <path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.05c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.1-6.72-4.93H1.25v3.15C3.26 21.36 7.33 24 12 24z"/>
                            <path fill="#FBBC05" d="M5.28 14.27c-.25-.72-.38-1.49-.38-2.27s.13-1.55.38-2.27V6.58H1.25C.45 8.17 0 9.97 0 12s.45 3.83 1.25 5.42l4.03-3.15z"/>
                            <path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.33 0 3.26 2.64 1.25 6.58l4.03 3.15c.95-2.83 3.6-4.98 6.72-4.98z"/>
                        </svg>
                        <span data-i18n="continueWithGoogle">{{ __('storefront.continueWithGoogle') ?? 'Continue with Google' }}</span>
                    </button>
                    <button type="button" class="commerce-social-btn liva-social-login" data-social="facebook" aria-label="Continue with Facebook">
                        <svg class="commerce-social-icon" viewBox="0 0 24 24" width="20" height="20" fill="#1877F2" aria-hidden="true">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        <span data-i18n="continueWithFacebook">{{ __('storefront.continueWithFacebook') ?? 'Continue with Facebook' }}</span>
                    </button>
                </div>

                <div class="commerce-auth-divider">
                    <span data-i18n="orWithPhone">{{ __('storefront.orWithPhone') ?? 'or continue with phone number' }}</span>
                </div>

                <form id="liva-auth-form" novalidate>
                    <div class="form-field liva-register-field" {{ $mode === 'register' ? '' : 'hidden' }}>
                        <label for="liva-auth-name" data-i18n="yourName">{{ __('storefront.yourName') ?? 'Your name' }}</label>
                        <input id="liva-auth-name" name="name" type="text" minlength="2" maxlength="100" autocomplete="name" placeholder="Your name" {{ $mode === 'register' ? 'required' : '' }}>
                    </div>
                    <div class="form-field liva-register-field" {{ $mode === 'register' ? '' : 'hidden' }}>
                        <label for="liva-auth-email" data-i18n="emailAddress">{{ __('storefront.emailAddress') ?? 'Email address' }}</label>
                        <input id="liva-auth-email" name="email" type="email" maxlength="120" autocomplete="email" placeholder="you@example.com" {{ $mode === 'register' ? 'required' : '' }}>
                    </div>
                    <div class="form-field">
                        <label for="liva-auth-phone" data-i18n="phoneNumber">{{ __('storefront.phoneNumber') ?? 'Phone number' }}</label>
                        <input id="liva-auth-phone" name="phone" type="tel" required autocomplete="tel" pattern="[+0-9][0-9 ]{7,17}" title="Enter a valid phone number, such as 012 345 678" placeholder="012 345 678">
                    </div>
                    <div id="liva-auth-error" class="commerce-form-error" role="alert"></div>
                    <button class="btn btn-primary" type="submit">
                        <span data-i18n="continue">{{ __('storefront.continue') ?? 'Continue' }}</span>
                        <x-icon name="arrow" />
                    </button>
                </form>

                <div class="commerce-demo-notice liva-auth-demo-note">
                    <span data-i18n="demoNotice">{!! __('storefront.demoNotice') ?? 'Demo account access only. No SMS is sent. You’ll use the preview code <strong>123456</strong>.' !!}</span>
                </div>
            </div>

            {{-- OTP Verification Step (Design Preview) --}}
            <div id="liva-auth-otp-step" hidden>
                <p class="eyebrow" data-i18n="demoAccess">{{ __('storefront.demoAccess') ?? 'DEMO ACCESS' }}</p>
                <h2 data-i18n="enterDemoCode">{{ __('storefront.enterDemoCode') ?? 'Enter your demo code.' }}</h2>
                <p class="commerce-auth-description" id="liva-auth-otp-target">Enter the preview code to open your profile.</p>

                <div class="commerce-otp-preview">
                    <span>YOUR DEMO CODE</span>
                    <strong>123456</strong>
                    <p>Design preview · No database or SMS required.</p>
                </div>

                <form id="liva-auth-otp-form" novalidate>
                    <div class="form-field">
                        <label for="liva-auth-otp">Six-digit code</label>
                        <input id="liva-auth-otp" name="otp" inputmode="numeric" pattern="[0-9]{6}" required maxlength="6" autocomplete="one-time-code" placeholder="000000" class="commerce-otp-input" aria-describedby="liva-auth-otp-hint">
                        <p id="liva-auth-otp-hint" class="commerce-field-hint">Enter 123456 to continue to your profile.</p>
                    </div>
                    <div id="liva-auth-otp-error" class="commerce-form-error" role="alert"></div>
                    <button class="btn btn-primary" type="submit">
                        <span data-i18n="openMyProfile">{{ __('storefront.openMyProfile') ?? 'Open my profile' }}</span>
                        <x-icon name="arrow" />
                    </button>
                    <button type="button" class="commerce-text-button" id="liva-auth-back-btn">Use a different phone number</button>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
