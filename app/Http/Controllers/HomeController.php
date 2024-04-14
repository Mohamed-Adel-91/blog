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
            if ($user_type != 'admin') {
                return view('dashboard');
            }
            return redirect()->back();
        }
    }

    public function homepage()
    {
        return view('home.homePage');
    }
}