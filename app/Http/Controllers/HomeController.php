<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $user_type = Auth()->user()->user_type;
            if ($user_type != 'admin') {
                return view('dashboard');
            }
            return redirect()->back();
        }
    }

    public function homepage()
    {
        $posts = Post::all();
        return view('home.homePage', compact('posts'))->with('posts', Post::orderBy('created_at', 'desc')->paginate(3));
    }

    public function blogs()
    {
        $posts = Post::all();
        $user = Auth::user();
        $username = $user->name;
        $userType = $user->user_type;
        return view('home.homePage', compact(['posts', 'username', 'userType']))->with('posts', Post::orderBy('created_at', 'desc')->paginate(3));
    }

    public function blog_details($id)
    {
        $post = Post::findOrFail($id);
        $user = Auth::user();
        return view('home.blog_details', compact('post'));
    }

    public function client_add_post(Request $request)
    {
        // 1. Validate the request...
        $request->validate([
            'title' => 'required|min:3|max:100',
            'description' => 'required|min:3',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth()->user();
        $user_id = $user->id;
        $name = $user->name;
        $email = $user->email;
        $user_type = $user->user_type;
        $post = new Post;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->post_status = 'Pending';
        $post->user_id = $user_id;
        $post->name = $name;
        $post->email = $email;
        $post->user_type = $user_type;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            //dd($file);
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/images', $filename);
            $post->image = $filename;
        } else {
            $post->image = 'null.png';
        }
        $post->save();
        return redirect()->back()->with('message', 'Post Added Successfully!');
    }

}