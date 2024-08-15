<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
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
            'user_id'=> auth()->user()->id,
            'category_id'=> $request->category_id
        ]);
        return back()->with('success', 'Your article has been created!');
    }

    public function ArticleForm(){
        $categories = Category::all();
        return view('article.form')->with('categories', $categories);
    }
}
