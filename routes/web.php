<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Category;
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
Route::any('home', [UserController::class, 'index'])->name('home.index');

Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart', [CartController::class, 'store'])->name('cart.store');
Route::put('/cart/update/{id}',[CartController::class, 'update'])->name('cart.update');
Route::put('/cart/{id}/increment',[CartController::class, 'incrementItem'])->name('cart.incrementItem');
Route::put('/cart/{id}/decrement',[CartController::class, 'decrementItem'])->name('cart.decrementItem');
Route::delete('/cart/{id}/delete',[CartController::class, 'destroy'])->name('cart.delete');

//Route::get('/purchase', [ProductController::class, 'purchase']);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/show/{id}', [ProductController::class, 'show'])->name('products.show');
//Route::get('/productByCategory', [CategoryController::class, 'productByCategory'])->name('category.productByCategory');
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/productByCategory/{id}', [CategoryController::class, 'productByCategory'])->name('category.productByCategory');
Route::any('/category/create', [CategoryController::class, 'createCategory'])->name('createCategory');
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'category' => Category::all(),
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register')
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';