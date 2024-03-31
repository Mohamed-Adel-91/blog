<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});

Route::get('/test2', [TestController::class, 'firstAction']);
Route::get('/hello', [TestController::class, 'hello']);
