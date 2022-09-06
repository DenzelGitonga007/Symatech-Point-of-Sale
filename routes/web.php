<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
use Illuminate\Foundation\Auth\User;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Defining the routes as per the resources
// eg orders.index or orders.save etc
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/orders', [OrderController::class]); //orders.index
Route::resource('products', [ProductController::class]); //product.index
Route::resource('/suppliers', [SupplierController::class]); //suppliers.index
Route::resource('/users', [User::class]); //users.index
Route::resource('/companies', [CompanyController::class]); //companies.index
Route::resource('/transactions', [TransactionController::class]); //transactions.index
