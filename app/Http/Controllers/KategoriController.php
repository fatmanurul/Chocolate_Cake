<?php

namespace App\Http\Controllers;
use App\Models\Category; 
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    
    public function index($id){
        $category_check = Category::where('categories.ctg_id', $id)->first(); //cara mengecek id pertama
         $category = Category::select('ctg_name')->where('categories.ctg_id', $id)->get();
         return view ('Article',[
             'category' => $category
         ]);
     } 
}
