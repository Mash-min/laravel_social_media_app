<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{
    
    public function posts()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(10);
        return response()->json(['posts' => $posts]);
    }

    public function create(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $post = $user->posts()->create($request->all() + [
            'slug' => 'post-'.rand().$user->id.time()
        ]);
        return response()->json(['post' => $post]);
    }

    public function delete($id)
    {
        $posts = Post::findOrFail($id)->delete();
        return response()->json(['message' => "Post deleted"]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return response()->json(['post' => $post]);
    }

    public function find($slug)
    {
        $post = Post::where(['slug' => $slug])->first();
        return response()->json(['post' => $post]);
    }

}
