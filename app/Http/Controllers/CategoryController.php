<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.category', compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('category.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categories = new Category();
        $categories->category_name = $request->categoryName;
        $categories->save();
        
        Alert::success('Success', 'Category added successfully.')->persistent(false)->autoclose(5000);
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Insert Validation
        $category->category_name = $request->categoryName;
        $category->save();
        
        Alert::success('Success', 'Category updated successfully.')->persistent(false)->autoclose(5000);
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            Alert::success('Success', 'Category deleted successfully.')->persistent(false)->autoclose(5000);
        return redirect()->route('category.index');
        }
        catch(\Exception $e) {

        }
    }
}
