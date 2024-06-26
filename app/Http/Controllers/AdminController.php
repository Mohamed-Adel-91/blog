<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function homeAdmin(Request $request)
    {
        $user = Auth::user();
        $username = $user->name;
        $userType = $user->user_type;
        $pendingPosts = Post::where('post_status', 'Pending')->get();
        $noOfClients = User::where('user_type', 'client')->count();
        $newPostsPending = Post::where('post_status', 'Pending')->count();
        $noOfRejectPosts = Post::where('post_status', 'Rejected')->count();
        $noOfActivePosts = Post::where('post_status', 'Active')->count();
        $noOfAdmins = User::where('user_type', 'admin')->count();
        $allPosts = Post::count();
        $allUsers = User::count();
        return view('admin.homeAdmin', compact('username', 'userType', 'pendingPosts', 'request', 'noOfClients', 'newPostsPending', 'noOfRejectPosts', 'noOfActivePosts', 'noOfAdmins', 'allPosts' , 'allUsers'));
    }
    public function post_page(Request $request)
    {
        $user = Auth::user();
        $username = $user->name;
        $userType = $user->user_type;
        $pendingPosts = Post::where('post_status', 'Pending')->get();
        return view('admin.post_page', compact(['username', 'userType', 'pendingPosts']));
    }
    public function add_post(Request $request)
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

    public function show_post(Request $request)
    {
        $posts = Post::all();
        $user = Auth::user();
        $username = $user->name;
        $userType = $user->user_type;
        $pendingPosts = Post::where('post_status', 'Pending')->get();
        return view('admin.show_post', compact(['posts', 'username', 'userType', 'pendingPosts']))->with('posts', Post::orderBy('created_at', 'desc')->paginate(10));
    }

    public function delete_post($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect(route('admin.show_post'))->with('message', 'Post Deleted Successfully!');
    }

    public function edit_page($id, Request $request)
    {
        $post = Post::findOrFail($id);
        $user = Auth::user();
        $username = $user->name;
        $userType = $user->user_type;
        $pendingPosts = Post::where('post_status', 'Pending')->get();
        return view('admin.edit_page', compact('post', 'username', 'userType', 'pendingPosts'));
    }

    public function show_one_post($id, Request $request)
    {
        $post = Post::findOrFail($id);
        $user = Auth::user();
        $username = $user->name;
        $userType = $user->user_type;
        $pendingPosts = Post::where('post_status', 'Pending')->get();
        return view('admin.show_one_post', compact('post', 'username', 'userType', 'pendingPosts'));
    }

    public function update_post(Request $request, $id)
    {
        // 1. Validate the request...
        $request->validate([
            'title' => 'required|min:3|max:100',
            'description' => 'required|min:3',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // 2. Get the data from the request...
        $data = Post::findOrFail($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $image = $request->file('image'); // Retrieve the file object

        if ($image) {
            $destinationPath = "uploads/images";
            $extension = $image->getClientOriginalExtension();
            $fileName = time() . "." . $extension;

            // Move the uploaded image to the destination path
            $image->move($destinationPath, $fileName);

            // Delete the old image if it exists
            $oldImage = $data->image;
            if ($oldImage !== "null.png") {
                File::delete(public_path("uploads/images/" . $oldImage));
            }

            $data->image = $fileName;
        } else {
            unset($data->image);
        }

        // 3. update the blog post in the database...
        $data->save();

        // 4. Redirect to the home page with a success message...
        return redirect(route('admin.show_one_post', $id))->with('message', 'Your blog post has been updated!');
    }

    public function show_pending_post(Request $request)
    {
        $posts = Post::where('post_status', '=', 'Pending')->get();
        $user = Auth::user();
        $username = $user->name;
        $userType = $user->user_type;
        $pendingPosts = Post::where('post_status', 'Pending')->get();
        return view('admin.show_post', compact(['posts', 'username', 'userType', 'pendingPosts']))->with('posts', Post::orderBy('created_at', 'desc')->paginate(10));
    }

    public function edit_pending_post($id, Request $request)
    {
        $post = Post::findOrFail($id);
        $user = Auth::user();
        $username = $user->name;
        $userType = $user->user_type;
        // Query for pending posts
        $pendingPosts = Post::where('post_status', 'Pending')->get();
        return view('admin.edit_page', compact('post', 'username', 'userType', 'pendingPosts'));
    }
    public function showDashboard()
    {
        // Query for pending posts
        $pendingPosts = Post::where('post_status', 'Pending')->get();

        // Pass the pending posts to the view
        return view('admin.dashboardAdmin', ['pendingPosts' => $pendingPosts]);
    }

    public function accept_post($id)
    {
        $data = Post::findOrFail($id);
        $data->post_status = "Active";
        $data->save();
        Session::flash('message', 'The Blog has been Accepted!');
        return redirect()->back();

    }

    public function reject_post($id)
    {
        $data = Post::findOrFail($id);
        $data->post_status = "Rejected";
        $data->save();
        Session::flash('message', 'The Blog has been Rejected!');
        return redirect()->back();

    }

    public function filterPosts(Request $request)
    {
        $query = Post::query();
        $user = Auth::user();
        $username = $user->name;
        $userType = $user->user_type;

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }

        if ($request->filled('post_status')) {
            $query->where('post_status', $request->input('post_status'));
        }

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $start_date = Carbon::parse($request->input('start_date'))->startOfDay();
            $end_date = Carbon::parse($request->input('end_date'))->endOfDay();
            $query->where(function ($query) use ($start_date, $end_date) {
                $query->whereBetween('created_at', [$start_date, $end_date])
                    ->orWhereBetween('updated_at', [$start_date, $end_date]);
            });
        }

        if ($request->filled('sort_by') && in_array($request->sort_by, ['created_at', 'updated_at'])) {
            $query->orderBy($request->sort_by, $request->input('sort_order', 'desc'));
        } else {
            // Default sorting
            $query->orderBy('created_at', 'desc');
        }

        $posts = $query->paginate(10);
        $pendingPosts = Post::where('post_status', 'Pending')->get();
        return view('admin.show_post', compact('posts', 'username', 'userType', 'pendingPosts'));
    }

}