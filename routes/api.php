<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// user route
Route::get("/user",[UserController::class,"index"]);
Route::get("/user/{id}",[UserController::class,"show"]);
Route::post("/user",[UserController::class,"store"]);


// tag routes

Route::get("/tag",[TagController::class,"index"]);
Route::get("/tag/{id}",[TagController::class,"show"]);
Route::post("/tag",[TagController::class,"store"]);

// category routes

Route::get("/category",[CategoryController::class,"index"]);
Route::get("/category/{id}",[CategoryController::class,"show"]);
Route::post("/category",[CategoryController::class,"store"]);


//post routes

Route::get("/post",[PostController::class,"index"]);
Route::get("/post/{id}",[PostController::class,"show"]);
Route::post("/post",[PostController::class,"store"]);

//comment route

Route::get("/comment/{id}",[CommentController::class, "index"]);
Route::post("/comment",[CommentController::class, "store"]);
