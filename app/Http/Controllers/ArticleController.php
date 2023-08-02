<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; //tambahkan nama model
class ArticleController extends Controller
{
    public function index(){
      $articles = Article::all(); //menampilkan semua data di model article
      return view ('artikels',[
        'articles' => $articles //menampung data yang dipakai di view
      ]);
    }

    public function show($slug){
       $article_check = Article::where('articles.art_slug', $slug)->first(); //cara mengecek slug pertama
        $detail_article = Article::select('art_title', 'art_image', 'art_content')->where('articles.art_slug', $slug)->get();
        return view ('detail-artikel',[
            'articles' => $detail_article
        ]);
    }

    public function category($id){
      $category = Category::firstWhere('ctg_id', request('category'));
        return view('category',[
          'title' => $category->ctg_name, 
          'article' => $category->article, 
          'category' => $category->ctg_name
       ]);
   }
  
  }
