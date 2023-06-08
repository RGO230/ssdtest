<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/home', [ProductController::class, 'show'])->name('home');
Route::get('/shop', [ProductController::class, 'shop']);
Route::get('/productsingle/{product}',[ProductController::class,'singlePage']);
Route::get('/cart/index', [CartController::class,'index']);
Route::get('/cart/checkout',[CartController::class,'checkout']);
Route::post('/cart/add/{id}', [CartController::class,'add'])
    ->where('id', '[0-9]+')
    ->name('cart.add');

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/product/{product}/destroy', [ProductController::class, 'destroy']);
    Route::post('product/{product}/update', [ProductController::class, 'update']);
    Route::resource('product', ProductController::class);
});
