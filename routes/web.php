<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'posts');

Route::resource('posts', PostController::class);

Route::get('/{user}/posts',[DashboardController::class,'userPosts'])->name('posts.user');

Route::middleware('auth')->group(function (){
    Route::get('/dashboard',[DashboardController::class,'index'])
        ->name('dashboard');

    Route::post('/logout',[AuthController::class,'logout'])->name('logout');

});


Route::middleware('guest')->group(function (){

    Route::view('/register','auth.register')->name('register'); // this is for view/ displaying page

    Route::post('/register',[AuthController::class,'register']); // this is for taking/post data from form
    Route::view('/login','auth.login')->name('login'); // this is for view/ displaying page
    Route::post('/login',[AuthController::class,'login']); // this is for taking/post data from form

});
