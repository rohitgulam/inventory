<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\UserController;

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

// Add Bonus to product
// Show add bonus page
Route::put('products/bonus/{product}/edit', [ProductController::class, 'editBonus']);

Route::put('products/bonus/{product}', [ProductController::class, 'addBonus']);

// Purchases Routes
Route::get('/purchases', [PurchaseController::class, 'index']);

Route::get('/purchase/create', [PurchaseController::class, 'create']);

Route::post('/purchases', [PurchaseController::class, 'store']);


// Search product 
Route::post('/searchproduct', [PurchaseController::class, 'searchProduct']);


// Purchase Order Routes

// Create purchase order
Route::post('purchase/order/create', [PurchaseController::class, 'store']);

// Sales Routes

// Index 
Route::get('sells', [SellController::class, 'index']);

//Show create sell
Route::get('/sell/create', [SellController::class, 'create']);

// sell order
Route::post('sell/order/create', [SellController::class, 'store']);

// Expenses Routes
// Index
Route::get('expenses', [ExpenditureController::class, 'index']);

// Search expens
Route::post('searchexpense', [ExpenseController::class, 'searchExpense']);

// Create expense
Route::post('expenses', [ExpenseController::class, 'store']);

// Create expense
Route::post('expenses', [ExpenseController::class, 'store']);

// Show make expenses(expenditure) form 
Route::get('expense/create', [ExpenditureController::class, 'create']);

// Store
Route::post('/expenditure', [ExpenditureController::class, 'store']);

// Credit Routes
Route::get('/credits', [CreditController::class, 'index']);

// Show pay credit form
Route::get('sells/{sell}/edit', [CreditController::class, 'edit']);

// Pay credit
Route::put('sells/{sell}', [CreditController::class, 'update']);

// Reports
Route::get('reports', [AccountController::class, 'index']);

// AUTH ROUTES
// Show register view
Route::get('/register', [UserController::class, 'create']);

// Create new user
Route::post('/users', [UserController::class, 'store']);

// Show login form
Route::get('/login', [UserController::class, 'index']);

// Show login form
Route::post('/user/authenticate', [UserController::class, 'authenticate']);