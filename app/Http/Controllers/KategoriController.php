<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    function brownies(){
        return view('kategori.brownies');
    }

    function cookies(){
        return view('kategori.cookies');
    }

    function cupcake(){
        return view('kategori.cupcake');
    }
}
