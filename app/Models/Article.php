<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";
    protected $fillable = [
        'title',
        'slug',
        'content',
        'user_id',
        'category_id',
    ];

    protected $hidden = [
        
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($article) {
            $article->comments()->delete();
        });
    }
    use HasFactory;
    
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
