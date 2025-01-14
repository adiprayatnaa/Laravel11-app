<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $post = Post::all();
        $userId = Auth::id(); // Get the ID of the authenticated user

        $post = Post::where('author_id', $userId)->get();
        // return $post;

        return view('dashboard.index', [
            'posts' => $post,
            'title' => 'Dashboard',
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // return view('dashboard.create', [
        //     'title' => 'Create new Post',
        // ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        // return $request;

        $validatedData = $request->validate([
            'title' => 'required|min:5|max:255',
            'category_id' => 'required',
            'slug' => 'required|unique:posts',
            'body' => 'required',
        ]);


        $validatedData['author_id'] = Auth::id();


        // if (Auth::check()) {
        //     // Assign the authenticated user's ID to author_id
        //     $validatedData['author_id'] = Auth::id();
        // } else {
        //     // Handle the case when the user is not authenticated
        //     return redirect()->back()->withErrors(['error' => 'User not authenticated']);
        // }
        // dd("insert berhasil", $validatedData);
        Post::create($validatedData);
        return redirect('/dashboard/posts')->with('success', 'New post has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // return $post;
        // dd($post->title);
        return view('dashboard.show', [
            'post' => $post,
            'title' => 'Post Details',

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.post.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted');
    }

    public function checkSlug(Request $request)
    {
        //
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
        // $title = $request->get('title', '');

        // Generate slug using the model
        // $slug = Post::make(['title' => $title])->slug;

        // $title = $request->input('title');
        // $slug = Str::slug($title);
        //     $slug = Str::slug($request->title);

        //     return response()->json(['slug' => $slug]);
        // $title = $request->query('title');
        // $slug = Str::slug($title); // Use Laravel's Str helper to create a slug

        // return response()->json(['slug' => $slug]);
    }
}
