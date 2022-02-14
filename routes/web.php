<?php

use Illuminate\Support\Facades\Route;

Route::resource('users', UserController::class);
Route::resource('addresses', AddressController::class);
Route::resource('posts', PostController::class);

Route::get('/', function () {
    return view('welcome');
});
