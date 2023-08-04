<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Article;

class DashboardController extends Controller
{
    public function index(){
        $jml_komen = Comment::all()->count();
        $jml_kategori = Category::all()->count();
        $jml_artikel = Article::all()->count();
        return view('admin.dashboard',[
            'jml_komen' => $jml_komen,
            'jml_kategori' => $jml_kategori,
            'jml_artikel' => $jml_artikel,
        ]);
    }
}
