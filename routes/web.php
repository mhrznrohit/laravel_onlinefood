<?php

use App\Http\Middleware\AdminEmailMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;

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



Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\ItemController::class, 'viewitems'])->name('view');
Route::get('/search', [App\Http\Controllers\ItemController::class, 'search'])->name('items.search');
Route::get('/items/{slug}', [App\Http\Controllers\ItemController::class, 'showitem'])->name('items.show');
Route::post('/', [App\Http\Controllers\CartController::class, 'addToCart']);

Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart'])->name('cart');
Route::post('/items/{slug} ', [App\Http\Controllers\CartController::class, 'addToCart'])->name("cart.add");


Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware(['auth', 'admin.email']);
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'record'])->name('admin')->middleware(['auth', 'admin.email']);
Route::get('/additem', [App\Http\Controllers\AdminController::class, 'items'])->name('additem');
Route::post('/additem', [App\Http\Controllers\AdminController::class, 'additems'])->name('additem');
Route::get('/additem', [App\Http\Controllers\AdminController::class, 'category'])->name('category');




Route::get('/category/{slug}', [App\Http\Controllers\CategoryController::class, 'showcategory'])->name('category.show');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.form');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'contactmail'])->name('contact.mail');











