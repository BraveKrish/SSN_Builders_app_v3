<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\FileTraits;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    use FileTraits;

    public function index(){
        // $events = Post::with('user')->get();
        $posts = Post::with('user')
            ->where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->get();
        foreach($posts as $post){
            $imageUrl = $this->image_path($post->image_path);
            $post->full_image = $imageUrl;
        }
        return response()->json(compact('posts'));
    }

    public function showById($id){
        $event = Post::findOrFail($id);
        return response()->json($event);
    }

    public function showBySlug($slug)
    {
        // $post = $slug;
        $slug = strtolower($slug);
        $post = Post::where('slug', $slug)->with('user')->first();

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        return response()->json(['post' => $post, 'slug' => $slug]);
    }

    // store data
    public function store(Request $request){
        $data = $request->validate([
           'user_id' => 'required',
           'title' => 'required',
           'post_category' => 'required',
           'description' => 'required',
           'image_url' =>'required|image|mimes:jpeg,png,jpg|max:2048',
           'post_type' => 'required',
           'status' => 'required',
           'published_at' => 'required|date',
        ]);

        // $slug = Str::slug($data['title']);
        // $data['slug'] = $slug;

        if($request->hasFile('image_url')){
            $imageUrl = $this->uploadImage($request->file('image_url'), 'uploads');
            $data['image_url'] = $imageUrl;
          }

        $post = Post::create($data);
        $response = [
           'message' => 'Post created successfully',
            'post' => $post
        ];

        return response()->json($response, 201);
    }

    // update data
    public function update(Request $request, $id){
        $data = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'post_category' => 'required',
            'description' => 'required',
            'image_url' =>'required|image|mimes:jpeg,png,jpg|max:2048',
            'post_type' => 'required',
            'status' => 'required',
            'published_at' => 'required|date',
        ]);

        $event = Post::findOrFail($id);
        // dd($event->image_url);

        if($request->has('title' && $request->input('title') !== $event->title)){
            $slug = Str::slug($data['title']);
            $data['slug'] = $slug;
        }


        if($request->hasFile('image_url')){
          $this->deleteImage($event->image_url);
          $imageUrl = $this->uploadImage($request->file('image_url'), 'uploads');
          $data['image_url'] = $imageUrl;
        }

        $event->update($data);
        $response = [
          'message' => 'Post updated successfully',
          'event' => $event
        ];

        return response()->json($response,201);
      }

      public function delete($id){
        try {
          $event = Post::findOrFail($id);
          $this->deleteImage($event->image_url);
          $event->delete();

          $response = [
              'message' => 'Post deleted successfully'
          ];
          return response()->json($response,201);
      } catch (\Exception $e) {
          $response = [
              'message' => 'An error occurred while deleting the post: ' . $e->getMessage()
          ];
          Log::error('Error deleting post: ' . $e->getMessage());
          return response()->json($response, 500);
      }
    }

}
