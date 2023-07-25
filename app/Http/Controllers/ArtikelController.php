<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index($slug){

    return view('artikels',[
        "title" => "artikels",
        "artikels" => Artikel::all()
    ]);
}
public function show(Artikel $artikel)
{
    return view('artikel',[
        "title" => "Single Artikel",
        "artikel" => $artikel
    ]);
  }
}
