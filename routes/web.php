<?php

use App\Http\Controllers\CRUDController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('stripe', [StripeController::class, 'stripe'])->name('stripe');
Route::get('success', [StripeController::class, 'success'])->name('success');
Route::get('cancel', [StripeController::class, 'cancel'])->name('cancel');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallBack'])->name('auth.google.callback');

Route::get('admin', [CRUDController::class, 'admin'])->name('admin');
Route::get('createProduct', [CRUDController::class, 'newProduct'])->name('createProduct');
Route::post('createProduct', [CRUDController::class, 'createProduct'])->name('admin.createProduct');

Route::get('delete/{code}', [CRUDController::class, 'delete']);

Route::get('edit/{code}', [CRUDController::class, 'displayEdit']);
Route::post('edit/{code}', [CRUDController::class, 'edit']);