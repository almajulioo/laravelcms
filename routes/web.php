<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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
   

    Route::middleware('checkRole:admin')->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('atur/{role}', [UserController::class, 'getUsersRole'])->name('dashboard.aturrole');
            Route::get('tambah-user', [UserController::class, 'tambahUserForm'])->name('dashboard.tambahuser');
            Route::post('tambah-user', [UserController::class, 'store']);
            Route::prefix('article')->group(function () {
                Route::post('{id}/comment', [CommentController::class, 'store'])->name('article.comment');
                Route::middleware('checkRole:admin,editor')->group(function () {
                    Route::get('', [ArticleController::class, 'ArticleForm'])->name('article.store');
                    Route::post('', [ArticleController::class, 'store'])->name('article');
                    Route::get('edit/{id}', [ArticleController::class, 'EditArticleForm'])->name('article.edit');
                    Route::post('edit/{id}', [ArticleController::class, 'update']);
                    Route::get('delete/{id}', [ArticleController::class, 'delete'])->name('article.delete');
                });
            });
        });
    });
});