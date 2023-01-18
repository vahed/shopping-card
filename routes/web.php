<?php

use Inertia\Inertia;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;
use App\Models\Category;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/show/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/productByCategory/{id}', [CategoryController::class, 'productByCategory'])->name('category.productByCategory');
Route::any('/category/create', [CategoryController::class, 'createCategory'])->name('create.createCategory');

Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::get('order',[CheckoutController::class, 'order'])->name('checkout.order');
Route::post('shop',[CheckoutController::class, 'add_order'])->name('checkout.shop');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        //'category' => Category::all(),
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register')
    ]);
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('Admin/Dashboard', [
            'isLogged' => Auth::check(),
            'categories' => Category::all()
        ]);
    })->name('admin_dashboard');

    Route::get('showCreateProduct', function () {
        return Inertia::render('Admin/CreateProduct', [
            'isLogged' => Auth::check(),
            'canLogin' => Route::has('dashboard')
        ]);
    })->name('show_create_product');

    Route::post('createProduct',[ProductController::class, 'create'])->name('product.create');
});

require __DIR__.'/auth.php';