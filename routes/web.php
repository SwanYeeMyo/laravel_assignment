<?php

use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\productController\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
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
    Route::resource('roles',RoleController::class);
    Route::resource('permissions',PermissionController::class);
    Route::resource('employees',EmployeeController::class);
    Route::get('article/search',[ArticleController::class,'search'])->name('articles.search');

    // Route::post('users/createTable',[RegisteredUserController::class,'store'])->name('customUser.store');

 // Route::get('register', [RegisteredUserController::class, 'create'])
    //             ->name('register');
});

require __DIR__.'/auth.php';
