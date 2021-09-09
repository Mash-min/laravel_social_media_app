<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Post;
use App\Models\User;

class BookmarksController extends Controller
{
    public function create(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        if(!$user->alreadyBookmarkedPost($user->id, $request->post_id)) {
            $bookmark = $user->bookmarks()->create($request->all() + [
                'slug' => 'bookmark-'.rand().$user->id.time()
            ]);
            return response()->json(['bookmark' => $bookmark], 200);
        }else {
            return response()->json(['message' => 'Post alredy bookmarked'], 500);
        }
    }

    public function delete($id)
    {
        $bookmark = Bookmark::findOrFail($id)->delete();
        return response()->json(['bookmark' => 'Bookmark deleted']);
    }
}
