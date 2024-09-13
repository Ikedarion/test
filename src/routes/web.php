<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

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
Route::get('/', [ContactController::class,'show'])->name('form.show');
Route::post('/confirm', [ContactController::class,'confirm'])->name('form.confirm');
Route::post('/thanks', [ContactController::class,'complete'])->name('form.complete');

Route::middleware('auth')->group(function() {
    Route::get('/admin',[ContactController::class,'index'])->name('admin');
});
Route::post('/register', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'destroy']);

Route::get('/search', [ContactController::class, 'search']);

Route::get('/modal#',[ContactController::class,'modal']);




