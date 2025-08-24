<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StorePostRequest;
use App\Http\Requests\Admin\Post\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Post::query()->with('category')->get();
        $postCountTrash = Post::onlyTrashed()->count();

        return view('admin.post.index', compact('posts', 'postCountTrash'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all(['id', 'title']);
        $tags = Tag::all(['id', 'title']);

        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $postData = $request->validated();
        $newPost = Post::query()->create($postData);
        $newPost->tags()->sync($postData['tags'] ?? []);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all(['id', 'title']);
        $tags = Tag::all(['id', 'title']);

        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $updatedPost = $request->validated();
        $post->update($updatedPost);
        $post->tags()->sync($updatedPost['tags'] ?? []);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');
    }

    public function basket()
    {
        $posts = Post::onlyTrashed()->with('category')->get();

        return view('admin.post.basket', compact('posts'));
    }

    public function basketRestore(string $id)
    {
        $post = Post::onlyTrashed()->where('slug', $id);
        if (! $post) {
            abort(404);
        }
        $post->restore();

        return redirect()->route('admin.posts.basket');
    }

    public function basketDestroy(string $id)
    {
        $post = Post::onlyTrashed()->where('slug', $id);
        if (! $post) {
            abort(404);
        }
        $post->forceDelete();

        return redirect()->route('admin.posts.basket');
    }
}
