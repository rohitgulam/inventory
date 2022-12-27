<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\DailyAccountController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\ExpenditureController;

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
})->middleware('auth');

// Product Routes
Route::get('/products', [ProductController::class, 'index'])->middleware('auth');

Route::post('/products', [ProductController::class, 'store'])->middleware('auth');

Route::put('products/{product}/delete', [ProductController::class, 'destroy'])->middleware('auth');

Route::get('products/{product}/edit', [ProductController::class, 'edit'])->middleware('auth');

Route::put('products/{product}', [ProductController::class, 'update'])->middleware('auth');

// Add Bonus to product
// Show add bonus page
Route::put('products/bonus/{product}/edit', [ProductController::class, 'editBonus'])->middleware('auth');

Route::put('products/bonus/{product}', [ProductController::class, 'addBonus'])->middleware('auth');

// Purchases Routes
Route::get('/purchases', [PurchaseController::class, 'index'])->middleware('auth');

Route::get('/purchase/create', [PurchaseController::class, 'create'])->middleware('auth');

Route::post('/purchases', [PurchaseController::class, 'store'])->middleware('auth');


// Search product 
Route::post('/searchproduct', [ProductController::class, 'searchProduct'])->middleware('auth');


// Purchase Order Routes

// Create purchase order
Route::post('purchase/order/create', [PurchaseController::class, 'store'])->middleware('auth');

// Sales Routes

// Index 
Route::get('sells', [SellController::class, 'index'])->middleware('auth');

//Show create sell
Route::get('/sell/create', [SellController::class, 'create'])->middleware('auth');

// sell order
Route::post('sell/order/create', [SellController::class, 'store'])->middleware('auth');

// Credit Routes
Route::get('/credits', [CreditController::class, 'index'])->middleware('auth');

// Show pay credit form
Route::get('credits/{sell}/edit', [CreditController::class, 'edit'])->middleware('auth');

// Pay credit
Route::put('credits/{sell}', [CreditController::class, 'update'])->middleware('auth');

// Edit sell 
Route::put('sell/{sell}/edit', );

// Expenses Routes
// Index
Route::get('expenses', [ExpenditureController::class, 'index'])->middleware('auth');

// Search expens
Route::post('searchexpense', [ExpenseController::class, 'searchExpense'])->middleware('auth');

// Create expense
Route::post('expenses', [ExpenseController::class, 'store'])->middleware('auth');

// Create expense
Route::post('expenses', [ExpenseController::class, 'store'])->middleware('auth');

// Show make expenses(expenditure) form 
Route::get('expense/create', [ExpenditureController::class, 'create'])->middleware('auth');

// Store
Route::post('/expenditure', [ExpenditureController::class, 'store'])->middleware('auth');

// Reports
Route::get('reports', [AccountController::class, 'index'])->middleware('auth');

// AUTH ROUTES
// Show register view
Route::get('/register', [UserController::class, 'create'])->middleware('auth');

// Create new user
Route::post('/users', [UserController::class, 'store'])->middleware('auth');

// Show login form
Route::get('/login', [UserController::class, 'index'])->name('login')->middleware('guest');

// Show login form
Route::post('/user/authenticate', [UserController::class, 'authenticate'])->middleware('guest');

// Logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// TRANSPORT ROUTES
Route::get('/transport', [TransportController::class, 'index'])->middleware('auth');
// Get create form 
Route::get('/transport/create', [TransportController::class, 'create'])->middleware('auth');
// Store 
Route::POST('/transport/make', [TransportController::class, 'store'])->middleware('auth');

// Print ROutes
Route::get('/print', [SellController::class, 'print']);
Route::get('/print-products', [ProductController::class, 'print']);
Route::get('/print-purchases', [PurchaseController::class, 'print']);
Route::get('/print-expenses', [ExpenditureController::class, 'print']);
Route::get('/print-transport', [TransportController::class, 'print']);

// Income 
Route::get('/income', [DailyAccountController::class, 'index']);