<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('cart', [CartController::class, 'store'])->name('cart.index');
Route::post('cart', [CartController::class, 'store'])->name('cart.store');
//Route::get('/purchase', [ProductController::class, 'purchase']);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/show/{id}', [ProductController::class, 'show'])->name('products.show');
Route::any('/category', [CategoryController::class, 'index'])->name('category');
Route::any('/category/create', [CategoryController::class, 'createCategory'])->name('createCategory');
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
