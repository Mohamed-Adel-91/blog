<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// profile routes

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Home routes

Route::get('/', [HomeController::class, 'homepage'])->name('home');
Route::get('/dashboardAdmin', [HomeController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('dashboardAdmin');
Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified', 'client'])->name('dashboard');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('home.blogs');
Route::get('/blog_details/{id}', [HomeController::class, 'blog_details'])->name('home.blog_details');
Route::post('/client_add_post', [HomeController::class, 'client_add_post'])->name('client_add_post');

require __DIR__ . '/auth.php';

// New Version Posts routes

Route::get('/dashboardAdmin', [AdminController::class, 'homeAdmin'])->middleware(['auth', 'verified', 'admin'])->name('admin.homeAdmin');
Route::get('/post_page', [AdminController::class, 'post_page'])->name('admin.post_page');
Route::post('/add_post', [AdminController::class, 'add_post'])->name('admin.add_post');
Route::get('/show_post', [AdminController::class, 'show_post'])->name('admin.show_post');
Route::get('/show_one_post/{id}', [AdminController::class, 'show_one_post'])->name('admin.show_one_post');
Route::get('/edit_page/{id}', [AdminController::class, 'edit_page'])->name('admin.edit_page');
Route::put('/update_post/{id}', [AdminController::class, 'update_post'])->name('admin.update_post');
Route::delete('/delete_post/{id}', [AdminController::class, 'delete_post'])->middleware(['auth', 'verified', 'admin'])->name('admin.delete_post');
Route::get('/show_pending_post ', [AdminController::class, 'show_pending_post'])->name('admin.show_pending_post');
Route::get('/edit_pending_post/{id}', [AdminController::class, 'edit_pending_post'])->name('admin.edit_pending_post');
Route::put('/update_pending_post/{id}', [AdminController::class, 'update_pending_post'])->name('admin.update_pending_post');
Route::put('/accept_post/{id}', [AdminController::class, 'accept_post'])->name('admin.accept_post');
Route::put('/reject_post/{id}', [AdminController::class, 'reject_post'])->name('admin.reject_post');
Route::get('/showDashboard', [AdminController::class, 'showDashboard'])->name('admin.showDashboard');

Route::get('/filter_posts', [AdminController::class, 'filterPosts'])->name('filter_posts');

// Posts routes old version

// Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
// Route::delete('/posts/{post}', [PostController::class, 'destroy'])->middleware(['auth', 'admin'])->name('posts.destroy');
