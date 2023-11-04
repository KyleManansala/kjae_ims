<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inventory;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
use Dompdf\Dompdf;


class InventoryController extends Controller
{
    //Display list
    public function index()
    {
        $categories = Category::all();
        $inventories = Inventory::with('category')->get();
        
        foreach ($categories as $category) {
            $totalQuantity = $category->inventory->sum('product_quantity');
            $categoriesWithTotalQuantity[] = [
                'category' => $category,
                'total_quantity' => $totalQuantity
            ];
        }


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

    //Generate PDF
    public function generateReport()
    {
        $categories = Category::with('inventory')->get();
    
        $pdf = new Dompdf();
        $pdf->setOptions(new Options());
        $dateAndTime = now()->format('M d, Y \a\\t H:i:s');
        $pdfContent = '<h1>KJAE Agricultural Supplies Trading Inventory Report - ' . $dateAndTime . '</h1>';
    
        foreach ($categories as $category) {
            $pdfContent .= '<h2>' . $category->category_name . '</h2>';
    
            foreach ($category->inventory as $product) {
                $pdfContent .= '<p>' . $product->product_name . ' - Quantity: ' . '<b>' . $product->product_quantity . '</b>' . '</p>';
            }
        }
    
        $pdf->loadHtml($pdfContent);
        $pdf->render();
    
        $filename = 'KJAE_IMS ' . now()->format('Y m d H:i:s') . '.pdf';
    
        $pdf->stream($filename);
    }
}