<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\userAuthController;

//Public Routes:

//Posts routes
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/search/{title}', [PostController::class, 'search']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{id}', [PostController::class, 'destroy']);
Route::put('/posts/{id}', [PostController::class, 'update']);
Route::get('/posts/showByUserId/{id}', [PostController::class, 'showByUserId']);


// Auth Routes
Route::post('/register', [userAuthController::class, 'register']);
Route::post('/login', [userAuthController::class, 'login']);
Route::post('/logout', [userAuthController::class, 'logout']);

//Comments Routes
Route::get('/comments/{id}', [CommentController::class, 'index']);
Route::put('/comments/{id}', [CommentController::class, 'update']);
Route::post('/comments', [CommentController::class, 'store']);
Route::delete('/comments/{id}', [CommentController::class, 'destroy']);


//Protected Routes:
// Route::group(['middleware' => ['auth:sanctum']], function () {
//Posts routes


//Comments Routes

//Auth Routes
// });




Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
