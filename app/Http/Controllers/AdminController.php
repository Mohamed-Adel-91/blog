<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function post_page()
    {
        return view('admin.post_page');
    }
    public function add_post(Request $request)
    {
        $post = new Post;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            //dd($file);
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/images', $filename);
            $post->image = $filename;
        } else {
            $post->image = 'null';
        }

        $post->save();
        return redirect('/home')->with('status', 'Post Added Successfully!');
    }

}
