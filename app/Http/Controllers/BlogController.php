<?php

namespace App\Http\Controllers;

use App\Models\Blog\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(9);
        return view('blog.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        $post->increment('views');

        $tags = $post->tags;

        $relatedPosts = Post::whereHas('tags', function ($query) use ($tags) {
            $query->whereIn('tag_id', $tags->pluck('id'));
        })->where('id', '!=', $post->id)
            ->take(3)
            ->get();

        $popularPosts = Post::orderBy('views', 'desc')
        ->take(3)
        ->get();

        return view('blog.show', compact('post', 'relatedPosts', 'popularPosts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function recentelyPost(Post $post)
    {

    }
}
