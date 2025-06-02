<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\ShoppingController;


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

Route::get('/playeras', [ProductController::class, 'index'])->name('comprar.playeras');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');


// Mostrar el carrito
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// Agregar un producto al carrito
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

// Actualizar un producto en el carrito (opcional)
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

// Eliminar un producto del carrito (opcional)
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Proceder al pago
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');


Route::get('/inicio', [ProductController::class, 'showRandomCarousel'])->name('sugeration');


Route::get('/orders', [ShoppingController::class, 'index'])->name('orders.index');






Route::get('/acerca', function () {
    return view('acerca');
});


Route::get('/', function () {
    return redirect()->route('sugeration');
})->middleware('auth');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

require __DIR__.'/auth.php';


