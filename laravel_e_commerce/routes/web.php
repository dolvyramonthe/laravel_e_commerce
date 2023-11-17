<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
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

Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');

Route::get('/password', [UserController::class, 'showPasswordUpdateForm'])->name('password');
Route::put('/password/update', [UserController::class, 'updatePassword'])->name('password.update');
Route::resource('products', ProductController::class)->middleware('auth', 'admin');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/dashboard', [OrderController::class, 'dashboard'])->name('dashboard');
Route::get('/neworder', [OrderController::class, 'showAddOrderForm'])->name('neworder');
Route::put('/addorder', [OrderController::class, 'addOrder'])->name('addorder');
Route::put('/addorderproduct', [OrderController::class, 'addOrderProduct'])->name('addorderproduct');