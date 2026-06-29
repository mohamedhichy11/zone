<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\GamerosController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PayerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SoldeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, "home"])->name('main.home');

Route::get('/games', [GamesController::class, 'allGames'])->name('games.all');
Route::get('/games/{cat}', [GamesController::class, 'afficheGame']);

Route::get("/modifie", [GamerosController::class, "index"])->name('modifie')->middleware("auth:admin", "admin");
Route::get('create', [GamerosController::class, 'create'])->name('create')->middleware("auth:admin", "admin");
Route::post('games', [GamerosController::class, 'store'])->name('games.store')->middleware("auth:admin", "admin");
Route::get('/games/{id}/edit', [GamerosController::class, 'edit'])->name('edit')->middleware("auth:admin", "admin");
Route::put('/games/{id}', [GamerosController::class, 'update'])->name('update')->middleware("auth:admin", "admin");
Route::delete('/games/{game}', [GamerosController::class, 'destroy'])->name('games.destroy')->middleware("auth:admin", "admin");
Route::post('/games/{id}/toggle-top', [GamerosController::class, 'toggleTop'])->name('games.toggleTop')->middleware("auth:admin", "admin");
Route::post('/games/{id}/toggle-solde', [GamerosController::class, 'toggleSolde'])->name('games.toggleSolde')->middleware("auth:admin", "admin");

Route::get("/sign/createp", [ProfileController::class, "createp"])->name('createp');
Route::post("/sign/store", [ProfileController::class, "store"])->name('store');

Route::get("/login", [LoginController::class, "show"])->name('login.show');
Route::post("/login", [LoginController::class, "login"])->name('login');
Route::get("/logout", [LoginController::class, "logout"])->name('login.logout');

Route::get("/admin/login", [AdminController::class, "showLogin"])->name('admin.login.show');
Route::post("/admin/login", [AdminController::class, "login"])->name('admin.login');
Route::get("/admin/logout", [AdminController::class, "logout"])->name('admin.login.logout');

Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/cart/addc/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::delete('/remove-from-cart', [CartController::class, 'removec'])->name('removeFromCart');
Route::post('/cart/apply-promo', [CartController::class, 'applyPromo'])->name('cart.applyPromo');
Route::post('/cart/remove-promo', [CartController::class, 'removePromo'])->name('cart.removePromo');

Route::get('/catalogue', [SoldeController::class, 'cataloguepdf'])->middleware("auth");
Route::get('/promo', [SoldeController::class, 'mypromo'])->middleware("auth");

Route::post('/session', [PayerController::class, 'session'])->name('session')->middleware("auth");
Route::get('/success', [PayerController::class, 'success'])->name('success');

Route::middleware(['auth:admin', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/orders', [AdminDashboardController::class, 'orders'])->name('orders');
    Route::get('/orders/{id}', [AdminDashboardController::class, 'orderDetail'])->name('order.detail');
    Route::post('/orders/{id}/status', [AdminDashboardController::class, 'updateOrderStatus'])->name('orders.status');
    Route::get('/orders/export/csv', [AdminDashboardController::class, 'exportOrders'])->name('orders.export');
    Route::get('/customers', [AdminDashboardController::class, 'customers'])->name('customers');
    Route::get('/promotions', [AdminDashboardController::class, 'promotions'])->name('promotions');
    Route::post('/games/{id}/toggle-solde', [AdminDashboardController::class, 'toggleSolde'])->name('toggle.solde');
    Route::get('/profile', [AdminDashboardController::class, 'profile'])->name('profile');
    Route::post('/profile', [AdminDashboardController::class, 'updateProfile'])->name('profile.update');
});

Route::fallback(function () {
    return response('La page demandée n\'existe pas', 404);
});
