<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    function cupcake(){
        return view('detail.cupcake');
    }

    function brownies(){
        return view('detail.brownies');
    }

    function cookies(){
        return view('detail.cookies');
    }
   
}
