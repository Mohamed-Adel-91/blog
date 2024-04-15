<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function homeAdmin()
    {
        $user = Auth::user();
        $username = $user->name;
        $userType = $user->user_type;
        return view('admin.homeAdmin', compact('username', 'userType'));
    }
    public function post_page()
    {
        $user = Auth::user();
        $username = $user->name;
        $userType = $user->user_type;
        return view('admin.post_page', compact(['username', 'userType']));
    }
    public function add_post(Request $request)
    {
        $user = Auth()->user();
        $user_id = $user->id;
        $name = $user->name;
        $email = $user->email;
        $user_type = $user->user_type;
        $post = new Post;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->post_status = 'Active';
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

    public function show_post()
    {
        $posts = Post::all();
        $user = Auth::user();
        $username = $user->name;
        $userType = $user->user_type;
        return view('admin.show_post', compact(['posts', 'username', 'userType']))->with('posts', Post::orderBy('created_at', 'desc')->paginate(10));
    }

    public function delete_post($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back()->with('message', 'Post Deleted Successfully!');
    }

    public function edit_page($id)
    {
        $post = Post::findOrFail($id);
        $user = Auth::user();
        $username = $user->name;
        $userType = $user->user_type;
        return view('admin.edit_page', compact('post', 'username', 'userType'));
    }

}
