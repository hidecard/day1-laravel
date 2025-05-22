<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Categories;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('backend.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Categories::all();
        return view('backend.post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/posts', 'public');
        }

        Post::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'cover' => $imagePath,
        ]);

        return redirect()->route('post.index')->with('success', 'Post created successfully!');
    }

    public function edit($id)
    {
        $categories = Categories::all();
        $posts = Post::findOrFail($id);
        return view('backend.post.edit', compact('posts', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['title', 'category_id', 'description']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/posts', 'public');
            $data['cover'] = $imagePath;
        }

        $post->update($data);

        return redirect()->route('post.index')->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post deleted successfully!');
    }
}
