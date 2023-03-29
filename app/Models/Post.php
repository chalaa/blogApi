<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "titles",
        "content",
        "image_path",
        "published_date",
        "views_count",
        "likes_count",
        "comments_count"
    ];

    protected $guarded = false;

    public function comment(){
        return $this->hasMany(Post::class, "post_id","id");
    }

    public function user(){
        return $this->belongsTo(User::class, "user_id","id");
    }

    public function tag(){
        return $this->belongsToMany(Tag::class, "tag_id","id");
    }

    public function category(){
        return $this->belongsToMany(Category::class, "category_id","id");
    }
}
