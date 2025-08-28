<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::query()->with('category')->orderBy('id', 'desc')->paginate(1)->withQueryString();
        return view('frontend.home.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->views++;
        $post->save();
        return view('frontend.home.show', compact('post'));
    }

    public function category(Category $category)
    {
        $posts = $category->posts()->orderBy('id', 'desc')->paginate(1)->withQueryString();
        return view('frontend.home.category', compact('posts'));
    }
}
