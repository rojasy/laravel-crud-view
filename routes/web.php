<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('posts.index');
})->name('home');

Route::view('/register','auth.register')->name('register'); // this is for view/ displaying page

Route::post('/register',[AuthController::class,'register']); // this is for taking/post data from form
Route::view('/login','auth.login')->name('login'); // this is for view/ displaying page
Route::post('/login',[AuthController::class,'login']); // this is for taking/post data from form
