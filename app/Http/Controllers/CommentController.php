<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Article;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::join('articles','articles.art_id', 'comments.cmn_articles_id')
                        ->get();
        $article = Article::all();
        return view('admin.comments.index',[
        'comments' => $comments,
        'Article' => $article
        ]);

    }

   
   
    public function store(Request $request, $slug)
    {
        $findArticle = Article::join('articles','articles.art_id', 'comments.cmn_articles_id')
                                ->where('art_slug', $slug)
                                ->get();
                                dd($findArticle);
        $requests = $request->input();
        $messages = [
            'required' => 'kolom wajib diisi'
        ];

        $request->validate([
            'cmn_comment' => 'required|max:600',
            'cmn_name' => 'required|max:255',
            'cmn_email' => 'required|email',
        ], $messages);

        
        $comments = new Comment;
        
        $comments-> cmn_articles_id = $request->art_id;
        $comments-> cmn_name = $request->cmn_name;
        $comments-> cmn_email = $request->cmn_email;
        $comments-> cmn_comment = $request->cmn_comment;

        $comments->save();

        return redirect();
    }
}
