<?php

namespace App\Http\Controllers;
use App\Models\Category; 
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    
    public function index($id){
        $category = Category::firstWhere('ctg_id', request('category'));
        return view('category',[
          'title' => $category->ctg_name, 
          'article' => $category->article, 
          'category' => $category->ctg_name

        ]);
     } 
}
