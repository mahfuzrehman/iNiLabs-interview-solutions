<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'index'])->name('/');
Route::post('/store', [ProductController::class, 'store'])->name('store');

Route::get('/unpublished/{id}', [ProductController::class, 'unpublishedProduct'])->name('unpublished');
Route::get('/published/{id}', [ProductController::class, 'publishedProduct'])->name('published');
  
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
Route::get('/destroy/{id}', [ProductController::class, 'destroy'])->name('destroy');
  