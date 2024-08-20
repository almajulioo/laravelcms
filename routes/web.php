<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;



Route::get('/login', [AuthController::class,'loginForm'])->name('login');
Route::post('/login', [AuthController::class,'loginAction']);
Route::get('/register', [AuthController::class,'registerForm'])->name('register');
Route::post('/register', [AuthController::class,'registerAction']);
Route::get('/logout', [AuthController::class,'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('home');
    Route::get('/article/{id}', [ArticleController::class, 'getArticleById'])->name('article.get');
    Route::post('/article/{id}/comment', [CommentController::class, 'store'])->name('article.comment');
    Route::middleware('checkRole:admin,editor')->group(function () {
        Route::get('/article', [ArticleController::class, 'ArticleForm'])->name('article.store');
        Route::post('/article', [ArticleController::class, 'store'])->name('article');
        Route::get('/article/edit/{id}', [ArticleController::class, 'EditArticleForm'])->name('article.edit');
        Route::post('/article/edit/{id}', [ArticleController::class, 'update']);
        Route::get('/article/delete/{id}', [ArticleController::class, 'delete'])->name('article.delete');
    });
});