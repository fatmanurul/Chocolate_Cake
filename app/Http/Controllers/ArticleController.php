<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Article::join('categories','categories.ctg_id', 'articles.art_category_id')
                           ->get();
        $category = Category::all();
      return view('admin.article.index',[
        'artikel' => $artikel,
        'category' => $category
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create',[
            'categories' => Category::where('ctg_status', 1)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);
        $requests = $request->input();
        $messages = [
            'required' => 'Silahkan isi kolom ini',
            'max' => 'Tidak boleh lebih dari 100 karakter'
        ];

        $request->validate([
            'art_title' => [
                'required',
                'max:100',
            ],
            'art_excerpt' => 'required|max:100',
            'art_image' => 'required|image',
            'art_content' => 'required'
        ], $messages);

        $check_art_title = Article::join('categories','categories.ctg_id','articles.art_category_id')
                                    ->where('art_title', $request->art_title .$request->ctg_id)
                                    ->where('ctg_id', $request->ctg_id)
                                    ->first();
        if($check_art_title == true){
         return redirect('/admin/articles/create')->with('error', 'Judul telah dipakai di dalam kategori!');
        }
                                    // dd($check_art_title);

        $article = new Article;
        
        $article-> art_title = $request->art_title;
        $article-> art_category_id =$request->ctg_id;
        $article-> art_slug = Str::slug($request->art_title);
        $article-> art_excerpt = $request->art_excerpt;
        $article-> art_image = $request->art_image;
        $article-> art_content = $request->art_content;

        if ($request->hasFile('art_image')) {
            $files = $request->file('art_image');
            $path = public_path('images/article-image');
            $files_name = 'images' . '/' . 'article-image' . '/' . date('Ymd') . '_' . $files->getClientOriginalName();
            $files->move($path, $files_name);
            $article->art_image = $files_name;
        }

        $article['art_created_by'] = auth()->user()->usr_id;

        $article->save();

        return redirect('/admin/articles')->with('success', 'Artikel baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
     {
       
        $artikel = Article::join('categories','categories.ctg_id', 'articles.art_category_id')
                             ->where('art_id',$article->art_id)
                             ->first();
                    return view('admin.article.show',[
                    'artikel' => $artikel,
                    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($article)
    {
        $articles = Article::join('categories','categories.ctg_id', 'articles.art_category_id')
                        ->where('art_id', $article)
                        ->first();
         $category = Category::where('ctg_id','!=', $articles->ctg_id)->get(); //dimana ctg_id sama dengan ctg_id sebelumnya maka tidak akan mucul 
                        // dd($articles);
        return view('admin.article.edit',[
            'article' => $articles,
            'category' => $category
        ]);
        // $article = Article::where('art_slug', $art_slug)->first();
        // return view('dashboard.article.edit',['Article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $articles)
    {
        // dd($request->file('art_image')->getClientOriginalName());

        $article = $request->validate([
            'art_title' => 'required|max:255 '
        ]);

        $update = Article::where('art_id', $articles)->first();
        $image = substr($update->art_image, 21);
       echo $request->art_image;
        $update->art_category_id = $request->ctg_id;
        $update->art_title = $request->art_title;
        $update->art_slug =  Str::slug($request->art_title);
        if($request->file('art_image')->getClientOriginalName() == $image ){} else{
            if ($request->hasFile('art_image')) {
                $files = $request->file('art_image');
                $path = public_path('images/article-image');
                $files_name = 'images' . '/' . 'article-image' . '/' . date('Ymd') . '_' . $files->getClientOriginalName();
                $files->move($path, $files_name);
                $update->art_image = $files_name;
            }
        }
        $update->art_excerpt = $request->art_excerpt;
        $update->art_content = $request->art_content;

        $update['art_updated_by'] = auth()->user()->usr_id;
       
        $update->update();

        return redirect('/admin/articles')->with('success', 'Artikel berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $rtaicle)
    {
        //
    }

    public function switch($id)
    {
        $status = Article::where('art_id', $id)->first(); //memilih data dari ctg_status lalu di ambil data yang pertama di temukan 
    //   dd($status);
        if($status->art_status == 1){ //mengecek status
           $status->art_status = 0;  //merubah data yang awalnya aktif jadi nonaktif
           $status->save();
        return redirect('/admin/articles')->with('success', 'Artikel telah dinonaktifkan!');
        }else{
            $status->art_status = 1;
            $status->save();
            return redirect('/admin/articles')->with('success', 'Artikel berhhasil diaktifkan!');  
        }
    }
}
