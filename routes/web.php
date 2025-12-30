<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/contact', [ContactController::class, 'form'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products/test', [ProductController::class, 'test']);

Route::get('/products/create', [ProductController::class, 'create'])
    ->middleware('auth')
    ->name('products.create');

Route::post('/products', [ProductController::class, 'store'])
    ->middleware('auth')
    ->name('products.store');

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/{id}', [ProductController::class, 'show'])
    ->name('products.show');

Route::get('/products/{id}/manage', [ProductController::class, 'manage'])
    ->middleware('auth')
    ->name('products.manage');

Route::get('/products/{id}/edit', [ProductController::class, 'edit'])
    ->middleware('auth')
    ->name('products.edit');

Route::put('/products/{id}', [ProductController::class, 'update'])
    ->middleware('auth')
    ->name('products.update');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])
    ->middleware('auth')
    ->name('products.destroy');

Route::get('/products/{id}/buy', [ProductController::class, 'buy'])
    ->name('products.buy');

Route::post('/products/{id}/purchase', [ProductController::class, 'purchase'])
    ->name('products.purchase');

Route::get('/mypage', [ProfileController::class, 'mypage'])
    ->middleware('auth')
    ->name('mypage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
