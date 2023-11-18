<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\OrderController;

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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/admin', [UserController::class, 'index'])->name('admin')->middleware('auth', 'admin');
Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('auth', 'user');
Route::get('/superadmin', [UserController::class, 'index'])->name('superadmin')->middleware('auth', 'superadmin');

Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');

Route::get('/password', [UserController::class, 'showPasswordUpdateForm'])->name('password');
Route::put('/password/update', [UserController::class, 'updatePassword'])->name('password.update');

Route::get('/manageadmin', [UserController::class, 'showManageAdmin'])->name('manageadmin')->middleware('auth', 'superadmin');

Route::get('/addadmin', [UserController::class, 'create'])->name('addadmin');
Route::put('/addadmin/add', [UserController::class, 'store'])->name('addadmin.add');

Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


Route::resource('products', ProductController::class)->middleware('auth', 'admin');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/ingredients', [IngredientController::class, 'index'])->name('ingredients.index');
Route::get('/ingredients/create', [IngredientController::class, 'create'])->name('ingredients.create');
Route::get('/ingredients/{id}/edit', [IngredientController::class, 'edit'])->name('ingredients.edit');
Route::post('/ingredients', [IngredientController::class, 'store'])->name('ingredients.store');
Route::put('/ingredients/{id}', [IngredientController::class, 'update'])->name('ingredients.update');
Route::delete('/ingredients/{id}', [IngredientController::class, 'destroy'])->name('ingredients.destroy');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
Route::delete('/orders/{id}/cancel', [OrderController::class, 'destroy'])->name('orders.destroy');
