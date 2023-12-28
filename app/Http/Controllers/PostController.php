<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('website.post.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('website.post.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $slug = $request->slug;
        if ($request->slug == null) {
            $slug = Str::replace(' ','-',Str::lower($request->title));
        }

        $request->validate([
            'title' => 'required',
            'slug' => 'nullable|lowercase|alpha_dash:ascii|unique:posts,slug',
            'category_id' => 'required',
            'status' => 'required',
            'content' => 'required',
            'thumbnail' => 'required|image:jpg,jpeg,png',
            'tags' => 'required',
        ]);

        $manager = new ImageManager(new Driver());
        $image = $manager->read($request->file('thumbnail'));
        $image =$image->resize(900,500);
        $name = Str::replace(' ','-',Str::lower($request->title)).'-'.Str::random(5);
        $extention = $request->file('thumbnail')->getClientOriginalExtension();
        $thumbnailName = $name.'.'.$extention;
        $path = public_path('uploads/post/');
        $image->save($path.$thumbnailName);

        Post::insert([
            'user_id' => Auth::user()->id,
            'thumbnail' => $thumbnailName,
            'slug' => $slug,
            'title' => $request->title,
            'tags' => $request->tags,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Post Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
