<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('homePage');

// Home routes

Route::get('/', [HomeController::class, 'homepage'])->name('home');
Route::get('/dashboardAdmin', [HomeController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('dashboardAdmin');
Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified', 'client'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Posts routes old version

// Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
// Route::delete('/posts/{post}', [PostController::class, 'destroy'])->middleware(['auth', 'admin'])->name('posts.destroy');

// New Version Posts routes

Route::get('/dashboardAdmin', [AdminController::class, 'homeAdmin'])->middleware(['auth', 'verified', 'admin'])->name('admin.homeAdmin');
Route::get('/post_page', [AdminController::class, 'post_page'])->name('admin.post_page');
Route::post('/add_post', [AdminController::class, 'add_post'])->name('admin.add_post');
Route::get('/show_post', [AdminController::class, 'show_post'])->name('admin.show_post');
Route::get('/show_one_post/{id}', [AdminController::class, 'show_one_post'])->name('admin.show_one_post');
Route::get('/edit_page/{id}', [AdminController::class, 'edit_page'])->name('admin.edit_page');
Route::delete('/delete_post/{id}', [AdminController::class, 'delete_post'])->middleware(['auth', 'verified', 'admin'])->name('admin.delete_post');
Route::put('/update_post/{id}', [AdminController::class, 'update_post'])->name('admin.update_post');