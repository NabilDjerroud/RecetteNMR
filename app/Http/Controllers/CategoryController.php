<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'category_en' => 'required|max:30',
            'category_fr' => 'required|max:30',
        ]);
        $category = [
            'en' => $request->category_en,
/*             'fr' => $request->category_fr, */
        ];
        if($request->category_fr != null) { $category = $category + ['fr' => $request->category_fr];};
        
        Category::create([
            'nom' => $category
        ]);
        return back()->withSuccess('Category created successfully!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {   
        return view('category.edit', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_en' => 'required|max:30',
            'category_fr' => 'required|max:30',
        ]);

        $laCategory = [
            'en' => $request->category_en,
            'fr' => $request->category_fr,
        ];
        
        $category->update([
            'nom' => $laCategory
        ]);

        return redirect()->route('category.edit', $category->id)->with('success', 'Category updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
