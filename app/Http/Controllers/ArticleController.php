<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; //tambahkan nama model
use App\Models\Category;
class ArticleController extends Controller
{
    public function index(){
     $articles = Article::join('categories','categories.ctg_id', 'articles.art_category_id')
                        ->get();
     $category = Category::all();

     return view ('artikels',['articles'=>$articles],compact('category'));
    }

    public function show($slug){
        $article_check = Article::where('articles.art_slug', $slug)
                                ->first(); //cara mengecek slug pertama
        $detail_article = Article::join('categories','categories.ctg_id', 'articles.art_category_id')
                                ->where('articles.art_slug', $slug)
                                ->get();
        $category = Category::all();
        return view ('detail-artikel',[
            'articles' => $detail_article,
            'category' => $category
        ]);
    }

    public function category($id){
    $articles = Article::join('categories','categories.ctg_id', 'articles.art_category_id')
                        ->where('articles.art_category_id',$id)
                        ->get();
    $category = Category::all();
     return view ('artikels',['articles'=>$articles],compact('category'));
   }
  
  }
