<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class WeatherController extends Controller
{
    public function checkWeather(Request $request)
    {   
        $latitude = '15.981747226016372';
        $longitude = '120.70006541634363';
        $apiKey = 'c1c552e585a3bf3dd374fe4d543cc013'; //API KEY
    
        $client = new Client();
        $response = $client->request('GET', "http://api.openweathermap.org/data/2.5/weather?lat=$latitude&lon=$longitude&appid=$apiKey");
    
        $weatherData = json_decode($response->getBody(), true);
        return view('weather.weather', [
            'weatherData' => $weatherData
        ]);
    }
}
