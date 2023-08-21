<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; //tambahkan nama model
use App\Models\Category;
use App\Models\Comment;


class VisitorArticleController extends Controller
{
    public function index(Request $request) {//menerima parameter $request, yang merupakan instansi dari kelas Request. Kelas Request digunakan untuk mengakses data yang dikirimkan oleh pengguna melalui HTTP request.
        $query = $request->input('search');// mengambil nilai dari parameter "search" yang dikirimkan melalui request. Parameter "search" diambil dari input form pencarian, Nilai ini akan digunakan untuk mencari artikel berdasarkan kriteria pencarian.
        $category = Category::all();//menampilkan kategori di filter kategori
    
        // Jika ada query pencarian
        if ($query) {
            $articles = Article::join('categories', 'categories.ctg_id', 'articles.art_category_id')//Ini adalah query untuk menggabungkan tabel articles dengan tabel categories berdasarkan kolom art_category_id dari tabel articles dan ctg_id dari tabel categories.
                ->where('articles.art_title', 'LIKE', '%' . $query . '%')// kondisi pencarian berdasarkan judul artikel yang mengandung kata kunci yang dimasukkan pengguna.
                ->orWhere('articles.art_excerpt', 'LIKE', '%' . $query . '%')//kondisi pencarian berdasarkan kutipan artikel yang mengandung kata kunci yang dimasukkan pengguna.
                ->orderBy('articles.art_created_at', 'desc') // Mengurutkan berdasarkan tanggal pembuatan terbaru
                ->get();//metode untuk mengeksekusi query dan mengambil data artikel sesuai kriteria pencarian.
        } else {//. Query ini akan mengambil semua artikel tanpa memasukkan kriteria pencarian.
            // Ambil semua artikel tanpa pencarian
            $articles = Article::join('categories', 'categories.ctg_id', 'articles.art_category_id')
            ->orderBy('articles.art_created_at', 'desc') // Mengurutkan berdasarkan tanggal pembuatan terbaru
                ->get();
        } 
        return view('visitor.visitor', [
            'articles' => $articles,
            'category' => $category,
        ]);
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

   
    public function category($id, Request $request){
       $query = $request->input('search');
       $category = Category::all();
       if ($query) {
        $articles = Article::join('categories', 'categories.ctg_id', 'articles.art_category_id')//Ini adalah query untuk menggabungkan tabel articles dengan tabel categories berdasarkan kolom art_category_id dari tabel articles dan ctg_id dari tabel categories.
            ->where('articles.art_title', 'LIKE', '%' . $query . '%')// kondisi pencarian berdasarkan judul artikel yang mengandung kata kunci yang dimasukkan pengguna.
            ->orWhere('articles.art_excerpt', 'LIKE', '%' . $query . '%')//kondisi pencarian berdasarkan kutipan artikel yang mengandung kata kunci yang dimasukkan pengguna.
            ->orderBy('articles.art_created_at', 'desc') // Mengurutkan berdasarkan tanggal pembuatan terbaru
            ->get();//metode untuk mengeksekusi query dan mengambil data artikel sesuai kriteria pencarian.
    } else {//. Query ini akan mengambil semua artikel tanpa memasukkan kriteria pencarian.
        // Ambil semua artikel tanpa pencarian
        $articles = Article::join('categories', 'categories.ctg_id', 'articles.art_category_id')
        ->get();
    } 
       $articles = Article::join('categories','categories.ctg_id', 'articles.art_category_id')
       ->where('articles.art_category_id',$id)
       ->orderBy('articles.art_created_at', 'desc') // Mengurutkan berdasarkan tanggal pembuatan terbaru
       ->get();
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
