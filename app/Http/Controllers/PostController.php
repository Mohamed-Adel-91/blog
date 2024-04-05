<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // SELECT * FROM posts;
        $postsFromDB = Post::all(); // Get all posts from the database.
        return view('posts.index', ['posts' => $postsFromDB]);
    }

    public function show(Post $post)
    //This is called Route Model Binding, Laravel will automatically look for a post with an id that matches what
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    {
        // SELECT * FROM posts WHERE id=? LIMIT 1;
        // $singlePostFromDB = Post::findOrFail($postId); // Find a single post by its ID, if it doesn't exist then throw a NotFoundException.
        //$singlePostFromDB = Post::where('id', $postId)->firstOrFail(); // Retrieve a single post by its ID, if it doesn't exist then
        //$singlePostFromDB = Post::where('title', 'PHP')->get(); // Find all posts with this title and get it.
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // 1. Validate the request...
        $data = request()->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'author' => 'required|min:3',
            'email' => 'required|email',
        ]);

        // 2. Get the data from the request...
        // return $data;

        // 3. Save the blog post in  the database...

        // 4. Redirect to the home page with a success message...
        return redirect(route('posts.index'))->with('success', 'Your blog post has been saved!');
    }

    public function edit()
    {
        return view('posts.edit');
    }
    public function update($postId)
    {
        // 1. Validate the request...
        $data = request()->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'author' => 'required|min:3',
            'email' => 'required|email',
        ]);
        // 2. Get the data from the request...
        // return $data;

        // 3. update the blog post in the database...

        // 4. Redirect to the home page with a success message...
        return redirect(route('posts.show', 1))->with('success', 'Your blog post has been updated!');
    }

    public function destroy($postId)
    {
        //1. Delete the blog post from the database...

        //2. Redirect to the home page with a success message...
        return redirect(route('posts.index'))->with('success', 'Your blog post has been Deleted!');
    }
}
