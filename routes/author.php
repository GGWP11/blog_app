<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthorController;

Route::prefix('author')->name('author.')->group(function(){
    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login','back.pages.auth.login')->name('login');
        Route::view('/forgot-password','back.pages.auth.forgot')->name('forgot-password');
    });

    Route::middleware(['auth:web'])->group(function(){
        Route::get('/home',[AuthorController::class,'index'])->name('home');
    });

    Route::prefix('posts')->name('posts.')->group(function(){
        Route::view('/add-post','back.pages.add-post')->name('add-post');
        Route::post('/create',[AuthorController::class, 'createPost'])->name('create');
        Route::view('/all','back.pages.auth.all_posts')->name('all_posts');
        Route::get('/edit-post',[AuthorController::class,'editPost'])->name('edit-post');
        Route::post('/update-post',[AuthorController::class,'updatePost'])->name('update-post');
        Route::get('/view-post',[AuthorController::class,'viewPost'])->name('view-post');
    });
});