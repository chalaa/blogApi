<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"
    ];

    protected $guarded = false;

    public function post(){
        return $this->belongsToMany(Post::class,"post_id","id");
    }
}
