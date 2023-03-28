<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id")->unsigned();
            $table->string("titles");
            $table->longText("content");
            $table->string("image_path");
            $table->date("published_date");
            $table->integer("views_count");
            $table->integer("likes_count");
            $table->integer("comments_count");
            $table->timestamps();
            $table->foreign("user_id")
            ->references("id")
            ->on("users")
            ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
