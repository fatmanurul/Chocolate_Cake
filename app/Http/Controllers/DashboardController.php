<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Article;

class DashboardController extends Controller
{
    public function index(){
        $comments_count = Comment::all()->count();
        $categories_count = Category::all()->count();
        $articles_count = Article::all()->count();
        return view('admin.dashboard',[
            'comments_count' => $comments_count,
            'categories_count' => $categories_count,
            'articles_count' => $articles_count,
        ]);
    }
}
