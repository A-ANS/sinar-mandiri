<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\CatalogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\MessageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\TransactionController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;

// Frontend
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/catalog/{car}', [CatalogController::class, 'show'])->name('catalog.show');
Route::get('/contact', [CatalogController::class, 'contact'])->name('contact');
Route::post('/contact', [CatalogController::class, 'sendMessage'])->name('contact.send');

// Transaksi (wajib login)
Route::middleware(['auth'])->group(function () {
    Route::get('/catalog/{car}/beli', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/catalog/{car}/beli', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('/transaksi', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transaksi/{transaction}', [TransactionController::class, 'show'])->name('transactions.show');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('brands', BrandController::class);
    Route::resource('cars', CarController::class);
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

    // Transaksi Admin
    Route::get('transactions', [AdminTransactionController::class, 'index'])->name('transactions.index');
    Route::get('transactions/{transaction}', [AdminTransactionController::class, 'show'])->name('transactions.show');
    Route::patch('transactions/{transaction}/status', [AdminTransactionController::class, 'updateStatus'])->name('transactions.updateStatus');
});

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';