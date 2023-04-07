<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\PostCategories;
use App\Models\PostTag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::all();

        $result = [];

        foreach($posts as $post){
            $result[]=new PostResource($post);
        }

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "user_id"=>["required"],
            "titles"=>["required","string"],
            "content"=>["required","string"],
            "image_path"=>["required","image"],
            "published_date"=>["required","date"],
            "views_count"=>["required","integer"],
            "category_id"=>["required"],
            "tag_id"=>["required"]
        ]);

        $post = Post::create([
            "user_id"=> $request->user_id,
            "titles"=> $request->titles,
            "content"=> $request->content,
            "image_path"=> $request->file("image_path")->store("images","public"),
            "published_date"=> $request->published_date,
            "views_count"=> $request->views_count,
            "likes_count"=> 0,
            "comments_count"=> 0
        ]);

        $post_id = $post->id;
        $categories = explode(",",$request->category_id);
        $tags = explode(",",$request->tag_id);
        foreach ($categories as $category){
            PostCategories::create([
                "post_id"=> $post_id,
                "category_id"=> $category
            ]);
        }
        foreach ($tags as $tag){
            PostTag::create([
                "post_id"=> $post_id,
                "tag_id"=> $tag
            ]);
        }

        return new PostResource(Post::find($post->id));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return new PostResource(Post::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}