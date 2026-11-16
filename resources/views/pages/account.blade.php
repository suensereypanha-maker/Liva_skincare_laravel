@extends('layouts.app')

@section('title', 'Your Account — LIVA')

@section('content')
<div id="app">
    <section class="commerce-account-page container">
        <div class="commerce-account-intro">
            <p class="eyebrow">YOUR LIVA</p>
            <h1>Your favourites.<br>Your orders.<br><em>All together.</em></h1>
            <p>Save a selection, revisit local demo orders, and add your favourites again.</p>
            <div class="commerce-account-benefits">
                <span><x-icon name="heart" /> Saved favourites</span>
                <span><x-icon name="bag" /> Local order history</span>
                <span><x-icon name="leaf" /> Saved checkout details</span>
            </div>
            <div class="commerce-account-signature">
                <span>LIVA</span>
            </div>
        </div>

        <div class="commerce-auth-card">
            <p class="eyebrow">YOUR ACCOUNT</p>
            <h2>Welcome back.</h2>
            <p class="commerce-auth-description">Keep your shopping details together on this device.</p>

            <div class="commerce-auth-tabs" role="group" aria-label="Account action">
                <button type="button" class="commerce-account-mode is-active" data-mode="signin" aria-pressed="true">Sign in</button>
                <button type="button" class="commerce-account-mode" data-mode="register" aria-pressed="false">Create a profile</button>
            </div>

            <div class="commerce-social-auth">
                <button type="button" class="commerce-social-btn commerce-social-google" data-social="google" aria-label="Continue with Google">
                    <svg class="commerce-social-icon" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true">
                        <path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.82-2.4 3.68v3.05h3.88c2.27-2.09 3.665-5.17 3.665-9.17z"/>
                        <path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.05c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.1-6.72-4.93H1.25v3.15C3.26 21.36 7.33 24 12 24z"/>
                        <path fill="#FBBC05" d="M5.28 14.27c-.25-.72-.38-1.49-.38-2.27s.13-1.55.38-2.27V6.58H1.25C.45 8.17 0 9.97 0 12s.45 3.83 1.25 5.42l4.03-3.15z"/>
                        <path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.33 0 3.26 2.64 1.25 6.58l4.03 3.15c.95-2.83 3.6-4.98 6.72-4.98z"/>
                    </svg>
                    <span>Continue with Google</span>
                </button>
                <button type="button" class="commerce-social-btn commerce-social-facebook" data-social="facebook" aria-label="Continue with Facebook">
                    <svg class="commerce-social-icon" viewBox="0 0 24 24" width="20" height="20" fill="#1877F2" aria-hidden="true">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                    <span>Continue with Facebook</span>
                </button>
            </div>

            <div class="commerce-auth-divider">
                <span>or continue with phone number</span>
            </div>

            <form id="commerce-login-form">
                <div class="form-field">
                    <label for="commerce-phone">Phone number</label>
                    <input id="commerce-phone" name="phone" type="tel" required autocomplete="tel" pattern="[+0-9][0-9 ]{7,17}" title="Enter a valid phone number, such as 012 345 678" placeholder="012 345 678">
                </div>
                <div id="commerce-login-error" class="commerce-form-error" role="alert"></div>
                <button class="btn btn-primary" type="submit">Continue <x-icon name="arrow" /></button>
            </form>

            <div class="commerce-demo-notice">
                <span>Demo account access only. No SMS is sent. You’ll use the preview code <strong>123456</strong>.</span>
            </div>
        </div>
    </section>
</div>
@endsection

