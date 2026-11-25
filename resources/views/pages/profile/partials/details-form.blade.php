<div class="liva-profile-panel" data-profile-panel="details" {{ $activeTab === 'details' ? '' : 'hidden' }}>
    <section class="commerce-profile-section">
        <div class="commerce-profile-section-head">
            <h2>Your details</h2>
            <span>Saved for checkout</span>
        </div>

        <form id="liva-profile-details-form" novalidate>
            <div class="commerce-field-grid">
                <div class="form-field">
                    <label for="liva-profile-name">Full name</label>
                    <input id="liva-profile-name" name="name" type="text" required minlength="2" maxlength="100" autocomplete="name" placeholder="Your name">
                </div>
                <div class="form-field">
                    <label for="liva-profile-email">Email address</label>
                    <input id="liva-profile-email" name="email" type="email" maxlength="120" autocomplete="email" placeholder="you@example.com">
                </div>
                <div class="form-field">
                    <label for="liva-profile-phone">Phone number</label>
                    <input id="liva-profile-phone" name="phone" type="tel" required pattern="[+0-9][0-9 ]{7,17}" title="Enter a valid phone number" autocomplete="tel" placeholder="012 345 678">
                </div>
                <div class="form-field">
                    <label for="liva-profile-city">City / Province</label>
                    <select id="liva-profile-city" name="city">
                        @foreach ($cities as $city)
                            <option value="{{ $city }}">{{ $city }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-field commerce-field-wide">
                    <label for="liva-profile-address">Delivery address (optional)</label>
                    <input id="liva-profile-address" name="address" type="text" maxlength="240" autocomplete="street-address" placeholder="Street, commune, district">
                </div>
            </div>

          
        </form>
    </section>
</div>
