<?php

use App\Models\Artikel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArtikelController;
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

Route::get('/', function () {
    return view('artikels',[
        "title" => "Artikels"
    ]);
});

Route::get('/categories', function () {
    return view('kategori',[
        "title" => "kategori"
    ]);
});

// Route::get('/artikels{slug}', function ($slug){
//     return view('artikel',[
//         "title" => "single post",
//         "post" => Artikel::find($slug)
//     ]);
// });

// Route::get('/artikels',[ArtikelController::class, 'index']);
// Route::get('/artikels/{artikel}',[ArtikelController::class, 'show']);

Route::get('/dashboard',function(){
    return view('dashboard.index');
});

Route::get('/dashboard/kategoris/1', [CobaController::class,'show']);
Route::get('/dashboard/kategoris/1/edit', [CobaController::class,'edit']);
Route::resource('/dashboard/kategoris', DashboardKategoryController::class);

Route::get('/dashboard/artikels/1', [CobaController::class,'show']);
Route::get('/dashboard/artikels/1/edit', [CobaController::class,'edit']);


Route::resource('/dashboard/artikels',DashboardArtikelController::class);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

