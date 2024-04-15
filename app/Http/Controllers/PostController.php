<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //------------------------------------- Index ---------------------------------------------
    public function index()
    {
        // Get all posts from the database.
        // SELECT * FROM posts;
        $postsFromDB = Post::all();
        return view('admin.show_post', ['posts' => $postsFromDB]);
    }

    //-------------------------------------- Show -----------------------------------------------
    public function show(Post $post)
    /**
    This is called Route Model Binding,
    Laravel will automatically look for a post with an id that matches what
    Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    {
        /**
         * SELECT * FROM posts WHERE id=? LIMIT 1;
        $singlePostFromDB = Post::findOrFail($postId); // Find a single post by its ID, if it doesn't exist then throw a NotFoundException.
        $singlePostFromDB = Post::where('id', $postId)->firstOrFail(); // Retrieve a single post by its ID, if it doesn't exist then
        $singlePostFromDB = Post::where('title', 'PHP')->get(); // Find all posts with this title and get it.
         */

        return view('posts.show', ['post' => $post]);
    }

    //-------------------------------------- Create -----------------------------------------------
    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    //-------------------------------------- Store -----------------------------------------------
    public function store()
    {
        /**
         * 1. Validate the request... */
        request()->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'postCreator' => 'required|exists:Users,id', // Checks if user_id exists in users table column id.
            'email' => 'email',
        ]);

        // 2. Get the data from the request...
        $data = request()->all();
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->postCreator;
        $email = request()->email;

        /**
         * 3. Save the blog post in  the database...
        $post = new Post;
        $post->title = $title;
        $post->description = $description;
        $post->email = $email;
        $post->save();
         */

        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator,
            'email' => $email,
        ]);

        // 4. Redirect to the home page with a success message...
        return redirect(route('admin.show_post'))->with('message', 'Your blog post has been saved!');
    }

    //-------------------------------------- Edit -----------------------------------------------
    public function edit(Post $post)
    {
        $users = User::all();
        return view('posts.edit', ['users' => $users, 'post' => $post]);
    }

    //-------------------------------------- Update -----------------------------------------------
    public function update($postId)
    {
        /**
         * 1. Validate the request... */
        request()->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'postCreator' => 'required|exists:App\Models\User,id',
            'email' => 'email',
        ]);

        // 2. Get the data from the request...
        $data = request()->all();
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->postCreator;
        $email = request()->email;

        // 3. update the blog post in the database...
        $singlePostFromDB = Post::findOrFail($postId);
        $singlePostFromDB->update([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator,
            'email' => $email,
        ]);

        // 4. Redirect to the home page with a success message...
        return redirect(route('posts.show', $postId))->with('message', 'Your blog post has been updated!');
    }

    //-------------------------------------- Destroy -----------------------------------------------
    public function destroy($postId)
    {
        //1. Delete the blog post from the database...
        $singlePostFromDB = Post::findOrFail($postId);
        $singlePostFromDB->delete();

        //2. Redirect to the home page with a success message...
        return redirect(route('admin.show_post'))->with('message', 'Your blog post has been Deleted!');
    }
}