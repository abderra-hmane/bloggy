<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function index()
    {
        $Userposts = Post::where('user_id', Auth::user()->id)->get();
        // Fetch all posts from the database
        $posts = Post::all();
        // Fetch all categories from the database
        $categories = Category::all();

        // Return the view with the posts data
        return view('posts.index', compact('posts', 'categories', 'Userposts'));
    }
    public function show($id)
    {
        // Fetch the post from the database
        $post = Post::findOrFail($id);
        // Return the view with the post data
        return view('posts.show', compact('post'));
    }
    public function create()
    {
        // Fetch all categories from the database
        $categories = Category::all();
        // Return the view with the categories data
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);
        // image uploading 
        // 1- get image
        $image = $request->image;
        // 2- change it's current name
        $newImageName = time() . '-' . $image->getClientOriginalName();
        // 3- move image to my project
        $image->storeAs('blogs', $newImageName, 'public');
        // 4- save new name to database record
        $data['image'] = $newImageName;
        // Create a new post
        $data['user_id'] = Auth::user()->id;
        Post::create($data);
        // Redirect to the posts index page
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }
    public function edit($id)
    {
        // Fetch the post from the database
        $post = Post::findOrFail($id);
        // Fetch all categories from the database
        $categories = Category::all();
        // Return the view with the post and categories data
        return view('posts.edit', compact('post', 'categories'));
    }
    public function update(Request $request, $id)
    {
        // Validate the request data
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);
        // image uploading 
        // 1- check if image is uploaded
        if ($request->hasFile('image')) {
            // 1- get image
            $image = $request->image;
            // 2- change it's current name
            $newImageName = time() . '-' . $image->getClientOriginalName();
            // 3- move image to my project
            $image->storeAs('blogs', $newImageName, 'public');
            // 4- save new name to database record
            $data['image'] = $newImageName;
        } else {
            // 1- get the current image name
            $post = Post::findOrFail($id);
            // 2- save it to the data array
            $data['image'] = $post->image;
        }
        // Fetch the post from the database
        $post = Post::findOrFail($id);
        // Ensure category_id is updated
        $post->update($data);
        // Redirect to the posts index page
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }
    public function destroy($id)
    {
        // Fetch the post from the database
        $post = Post::findOrFail($id);
        // Delete the post
        $post->delete();
        // Redirect to the posts index page
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
