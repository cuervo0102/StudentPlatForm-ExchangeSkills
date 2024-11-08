<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\PostDeleteRequest;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        /**
         * Display list of all records  of post in database
         * all() function that retrieve data from database
         */
        $posts = Post::all();
        return view('posts.index', compact('posts'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /**
         * render the html page for creating new record to database
         */
        return view('posts.create_post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
{
        Post::create($request->validated());

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id); 
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->validated());
        return redirect()->route('posts.index')->with('success', 'POst updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('sucess', 'Post deleted successfully');
    }
}
