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

    public function update()
    {
        return view('dashboard.artikels.index');
    }


    public function editkategori()
    {
        return view('dashboard.kategoris.edit');
    }

    public function updatekategori()
    {
        return view('dashboard.kategoris.index');
    }

    public function komentars()
    {
        return view('dashboard.komentars.index');
    }
}
