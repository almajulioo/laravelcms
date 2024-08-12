<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;



Route::get('/login', [AuthController::class,'loginForm'])->name('login');
Route::post('/login', [AuthController::class,'loginAction']);
Route::get('/register', [AuthController::class,'registerForm'])->name('register');
Route::post('/register', [AuthController::class,'registerAction']);
Route::get('/logout', [AuthController::class,'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('home');
    Route::get('/article', [ArticleController::class, 'ArticleForm'])->name('article');
    Route::post('/articlestore', [ArticleController::class, 'store'])->name('article.store');
});