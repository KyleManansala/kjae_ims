<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//inventory
Route::resource("inventory", InventoryController::class);

//category
Route::resource("category", CategoryController::class);



Route::get('/reports', function () {
    return view('inventory.reports');
})->middleware(['auth', 'verified'])->name('reports');

Route::get('/tips', function () {
    return view('tips.tips');
})->middleware(['auth', 'verified'])->name('tips');

//Display weather
Route::get('/weather', [WeatherController::class, 'checkWeather'])->middleware(['auth', 'verified'])->name('weather');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
