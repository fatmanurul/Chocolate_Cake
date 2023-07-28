<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function show()
     {
        return view('dashboard.artikels.show');
    }

    public function edit()
    {
        return view('dashboard.artikels.edit');
    }


    public function editkategori()
    {
        return view('dashboard.kategoris.edit');
    }
}
