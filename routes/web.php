<?php

use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\productController\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Users\UserController;
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



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/articles',ArticleController::class);
    Route::get('prodoucts/read/{id}',[ProductController::class,'read'])->name('products.read');
    Route::resource('products',ProductController::class);
    // Route::resource('/users',[UserController::class]);
    Route::resource('/users',UserController::class);
    Route::post('users/createTable',[RegisteredUserController::class,'store'])->name('customUser.store');
});

require __DIR__.'/auth.php';
