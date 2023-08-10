<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Article;

class CommentController extends Controller
{
    public function index(Comment $comment)
    {
        $comments = Comment::join('articles','articles.art_id', 'comments.cmn_articles_id')
                            ->get();
                            // dd($comments);
        return view('admin.comments.index',[
        'comments' => $comments,
        ]);

    }

   
   
    public function store(Request $request, $slug)
    {

        $messages = [
            'required' => 'Silahkan isi kolom ini!'
        ];

        $request->validate([
            'cmn_comment' => 'required|max:600',
            'cmn_name' => 'required|max:255',
            'cmn_email' => 'required|email',
        ], $messages);

        $findArticle = Article::where('art_slug', $slug)->first();
        
        $comments = new Comment;
        //  dd($findArticle);
        $comments-> cmn_articles_id = $findArticle->art_id; 
        $comments-> cmn_name = $request->cmn_name;
        $comments-> cmn_email = $request->cmn_email;
        $comments-> cmn_comment = $request->cmn_comment;

        $comments->save();

        return redirect("/articles/$slug")->with('success', 'Artikel telah diperbarui!');
    }
}
