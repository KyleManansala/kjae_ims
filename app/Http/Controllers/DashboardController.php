<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch categories and product quantities as before
        $categories = Category::with('inventory')->get();
        $productsTotalQty = [];

        foreach ($categories as $category) {
            $totalQuantity = $category->inventory->sum('product_quantity');
            $productsTotalQty[] = [
                'category' => $category,
                'total_quantity' => $totalQuantity
            ];
        }

        // Fetch weather data
        $latitude = '15.981747226016372';
        $longitude = '120.70006541634363';
        $apiKey = 'c1c552e585a3bf3dd374fe4d543cc013'; //API KEY

        $client = new Client();
        $response = $client->request('GET', "http://api.openweathermap.org/data/2.5/weather?lat=$latitude&lon=$longitude&appid=$apiKey");

        $weatherData = json_decode($response->getBody(), true);

        // Pass both sets of data to the view
        return view('dashboard', compact('productsTotalQty', 'weatherData'));
    }
    
    // Rest of the controller...
}
