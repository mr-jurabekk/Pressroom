<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('index')->with([
            'posts' => Post::latest()->paginate(4),
            'health_posts' => Post::all()->where('category_id', 5),
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function blog()
    {
        return view('blog');
    }

    public function authors()
    {
        return view('authors');
    }


    public function contact()
    {
        return view('contact');
    }
}
