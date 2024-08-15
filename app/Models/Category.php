<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = [
        'name',
        'slug',
        'desc',
    ];

    protected $hidden = [
        
    ];
    use HasFactory;
    public function category(){
        $this->hasOne(Article::class, 'id', 'category_id');
    }
}
