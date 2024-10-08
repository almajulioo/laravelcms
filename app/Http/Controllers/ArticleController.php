<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::all();
        return view('home')->with('articles', $articles);
    }
    public function getArticleById($id){
        $article = Article::find($id);
        $comments = Comment::where('article_id', $id)->get();
        return view('article.get')->with(['article'=> $article, 'comments'=>$comments]);
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

    public function update(Request $request, $id){

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|',
            'content' => 'required|string|',
        ]);
        $article = Article::find($id);
        $article->update([
            'title'=> $request->title,
            'slug'=> $request->slug,
            'content'=> $request->content,
            'user_id'=> auth()->user()->id,
            'category_id'=> $request->category_id
        ]);
        return back()->with('success', 'Your article has been updated!');
    }
 
    public function delete($id){
        $article = Article::findOrFail($id);
        $article->delete();
        return back()->with('success', 'Your article has been deleted!');
    }

    public function ArticleForm(){
        $categories = Category::all();
        $role = Role::all();
        return view('article.form')->with(['categories'=> $categories, 'roles' => $role]);
    }
    public function EditArticleForm($id){
        $categories = Category::all();
        $article = Article::find($id);
        return view('article.edit')->with([
            'categories'=> $categories,
            'article'=> $article
        ]);
    }

}
