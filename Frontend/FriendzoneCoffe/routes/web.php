<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\UserMejaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register.submit');
    Route::post('logout',  [AuthController::class, 'logout'])->name('logout');
    Route::get('logout',  [AuthController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
        // Rute untuk dashboard admin
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('admin.web.dashboard');
    });
    
    Route::group(['middleware' => ['auth'], 'prefix' => 'customer', 'as' => 'customer.'], function () {
        // Rute untuk dashboard customer
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('customer.web.dashboard');
    });

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
// Route::resource('categories', CategoryController::class);

Route::resource('products', ProductController::class);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/product', [UserController::class, 'index'])->name('customer.products.index');

Route::resource('mejas', MejaController::class);
Route::get('/mejas', [MejaController::class, 'index'])->name('mejas.index');
Route::get('/mejas/create', [MejaController::class, 'create'])->name('mejas.create');
Route::post('/mejas', [MejaController::class, 'store'])->name('mejas.store');
Route::get('/mejas/{id}', [MejaController::class, 'show'])->name('mejas.show');
Route::get('/mejas/{id}/edit', [MejaController::class, 'edit'])->name('mejas.edit');
Route::put('/mejas/{id}', [MejaController::class, 'update'])->name('mejas.update');
Route::delete('/mejas/{id}', [MejaController::class, 'destroy'])->name('mejas.destroy');

Route::get('/meja', [UserMejaController::class, 'index'])->name('customer.mejas.index');

Route::get('/carts', [CartController::class, 'index'])->name('customer.carts.index');
Route::post('/carts', [CartController::class, 'store'])->name('carts.store');
Route::put('/carts/{id}', [CartController::class, 'update'])->name('carts.update');
Route::delete('/carts/{id}', [CartController::class, 'destroy'])->name('carts.destroy');



    