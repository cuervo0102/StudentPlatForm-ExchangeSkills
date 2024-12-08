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
        if (!auth()->check()) {
            return redirect()->route('login')
                             ->with('error', 'You must be logged in to create a post');
        }
        $user = auth()->user();

        $userInterests = $user->subFields->pluck('name');

        // $posts = Post::where(function($query) use ($userInterests) {
        //     foreach ($userInterests as $interest) {
        //         $query->orWhereJsonContains('sub_field1', $interest)
        //               ->orWhereJsonContains('sub_field2', $interest)
        //               ->orWhereJsonContains('sub_field3', $interest);
        //     }
        // })->get();

        $posts = POST::all();

        // $posts = Post::filter();
        return view('posts.index', compact('posts'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /*
            This snippet of code will render the create post template 
            only if the user authenticated 
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

        // dd($request->all()); 

        // validate data before insert it 
        $request->validate([
            'post' => 'required',
            'sub_field' => 'required', 
        ]);
        
        //save the new recoreds in db after the validation 
        Post::create([
            'user_id' => auth()->id(),
            'post' => $request->post,
            'sub_field' => $request->sub_field,
            
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

        /*
            function used to check if the post exists
            if not exists return 404 nit found 
            if found returns the view 

        */
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
