<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Article;

class CommentController extends Controller
{
    public function komentars()
    {
        $comments = Comment::join('articles','articles.art_id', 'comments.cmn_articles_id')
                        ->get();
        $article = Article::all();
        return view('dashboard.komentars.index',[
        'comments' => $comments,
        'Article' => $article
        ]);
    }
}
