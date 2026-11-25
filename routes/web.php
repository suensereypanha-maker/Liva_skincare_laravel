<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\RoutineController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes (MVC Architecture with Dedicated Controllers)
|--------------------------------------------------------------------------
|
| Primary routes for LIVA Storefront. All pages and business logic are
| handled through dedicated controller classes passing demo data to Blade.
|
*/

// Storefront / Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Shop & Catalog
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop/category/{category}', [ShopController::class, 'index'])->name('shop.category');

// Product Detail
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

// Build Your Shelf / Routine Builder
Route::get('/routine', [RoutineController::class, 'index'])->name('routine');

// Wishlist & Comparison Shortlists
Route::get('/wishlist', [PageController::class, 'wishlist'])->name('wishlist');
Route::get('/compare', [PageController::class, 'compare'])->name('compare');

// Cart & Bag Operations
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

// Auth & Customer Profile (Design Preview — Local Storage Until DB Integration)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/orders', [ProfileController::class, 'orders'])->name('profile.orders');
Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings');

// Customer Account & Order Tracking
Route::get('/account', [PageController::class, 'account'])->name('account');
Route::get('/account/orders', [PageController::class, 'account'])->name('account.orders');
Route::get('/tracking', [PageController::class, 'tracking'])->name('tracking');

// Information & Policy Pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/shipping', [PageController::class, 'shipping'])->name('shipping');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');

// Language Switcher (EN / KM)
Route::get('/locale/{lang}', [LocaleController::class, 'switch'])
    ->where('lang', 'en|km')
    ->name('locale.switch');
