<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $allPosts = [
            ['id' => '1', 'content' => 'This is the content of my first blog post!', 'author' => 'Mohamed Adel', 'created_at' => '2024-04-01 11:19:08'],
            ['id' => '2', 'content' => 'This is the content of my second blog post!', 'author' => 'Ali Nor', 'created_at' => '2024-02-21 06:30:07'],
            ['id' => '3', 'content' => 'This is the content of my third blog post!', 'author' => 'Gamal sayed', 'created_at' => '2023-12-01 12:05:06'],
            ['id' => '4', 'content' => 'This is the content of my forth blog post!', 'author' => 'Shady Joe', 'created_at' => '2021-09-11 09:23:40'],
        ];
        return view('home', ['posts' => $allPosts]);
    }

}
