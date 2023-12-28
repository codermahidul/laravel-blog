<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $total = count($categories);
        return view('website.category.index', compact(['categories','total']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('website.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category_slug = $request->category_slug;
        if ($request->category_slug == null) {
            $category_slug = Str::replace(' ','-',Str::lower($request->category_name));
        }
        
        $request->validate([
            'category_name' => 'required|unique:categories,category_name',
            'category_slug' => 'nullable|lowercase|alpha_dash:ascii|unique:categories,category_slug',
            'description' => 'max:100'
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => $category_slug,
            'description' =>  $request->description,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success', "Category Added Successfully!");
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
        $category = Category::find($id);
        return view('website.category.edit', compact([
            'category',
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category_slug = $request->category_slug;
        if ($request->category_slug == null) {
            $category_slug = Str::replace(' ','-',Str::lower($request->category_name));
        }
        $category_slug;
        $request->validate([
            'category_name' => 'required',
            'category_slug' => 'nullable|lowercase|alpha_dash:ascii',
            'description' => 'max:100'
        ]);

        Category::where('id',$id)->update([
            'category_name' => $request->category_name,
            'category_slug' => $category_slug,
            'description' =>  $request->description,
            'updated_at' => Carbon::now(),
        ]);

        return back()->with('success', "Category Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::where('id', $id)->delete();
        return back()->with('delete','Category Deleted Successfully!');
    }


    //Extra function
    public function trashed(){
        $trashedCategories = Category::onlyTrashed()->get();
        $total = Count($trashedCategories);
        return view('website.category.trashed', compact(['trashedCategories','total']));
    }    
    
    public function delete($id){
        Category::where('id',$id)->forceDelete();
        return back()->with('success','Category Deleted Successfully');
    }

    public function restore($id){
        Category::withTrashed()->where('id',$id)->restore();
        return back()->with('restore','Category Restore Successfully');
    }
    

}
