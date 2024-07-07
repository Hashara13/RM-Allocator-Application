<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [ProductsController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductsController::class, 'create'])->name('product.create');
Route::post('/product', [ProductsController::class, 'store'])->name('product.store');
Route::get('/product/update/{product}', [ProductsController::class, 'update'])->name('product.update');
Route::put('/product/new/{product}', [ProductsController::class, 'new'])->name('product.new');
Route::delete('/product/delete/{product}', [ProductsController::class, 'delete'])->name('product.delete');
