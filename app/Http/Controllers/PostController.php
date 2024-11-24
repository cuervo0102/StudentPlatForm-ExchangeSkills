<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\SubFields;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;



class PostController extends Controller
{


    public function index()
    {
      
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
        if (!auth()->check()) {
            return redirect()->route('login')
                             ->with('error', 'You must be logged in to create a post');
        }

        return view('posts.create_post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
{
    if (!auth()->check()) {
        return redirect()->route('login')
                         ->with('error', 'You must be logged in to create a post');
    }

    dd($request->all()); 

    $request->validate([
        'post' => 'required',
        'sub_field' => 'required', 
    ]);
    
    Post::create([
        'post' => $request->post,
        'sub_field' => $request->sub_field,
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('posts.index')
                     ->with('success', 'Post created successfully');
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

        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $post->update($request->validated());
        return redirect()->route('posts.index')->with('success', 'POst updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
        $post->delete();

        return redirect()->route('posts.index')->with('sucess', 'Post deleted successfully');
    }
}
