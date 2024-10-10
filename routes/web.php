<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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



Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::post('/product/save', [ProductController::class,"save"]);
Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');


Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::post('/category/save', [CategoryController::class,"save"]);
Route::delete('/category/delete/{id}', [CategoryController::class, 'delete'])->name('product.delete');
Route::get('/category/edit/{id}', [ProductController::class, 'edit'])->name('category.edit');


Route::get('tes', function(){
    return "tes";
} );
