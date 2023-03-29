<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "name" 
    ];

    protected $guarded = false;

    public function post(){
        return $this->belongsToMany(Post::class,"post_id","id");
    }

    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }
}
