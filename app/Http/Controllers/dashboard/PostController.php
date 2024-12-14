<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Traits\FileTraits;

class PostController extends Controller
{
    use FileTraits;
    public function index()
    {
        try {
            $posts = Post::all();
            $category = Post::POST_CATEGORY;
            $status = Post::STATUS;
            return view('Dashboard.post.posts', compact('posts', 'category', 'status'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong']);
        }
    }

    public function create()
    {
        $category = Post::POST_CATEGORY;
        $status = Post::STATUS;
        return view('Dashboard.post.create_post', compact('category', 'status'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // try {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
            'post_type' => 'required|in:blog,news article, other',
            // 'date' => 'required|date',
            'status' => 'required|in:archived,pending,published',
        ]);

        if ($request->hasFile('image_path')) {
            $imageUrl = $this->uploadImage($request->file('image_path'), 'uploads');
            $data['image_path'] = $imageUrl;
        }

        Post::create($data);
        return redirect()->route('posts.index')->with('success', 'Post created successfully');
        // } catch (\Exception $e) {
        //     return redirect()->back()->withErrors(['error' => 'Something went wrong'])->withInput();
        // }
    }

    public function show($id)
    {
        try {
            $post = Post::findOrFail($id);
            return view('posts.show', compact('post'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Post not found']);
        }
    }

    public function edit($id)
    {
        try {
            $post = Post::with('comments')->findOrFail($id);
            // dd($post->toArray());
            $post->image_path = $this->image_path($post->image_path);
            $category = Post::POST_CATEGORY;
            $status = Post::STATUS;
            return view('Dashboard.post.edit_post', compact('post', 'category', 'status'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Post not found']);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validator =  $request->all([
                'title' => 'sometimes|required|string|max:255',
                'content' => 'sometimes|required|string',
                'author' => 'sometimes|required|string|max:255',
                'post_type' => 'sometimes|required|in:blog,news article,other',
                'date' => 'sometimes|required|date',
                'status' => 'sometimes|required|in:archived,pending,published',
            ]);

            $post = Post::findOrFail($id);

            $post->update($request->all());

            return redirect()->route('posts.index')->with('success', 'Post updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong'])->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->delete();
            return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Post not found']);
        }
    }
}
