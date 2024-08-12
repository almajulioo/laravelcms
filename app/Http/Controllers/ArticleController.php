<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::all();
        return view('home')->with('articles', $articles);
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|',
            'content' => 'required|string|',
        ]);

        Article::create([
            'title'=> $request->title,
            'slug'=> $request->slug,
            'content'=> $request->content,
            'user_id'=> $request->user_id,
            'category_id'=> $request->category_id
        ]);

        return redirect('article');
    }

    public function ArticleForm(){
        return view('article.form');
    }
}
