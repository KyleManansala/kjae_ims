<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.category', compact("categories"));
    }

    public function create()
    {
        $categories = Category::all();
        return view('category.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $categories = new Category();
        $categories->category_name = $request->categoryName;
        $categories->save();
        
        Alert::success('Success', 'Category added successfully.')->persistent(false)->autoclose(5000);
        return redirect()->route('category.index');
    }

    public function show(Category $category)
    {
        return response()->json($category);
    }

    public function edit(Category $category)
    {
        return response()->json($category);
    }


    public function update(Request $request, Category $category)
    {
        $category->category_name = $request->categoryName;
        $category->save();
        
        Alert::success('Success', 'Category updated successfully.')->persistent(false)->autoclose(5000);
        return redirect()->route('category.index');
    }


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
