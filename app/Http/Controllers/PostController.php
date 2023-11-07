<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use function Spatie\Ignition\ErrorPage\title;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create')->with([
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {


        if ($request->hasFile('file_url')){
            $file = $request->file('file_url');
            $name = $file->hashName();

            $path = $request->file('file_url')->storeAs(
                'files', $name, 'public'
            );
        }

        $post = Post::create([
            'user_id' => auth()->id(),
           'category_id' => $request->category_id,
           'title' => $request->title,
            'short_content' => $request->short_content,
            'body' => $request->body,
            'file_url' => $path ?? null,
        ]);

        return redirect()->route('main');


    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        $add = DB::update('update posts set seen_count = 1 where id ='. $post->id);

        $posts = Post::latest()->paginate(5);

        return view('post.show')->with([
            'user' => $post->user->name,
            'post' =>$post,
            'id' => $post->id,
            'url' => $post->file_url,
            'category' => $post->category->name,
            'title' =>$post->title,
            'short_content' => $post->short_content,
            'body' => $post->body,
            'seen_count' => $post->seen_count,
            'time' => $post->created_at,
            'posts' => $posts

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if (! Gate::allows('edit-post', auth()->user())){
            abort(401);
        }

        return view('post.update')->with([
           'post' => $post,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        if (! Gate::allows('edit-post', auth()->user())){
            abort(401);
        }
        if ($request->hasFile('file_url')){
            if (isset($post->file_url)){
                Storage::delete($post->file_url);
            }
            $name = $request->file('file_url')->hashName();
            $path = $request->file('file_url')->storeAs(
                'files', $name, 'public');
        }




        $post->update([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'category_id' => $request->category_id,
            'file_url' => $path ?? $post->file_url,
            'body' => $request->body,
        ]);

        return redirect()->route('post.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (! Gate::allows('edit-post', auth()->user())){
            abort(401);
        }
        $post->delete();

        return redirect()->route('main');
    }
}
