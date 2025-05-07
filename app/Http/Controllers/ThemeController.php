<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    //
    public function index($category)
    {
        // Fetch the posts from the database based on the category
        $posts = \App\Models\Post::where('category_id', $category)->get();
        $CatName = \App\Models\Category::where('id', $category)->first()->name;
        // Return the view with the posts data
        return view('theme.index', compact('posts', 'CatName'));
    }
    public function contact()
    {
        // Return the contact view
        return view('theme.contact');
    }
    public function about()
    {
        // Return the about view
        return view('theme.about');
    }
}
