<?php

use App\Models\Artikel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardArtikelController;
use App\Http\Controllers\DashboardKategoryController;

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
Route::get('/', [ArticleController::class,'index']);
Route::get('/detail/{slug}', [ArticleController::class,'show']);
Route::get('/kategori/{id}', [ArticleController::class, 'category']);

// route cms kategori
Route::get('/categories/judul-artikel/edit', [CobaController::class,'editkategori']);
Route::post('/categories/judul-artikel/edit', [CobaController::class,'updatekategori']);
Route::resource('/categories', DashboardKategoryController::class);

// route comment
Route::get('/comments', [CobaController::class,'komentars']);

// route cms artikel
Route::get('/articles/judul-artikel', [CobaController::class,'show']);

Route::get('articles/judul-artikel/edit', [CobaController::class,'edit']);
Route::post('/articles/judul-artikel/edit', [CobaController::class,'update']);

Route::post('/articles/judul-artikel/edit', [CobaController::class,'update']);
Route::resource('/articles',DashboardArtikelController::class);

//route auth
Route::get('/login', [LoginController::class ,'index']);
Route::post('/login', [LoginController::class ,'authenticate']);
Route::post('/logout', [LoginController::class ,'logout']);

// route dashboard
Route::get('/dashboard',function(){
    return view('dashboard.index'); 
})->middleware('auth');
