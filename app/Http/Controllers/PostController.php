<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        // Fetch all posts from the database
        $posts = \App\Models\Post::all();
        $categories = \App\Models\Category::all();

        // Return the view with the posts data
        return view('posts.index', compact('posts', 'categories'));
    }
}
