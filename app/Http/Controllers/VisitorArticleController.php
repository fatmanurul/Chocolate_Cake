<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; //tambahkan nama model
use App\Models\Category;
use App\Models\Comment;


class VisitorArticleController extends Controller
{
    public function index(){
       
        $articles = Article::join('categories','categories.ctg_id', 'articles.art_category_id')
                           ->get();
        $category = Category::all();
    //  dd($category);
        return view ('visitor.visitor',['articles'=>$articles],compact('category'));
       }
   
    public function show($slug){
        //    $article_check = Article::where('articles.art_slug', $slug)
        //                            ->first(); //cara mengecek slug pertama
           $detail_article = Article::join('categories','categories.ctg_id', 'articles.art_category_id')
                                   ->where('articles.art_slug', $slug)
                                   ->first();

                                //    dd($detail_article);
           $category = Category::all();

           $comments = Article::join('comments','articles.art_id', 'comments.cmn_articles_id')
                              ->where('articles.art_slug', $slug)
                              ->get();

         $comments_count = Article::join('comments','articles.art_id', 'comments.cmn_articles_id')
                              ->where('articles.art_slug', $slug)
                              ->count();


                        return view ('visitor.detail-artikel',[
                            'articles' => $detail_article,
                            'category' => $category,
                            'comments' => $comments,
                            'comments_count' => $comments_count
                        ]);
       }


   
    public function category($id){
       $articles = Article::join('categories','categories.ctg_id', 'articles.art_category_id')
                           ->where('articles.art_category_id',$id)
                           ->get();
       $category = Category::all();
    //    dd($category);
       $category_now = category::where('ctg_id', $id)->first();
        return view ('visitor.artikels',['articles'=>$articles,'category_id'=>$id, 'ctg_name'=>$category_now],compact('category'));
      }
}
