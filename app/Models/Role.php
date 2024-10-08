<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";
    protected $fillable = [
        'role_name',
    ];

    protected $hidden = [
        
    ];
    use HasFactory;

    public function user(){
        return $this->hasOne(User::class, "role_id", "id");
    }
}
