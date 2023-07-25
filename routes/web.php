<?php

use App\Models\Artikel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;

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

Route::get('/', [ArtikelController::class, '']);

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

Route::get('/artikels',[ArtikelController::class, 'index']);
Route::get('/artikels/{artikel}',[ArtikelController::class, 'show']);

