<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
use RealRashid\SweetAlert\Facades\Alert;

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
            Alert::error('Error', 'Product already exists.')->persistent(false)->autoclose(5000);
            return redirect()->back();
        }

        $product = new Products();
        $product->product_name = $request->productName;
        $product->category_id = $request->category;
        $product->product_quantity = $request->productQuantity;
        $product->price = $request->price;
        $product->save();
        
        // Alert::success('Success', 'Product added successfully.')->persistent(false)->autoclose(5000);
        return redirect()->route('inventory');
    }

    public function edit($id)
    {
        $product = Products::find($id);
        return response()->json($product);
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
        Alert::success('Success', 'Product updated successfully.')->persistent(false)->autoclose(5000);
        return redirect()->route('inventory');
    }

    public function delete($id)
    {
        $product = Products::find($id);
        if ($product) {
            $product->delete();
        }
        Alert::success('Success', 'Product deleted successfully.')->persistent(false)->autoclose(5000);
        return redirect()->route('inventory');
    }
}