<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    public function create()
    {
        // Return the admin create post view
        $categories = Category::all();
        return view('admin.createPost', compact('categories'));
    }
    public function store(Request $request)
    {
        // Validate and store the new post
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);
        $data['user_id'] =  Auth::user()->id; // Set the user ID

        Post::create($data);
        return redirect()->route('admin.posts')->with('success', 'Post created successfully.');
    }
    public function edit(Post $post)
    {
        // Return the admin edit post view
        $categories = Category::all();
        return view('admin.editPost', compact('post', 'categories'));
    }
    public function update(Request $request, Post $post)
    {
        // Validate and update the post
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);
        $post->update($data);
        return redirect()->route('admin.posts')->with('success', 'Post updated successfully.');
    }
    public function destroy(Post $post)
    {
        // Delete the post
        $post->delete();
        return redirect()->route('admin.posts')->with('success', 'Post deleted successfully.');
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
    public function createUser()
    {
        // Return the admin create user view
        return view('admin.createUser');
    }
    public function storeUser(Request $request)
    {
        // Validate and store the new user
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
        ]);
        $data['password'] = bcrypt($data['password']);
        $data['admin'] = 1; // Set admin to true
        User::create($data);
        return redirect()->route('admin.users')->with('success', 'User created successfully.');
    }
    public function editUser(User $user)
    {
        // Return the admin edit user view
        return view('admin.editUser', compact('user'));
    }
    public function updateUser(Request $request, User $user)
    {
        // Validate and update the user
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string',
        ]);
        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        $user->update($data);
        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }
    public function deleteUser(User $user)
    {
        // Delete the user
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }
}
