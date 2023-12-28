<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('website.index');
})->name('index');

Route::get('post', function(){
    return view('website.post');
});

Auth::routes();

// Backend Routes
Route::get('/home', [HomeController::class, 'index'])->name('home');
//Category Routes
Route::resource('category', CategoryController::class);
Route::get('category/trashed/list', [CategoryController::class ,'trashed'])->name('category.trashed.list');
Route::get('category/delete/{id}', [CategoryController::class ,'delete'])->name('category.delete');
Route::get('category/restore/{id}', [CategoryController::class ,'restore'])->name('category.restore');
//Post Routes
Route::resource('post',PostController::class);