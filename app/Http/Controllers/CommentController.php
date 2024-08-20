<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id){
        $request->validate([
            'content' => 'required|string|max:255',
        ]);
        Comment::create([
            'content'=> $request->content,
            'user_id'=> auth()->user()->id,
            'article_id'=> $id
        ]);
        return back()->with('success', 'Your comment has been created!');
    }
}
