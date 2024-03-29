<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    $localName = 'Mohamed';
    $dogs = ['do', 'fo', 'ho', 'po'];
    return view('test', compact('localName', 'dogs'));
});
