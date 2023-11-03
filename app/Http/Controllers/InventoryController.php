<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inventory;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;

class InventoryController extends Controller
{
    //Display list
    public function index()
    {
        $categories = Category::all();
        $inventories = Inventory::with('category')->get();
        
        return view('inventory.inventory', compact('inventories', 'categories'));
    }

    //Create
    public function create()
    {
        $categories = Category::all();
        return view('inventory.add', compact('categories'));
    }

    //Store
    public function store(Request $request)
    {
        $existingProduct = Inventory::where('product_name', $request->productName)->first();
        if ($existingProduct) {
            Alert::error('Error', 'Product already exists.')->persistent(false)->autoclose(5000);
            return redirect()->back();
        }

        $inventory = new Inventory();
        $inventory->product_name = $request->productName;
        $inventory->category_id = $request->category;
        $inventory->product_quantity = $request->productQuantity;
        $inventory->price = $request->price;
        $inventory->save();
    
        Alert::success('Success', 'Product added successfully.')->persistent(false)->autoclose(5000);
        return redirect()->route('inventory.index');
    }

    //Show
    public function show(Inventory $inventory)
    {
        return response()->json($inventory);
    }

    //Edit
    public function edit(Inventory $inventory)
    {
        return response()->json($inventory);
    }

    //Update
    public function update(Request $request, Inventory $inventory)
    {
        // Insert Validation
        $inventory->product_name = $request->productName;
        $inventory->category_id = $request->category;
        $inventory->product_quantity = $request->productQuantity;
        $inventory->price = $request->price;
        $inventory->save();
        
        Alert::success('Success', 'Product updated successfully.')->persistent(false)->autoclose(5000);
        return redirect()->route('inventory.index');
    }

    //Delete
    public function destroy(Inventory $inventory)
    {
        try {
                $inventory->delete();
                Alert::success('Success', 'Product deleted successfully.')->persistent(false)->autoclose(5000);
                return redirect()->route('inventory.index');
            }
             catch (\Exception $e) {
                
             }
        
    }
}
