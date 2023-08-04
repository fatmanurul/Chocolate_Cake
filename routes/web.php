<?php

use App\Models\Artikel;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\VisitorArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// route halaman awal
Route::get('/', [VisitorArticleController::class,'index']);
Route::get('/detail/{slug}', [VisitorArticleController::class,'show']);
Route::get('/kategori/{id}', [VisitorArticleController::class, 'category']);

//route auth
Route::get('/login', [LoginController::class ,'index'])->name('login');
Route::post('/login', [LoginController::class ,'authenticate']);
Route::post('/logout', [LoginController::class ,'logout']);

// route dashboard
Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth');

// route cms kategori
Route::resource('/categories', CategoryController::class)->middleware('auth');

// route cms artikel
Route::resource('/articles',ArticleController::class)->middleware('auth');

// route cms comment
Route::get('/comments', [CommentController::class,'index'])->middleware('auth');
Route::post('/detail/{slug}',[CommentController::class,'store']);



