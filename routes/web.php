<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/products', [ProductController::class, 'index'])->name('products')->middleware(['auth', 'verified']);
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('product.edit');

Route::middleware(['auth', 'verified', 'role:Admin'])->group(function () {
    Route::get('admin/products', [ProductController::class, 'adminIndex'])->name('product.index');
    Route::get('admin/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('admin/product/create', [ProductController::class, 'store'])->name('product.store');
    Route::get('admin/product/edit/{product:id}', [ProductController::class, 'edit'])->name('product.edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
