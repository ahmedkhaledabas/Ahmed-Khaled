<?php

use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\DashboardController;
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
Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::get('dashboard/products',[ProductController::class,'index'])->name('dashboard.products.index');
Route::get('dashboard/product/crete',[ProductController::class,'create'])->name('dashboard.products.crete');
Route::post('dashboard/product/store',[ProductController::class,'store'])->name('dashboard.products.store');
