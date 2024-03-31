<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function firstAction()
    {
        $localName = 'Mohamed';
        $dogs = ['do', 'fo', 'ho', 'po'];
        return view('test', ['name' => $localName, 'dogs' => $dogs]);
    }

    public function hello()
    {
        return 'Hello World!';
    }
}
