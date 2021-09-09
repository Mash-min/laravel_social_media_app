<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\BookmarksController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/user', [RegisterController::class, 'create']);

Route::get('/posts', [PostsController::class, 'posts']);
Route::post('/posts', [PostsController::class, 'create']);
Route::delete('/posts/{id}', [PostsController::class, 'delete']);
Route::put('/posts/{id}', [PostsController::class, 'update']);
Route::get('posts/{slug}', [PostsController::class, 'find']);

Route::post('/comments', [CommentsController::class, 'create']);
Route::put('/comments/{id}', [CommentsController::class, 'update']);
Route::delete('/comments/{id}', [CommentsController::class, 'delete']);
Route::get('/comments/{slug}', [CommentsController::class, 'find']);

Route::post('/bookmarks', [BookmarksController::class, 'create']);
Route::delete('bookmarks/{id}', [BookmarksController::class, 'delete']);

