<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function index()
    {
        $comments = Comment::all();
        return view('posts.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->check()) {
            return redirect()->route('login')
                             ->with('error', 'You must be logged in to create a post');
        }
        return view('comments.create_comment');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')
                             ->with('error', 'You must be logged in to create a post');
        }
    
        Comment::create([
            'comment'=>$request->comment,
            'user_id' => auth()->id(), 
        ]); 
        return  redirect()->route('posts.index')
                          ->with('success', 'Comment created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
