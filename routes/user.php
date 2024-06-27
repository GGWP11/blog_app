<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;

Route::prefix('user')->name('user.')->group(function(){
    Route::middleware(['auth:web'])->group(function(){
        Route::get('/home',[UserController::class,'index'])->name('home');
    });

    Route::prefix('posts')->name('posts.')->group(function(){
        Route::get('/view-post',[UserController::class,'viewPost'])->name('view-post');
    });
});