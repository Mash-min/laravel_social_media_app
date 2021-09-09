<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentsController extends Controller
{

    public function create(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $comment = Comment::create($request->all() + [
            'slug' => 'comment-'.rand().$user->id.time()
        ]);
        return response()->json(['comment' => $comment]);
    }

    public function update(Request $request, $id)
    {
        
    }

    public function delete($slug)
    {
        $comment = Comment::where(['slug' => $slug])->delete();
        return response()->json(['message' => "Comment deleted"]);
    }

    public function find($slug)
    {
        $comment = Comment::where(['slug' => $slug])->first();
        return response()->json(['comment' => $comment]);
    }

}
