<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;

class InventoryController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        $products = Products::with('category')->get();
        
        return view('inventory.inventory', compact('categories', 'products'));
    }

    public function create()
    {
        $categories = Categories::all();
        return view('inventory.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $existingProduct = Products::where('product_name', $request->productName)->first();
        if ($existingProduct) {
            return redirect()->back()->with('error', 'Product already exists.');
        }

        $product = new Products();
        $product->product_name = $request->productName;
        $product->category_id = $request->category;
        $product->product_quantity = $request->productQuantity;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('inventory')->with('success', 'Product added successfully.');
    }

    public function edit($id)
    {
        $product = Products::find($id);
        $categories = Categories::all();
        return view('inventory.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        if ($product) {
            $product->product_name = $request->productName;
            $product->category_id = $request->category;
            $product->product_quantity = $request->productQuantity;
            $product->price = $request->price;
            $product->save();
        }

        return redirect()->route('inventory')->with('success', 'Product updated successfully.');
    }

    public function delete($id)
    {
        $product = Products::find($id);
        if ($product) {
            $product->delete();
        }

        return redirect()->route('inventory')->with('success', 'Product deleted successfully.');
    }
    
    public function search(Request $request)
    {
        $categoryId = $request->input('category');
        $category = Categories::find($categoryId);

    if ($category) {
        $categories = Categories::all();
        $products = $category->products; // Fetch products directly through the relationship
        return view('inventory.inventory', compact('categories', 'products'));
     } 
    }
}