<?php

use App\Models\Artikel;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardArticleController;
use App\Http\Controllers\DashboardCategoryController;

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

// route dashboard
Route::get('/dashboard',function(){
    return view('dashboard.index'); 
})->middleware('auth');

// route halaman awal
Route::get('/', [ArticleController::class,'index']);
Route::get('/detail/{slug}', [ArticleController::class,'show']);
Route::get('/kategori/{id}', [ArticleController::class, 'category']);

//route auth
Route::get('/login', [LoginController::class ,'index']);
Route::post('/login', [LoginController::class ,'authenticate']);
Route::post('/logout', [LoginController::class ,'logout']);

// route cms kategori
Route::resource('/categories', DashboardCategoryController::class);

// route cms comment
Route::get('/comments', [CommentController::class,'komentars']);

// route cms artikel
Route::resource('/articles',DashboardArticleController::class);



