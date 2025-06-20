<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\OrderController;

// Admin Controllers (aliased)
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\ExperienceController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Reviews
Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])
    ->name('reviews.store')
    ->middleware('auth');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [ShopController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');
Route::get('/cart/summary-json', [CartController::class, 'getCartSummary']);
Route::get('/cart/summary', function() {
    return view('partials.cart_summary', ['cart' => session('cart', [])]);
});

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// API Routes
Route::get('/products', [ProductApiController::class, 'index']);
Route::post('/products', [ProductApiController::class, 'store']);

// Authenticated User Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/home', [CustomerController::class, 'index'])->name('customer.home');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
   Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Products
Route::resource('products', AdminProductController::class);

// Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    
    // Customers
    Route::resource('customers', AdminCustomerController::class);
    
    // Reviews
    Route::get('/reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
    
    // Reports
    Route::get('/reports', [AdminReportController::class, 'index'])->name('reports.index');
});

// Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

// Order Confirmation
Route::get('/order/confirmation/{id}', function ($id) {
    $order = App\Models\Order::findOrFail($id);
    return view('confirmation', compact('order'));
})->name('order.confirmation');

// Experience Sharing
Route::post('/share-experience', [ExperienceController::class, 'store'])
    ->name('share.experience')
    ->middleware('auth');

require __DIR__.'/auth.php';