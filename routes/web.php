<?php

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

Auth::routes();

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('profile');
Route::post('/upload-profile-picture', [App\Http\Controllers\ProfilePictureController::class, 'upload'])->name('upload.profile.picture');

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
