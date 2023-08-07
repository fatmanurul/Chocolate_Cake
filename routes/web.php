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
Route::get('/articles/{slug}', [VisitorArticleController::class,'show']);
Route::get('/categories/{id}', [VisitorArticleController::class, 'category']);

// route cms comment
Route::get('/admin/comments', [CommentController::class,'index'])->middleware('auth');
Route::post('/detail/{slug}',[CommentController::class,'store']);

//route auth
Route::get('/login', [LoginController::class ,'index'])->name('login');
Route::post('/login', [LoginController::class ,'authenticate']);
Route::post('/logout', [LoginController::class ,'logout']);

// route dashboard
Route::get('/admin/dashboard',[DashboardController::class,'index'])->middleware('auth');

// route cms kategori
Route::resource('/admin/categories', CategoryController::class)->middleware('auth');
Route::get('/admin/categories/{id}/switch', [CategoryController::class,'switch']);

// route cms artikel
Route::resource('/admin/articles',ArticleController::class)->middleware('auth');
Route::get('/admin/articles/{id}/switch', [ArticleController::class,'switch']);






