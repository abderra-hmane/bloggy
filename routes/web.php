<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});
// posts routes 
Route::controller(PostController::class)->prefix('posts')->group(function () {
    Route::get('/', 'index')->name('posts.index');
    Route::get('/create', 'create')->name('posts.create');
    Route::post('/', 'store')->name('posts.store');
    Route::get('/{post}', 'show')->name('posts.show');
    Route::get('/{post}/edit', 'edit')->name('posts.edit');
    Route::put('/{post}', 'update')->name('posts.update');
    Route::delete('/{post}', 'destroy')->name('posts.destroy');
});
// Theme routes
Route::controller(ThemeController::class)->prefix('theme')->group(function () {
    Route::get('/{category}', 'index')->name('theme.index');
    Route::get('/Contact', 'contact')->name('theme.contact');
    Route::get('/About', 'about')->name('theme.about');
});
// Admin routes
Route::controller(AdminController::class)->prefix('admin')->group(function () {
    Route::get('/', 'index')->name('admin.index');
    Route::get('/categories', 'categories')->name('admin.categories');
    // posts routes
    Route::get('/posts', 'posts')->name('admin.posts');
    Route::get('/createPost', 'create')->name('admin.createPost');
    Route::post('/storePost', 'store')->name('admin.storePost');
    Route::get('/editPost/{post}', 'edit')->name('admin.editPost');
    Route::put('/updatePost/{post}', 'update')->name('admin.updatePost');
    Route::delete('/deletePost/{post}', 'destroy')->name('admin.deletePost');
    // user routes
    Route::get('/users', 'users')->name('admin.users');
    Route::get('/createUser', 'createUser')->name('admin.createUser');
    Route::post('/storeUser', 'storeUser')->name('admin.storeUser');
    Route::get('/editUser/{user}', 'editUser')->name('admin.editUser');
    Route::put('/updateUser/{user}', 'updateUser')->name('admin.updateUser');
    Route::delete('/deleteUser/{user}', 'deleteUser')->name('admin.deleteUser');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
