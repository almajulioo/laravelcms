<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    protected $fillable = [
        'content',
        'user_id',
        'article_id',
    ];

    protected $hidden = [];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class,  "user_id", "id");
    }

     public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
