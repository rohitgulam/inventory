<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Models\Product;
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

Route::get('/', function () {
    return view('dashboard');
});

// Product Routes
Route::get('/products', [ProductController::class, 'index']);

Route::post('/products', [ProductController::class, 'store']);

Route::delete('products/{product}', [ProductController::class, 'destroy']);

Route::get('products/{product}/edit', [ProductController::class, 'edit']);

Route::put('products/{product}', [ProductController::class, 'update']);

// Purchases Routes
Route::get('/purchases', [PurchaseController::class, 'index']);

Route::get('/purchase/create', [PurchaseController::class, 'create']);

Route::post('/purchases', [PurchaseController::class, 'store']);

// Search product 

Route::post('/searchproduct', [PurchaseController::class, 'searchPost']);
