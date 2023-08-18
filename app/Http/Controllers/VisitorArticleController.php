<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; //tambahkan nama model
use App\Models\Category;
use App\Models\Comment;


class VisitorArticleController extends Controller
{
    public function index(){
       
        // dd(request('search'));
        $articles = Article::join('categories','categories.ctg_id', 'articles.art_category_id')
                           ->get();
        $category = Category::all();//menampilkan kategori di filter kategori
    //  dd($category);
       $search = Article::latest();//cari data didalam artikel lalu urutkan berdasarkan yang paling baru

    if(request('search')) {//jika ada sesuatu yang ditulis dikolom pencarian akan ditambahkan ke query
        $search->where('art_title', 'like', '%' . request('search') . '%');//mencari apapun yang ada didepanya dan apappun yang ada dibelakangnya
    } 
    
    return view('visitor.visitor', [
        'articles' => $articles,
        'category' => $category,
        'search' => $search->get() //query dilakukan disini
    ]);//mengirimkan data kategori ke view
       }
   
    public function show($slug){
        //    $article_check = Article::where('articles.art_slug', $slug)
        //                            ->first(); //cara mengecek slug pertama
           $detail_article = Article::join('categories','categories.ctg_id', 'articles.art_category_id')
                                   ->where('articles.art_slug', $slug)
                                   ->first();

                                //    dd($detail_article);
           $category = Category::all();//untuk filter kategori

           $comments = Article::join('comments','articles.art_id', 'comments.cmn_articles_id')
                              ->where('articles.art_slug', $slug)
                              ->get();//untuk komen

         $comments_count = Article::join('comments','articles.art_id', 'comments.cmn_articles_id')
                              ->where('articles.art_slug', $slug)
                              ->count();


                        return view ('visitor.article-details',[
                            'articles' => $detail_article,
                            'category' => $category,
                            'comments' => $comments,
                            'comments_count' => $comments_count
                        ]);//untuk mengirim data ke view
       }

   
    public function category($id){
       $articles = Article::join('categories','categories.ctg_id', 'articles.art_category_id')
                           ->where('articles.art_category_id',$id)
                           ->get();
       $category = Category::all();
    //    dd($category);
       $category_now = category::where('ctg_id', $id)->first();//mencari ctg_id yang pertama ditemukan
        return view ('visitor.artikels',[
            'articles'=>$articles,
            'category_id'=>$id,
            'ctg_name'=>$category_now,
            'category' => $category
            ]);//agar langsung berisi categori yang sedang dipilih
      }
}
