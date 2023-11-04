<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::with('inventory')->get();
        $productsTotalQty = [];
    
        foreach ($categories as $category) {
            $totalQuantity = $category->inventory->sum('product_quantity');
            $productsTotalQty[] = [
                'category' => $category,
                'total_quantity' => $totalQuantity
            ];
        }
    
        return view('dashboard', compact('productsTotalQty'));
    }
    
}
