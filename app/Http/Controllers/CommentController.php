<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $commit = Comment::create([
           'user_id' => auth()->id(),
           'post_id' => $request->post,
            'body' => $request->body
        ]);

        return redirect()->back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->back();
    }
}
