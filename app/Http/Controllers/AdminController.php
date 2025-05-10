<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function index()
    {
        // Return the admin dashboard view
        $posts = Post::all();
        $categories = Category::all();
        $users = User::where('admin', 0)->get();
        return view('admin.index', compact('posts', 'categories', 'users'));
    }
    public function posts()
    {
        // Return the admin posts view
        $posts = Post::all();
        return view('admin.posts', compact('posts'));
    }
    public function categories()
    {
        // Return the admin categories view
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }
    public function users()
    {
        // Return the admin users view
        $users = User::where('admin', 1)->get();
        return view('admin.users', compact('users'));
    }
}
