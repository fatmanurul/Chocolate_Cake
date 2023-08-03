<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardArtikelController extends Controller
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
      return view('dashboard.artikels.index',[
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
        return view('dashboard.artikels.create',[
            'categories' => Category::all()
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
        $requests = $request->input();
        $messages = [
            'required' => 'kolom wajib diisi'
        ];

        $request->validate([
            'art_title' => 'required|max:255',
            'art_excerpt' => 'required',
            'art_image' => 'image',
            'art_content' => 'required'
        ], $messages);

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

        $article->save();
       
        // $validatedData = $request->validate([
        //     'art_title' => 'required|max:255',
        //     'art_category_id' => 'required',
        //     'art_excerpt' => 'required',
        //     'art_image' => 'image',
        //     'art_content' => 'required'
        // ]);
       

        // Article::create([
        //     'art_title' => $request-> art_title,
        //     'art_slug' => Str::art_slug($request->art_title),
        //     'art_category_id' => 1,
        //     'art_excerpt' => $request->art_excerpt,
        //     'art_image' => 'art_image',
        //     'art_content' => $request->art_content
        // ]);

        return redirect('/articles')->with('success', 'Artikel baru telah ditambahkan!');
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
                    return view('dashboard.artikels.show',[
                    'artikel' => $artikel,
                    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('dashboard.artikels.edit',[
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
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
}
