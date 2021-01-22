<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ResourceController;

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
    return view('home');
});

Auth::routes();

//Static Routes
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [HomeController::class, 'admin'])->name('admin')->middleware('auth');

//Product Route
Route::get('/product/index', [ProductController::class, 'index'])->name('product.index')->middleware('auth');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create')->middleware('auth');
Route::post('/product/store/', [ProductController::class, 'store'])->name('product.store')->middleware('auth');
Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit')->middleware('auth');

//Resource Route
Route::get('/resource/create', [ResourceController::class, 'create'])->name('resource.create')->middleware('auth');
Route::post('/resource/store', [ResourceController::class, 'store'])->name('resource.store')->middleware('auth');
Route::get('/resource/index', [ResourceController::class, 'index'])->name('resource.index')->middleware('auth');
Route::get('/resource/edit/{resource}', [ResourceController::class, 'edit'])->name('resource.edit')->middleware('auth');
Route::put('/resource/update/{resource}', [ResourceController::class, 'update'])->name('resource.update')->middleware('auth');

