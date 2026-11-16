@extends('layouts.app')

@section('title', 'Help & Contact — LIVA')

@php
    $faqs = $faqs ?? [
        ['question' => 'Can I buy products here?', 'answer' => 'This storefront is a design preview. Prices and sizes are illustrative. Checkout saves a demo order on your device and does not create a purchase.'],
        ['question' => 'What are the delivery and returns policies?', 'answer' => 'Delivery fees, delivery coverage, timing and returns terms have not been supplied. No delivery is arranged through this preview.'],
        ['question' => 'How does the payment preview work?', 'answer' => 'Cash on delivery and ABA transfer are example selections. There is no payment connection, no active payment code and no money is collected.'],
        ['question' => 'Where can I find product information?', 'answer' => 'The collection shows sample products. Verified ingredients, instructions, benefits and certifications have not been supplied.'],
        ['question' => 'Can I add a previous order again?', 'answer' => 'Open a saved demo order or your account history and choose Add again. Available products are added to your existing bag at current illustrative prices so you can review them.']
    ];
@endphp

@section('content')
<div id="app">
    <section class="commerce-page commerce-contact-page container">
        <div class="cat-page-heading">
            <p class="eyebrow">HELP & CONTACT</p>
            <h1>A clear place to start.</h1>
            <p>Explore how this store preview works.</p>
        </div>

        <div class="commerce-contact-layout">
            <div class="commerce-contact-info">
                <p class="eyebrow">STORE PREVIEW</p>
                <h2>Questions about<br>the experience?</h2>
                <p>Try the contact form and explore the answers below. The form demonstrates the interaction without sending a message.</p>
                
                <div class="commerce-contact-details">
                    <div>
                        <span><x-icon name="bag" /></span>
                        <div>
                            <h3>Your shopping details</h3>
                            <p>Demo orders and saved items remain in this browser.</p>
                        </div>
                    </div>
                    <div>
                        <span><x-icon name="user" /></span>
                        <div>
                            <h3>Contact details</h3>
                            <p>Live contact channels and service hours have not been supplied.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="commerce-contact-form-wrap">
                <form id="commerce-contact-form">
                    <h2>Contact form preview</h2>
                    <div class="commerce-field-grid">
                        <div class="form-field">
                            <label for="commerce-name">Your name</label>
                            <input id="commerce-name" name="name" type="text" required minlength="2" maxlength="100" autocomplete="name" placeholder="Your name">
                        </div>
                        <div class="form-field">
                            <label for="commerce-email">Email address</label>
                            <input id="commerce-email" name="email" type="email" required maxlength="120" autocomplete="email" placeholder="you@example.com">
                        </div>
                        <div class="form-field commerce-field-wide">
                            <label for="commerce-subject">Topic</label>
                            <select id="commerce-subject" name="subject" required>
                                <option value="">Choose a topic</option>
                                <option>Product advice</option>
                                <option>My order</option>
                                <option>Delivery & payment</option>
                                <option>Partnerships</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="form-field commerce-field-wide">
                            <label for="commerce-message">Your message</label>
                            <textarea id="commerce-message" name="message" required minlength="10" maxlength="2000" rows="5" placeholder="Write a sample message…"></textarea>
                        </div>
                    </div>

                    <div id="commerce-contact-error" class="commerce-form-error" role="alert"></div>
                    <button type="submit" class="btn btn-primary">Preview message <x-icon name="arrow" /></button>
                    <p class="commerce-submit-note">Demo form · Your message won’t be sent or stored.</p>
                </form>

                <div id="commerce-contact-success" class="commerce-contact-success" hidden>
                    <span class="commerce-success-icon"><x-icon name="check" /></span>
                    <p class="eyebrow">MESSAGE PREVIEW</p>
                    <h2>Preview complete.</h2>
                    <p>Your message preview is complete. This is a local demo, so your note has not been sent or stored.</p>
                    <button type="button" class="btn btn-secondary commerce-contact-again">Try another message</button>
                </div>
            </div>
        </div>

        <section class="commerce-faq">
            <div>
                <p class="eyebrow">COMMON QUESTIONS</p>
                <h2>Good to know.</h2>
                <p>What works in this demo, and what is not configured.</p>
            </div>
            <div class="commerce-faq-list">
                @foreach($faqs as $faq)
                    <details class="commerce-faq-item">
                        <summary>{{ $faq['question'] ?? $faq[0] }} <span><x-icon name="plus" /></span></summary>
                        <div>
                            <p>{{ $faq['answer'] ?? $faq[1] }}</p>
                        </div>
                    </details>
                @endforeach
            </div>
        </section>
    </section>
</div>
@endsection

