<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['as' => 'auth.', 'prefix' => 'auth'] ,function () {
    Route::post('login', [AuthController::class, 'login'])
        ->name('login');
    Route::post('register', [AuthController::class, 'register'])
        ->name('register');
    Route::middleware('auth:api')
        ->post('me', [AuthController::class, 'me'])
        ->name('me');
});

Route::group(['as' => 'product.', 'prefix' => 'product'] ,function () {
    Route::get('/', [ProductController::class, 'index'])
        ->name('index');
});

Route::group(['as' => 'comments.', 'prefix' => 'comments'] ,function () {
    Route::middleware('auth:api')
        ->post('/', [CommentController::class, 'store'])
        ->name('comments');
});
