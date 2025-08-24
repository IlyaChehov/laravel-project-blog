<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::query()->with('category')->paginate(1)->withQueryString();

        return view('frontend.home.index', compact('posts'));
    }
}
