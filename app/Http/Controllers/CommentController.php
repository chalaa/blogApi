<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use function PHPUnit\Framework\isEmpty;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        $comments = Comment::where("post_id",$id)->get();
        if ($comments->isEmpty()){
            return response(json_encode("post have no comments"));
        }
        return response($comments);
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
            "user_id" => ["required","integer"],
            "post_id" => ["required","integer"],
            "content" => ["required","string"],
        ]);

        $comment=Comment::create([
            "user_id" => $request->user_id,
            "post_id" => $request->post_id,
            "content" => $request->content
        ]);

        $post = Post::find($request->post_id);
        $comment_count = $post->comments_count+1;
        $post->update([
            "comments_count" => $comment_count
        ]);

        return response($comment);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        return Comment::find($id);
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
