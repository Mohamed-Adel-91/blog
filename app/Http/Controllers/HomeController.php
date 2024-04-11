<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $user_type = Auth()->user()->user_type;
            if ($user_type == 'client') {
                return view('dashboard');
            } elseif ($user_type == 'admin') {
                return view('admin.homeAdmin');
            } else {
                return redirect()->back();
            }
        }
    }

    public function homepage()
    {
        return view('home.homepage');
    }
}