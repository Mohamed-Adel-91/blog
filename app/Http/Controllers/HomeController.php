<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Http\Request;
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

}