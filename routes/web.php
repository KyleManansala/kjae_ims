<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CategoryController;
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

//Inventory
// Route::get('/inventory', [InventoryController::class, 'index'])
//     ->middleware(['auth', 'verified'])
//     ->name('inventory');

// Route::post('/inventory/add', [InventoryController::class, 'store'])
//     ->middleware(['auth', 'verified'])
//     ->name('inventory.add');

// Route::delete('/inventory/delete/{id}', [InventoryController::class, 'delete'])
//     ->middleware(['auth', 'verified'])
//     ->name('inventory.delete');

// Route::get('/inventory/edit/{id}', [InventoryController::class, 'edit'])
//     ->middleware(['auth', 'verified'])
//     ->name('inventory.edit');

// Route::post('/inventory/update/{id}', [InventoryController::class, 'update'])
//     ->middleware(['auth', 'verified'])
//     ->name('inventory.update');

//inventory
Route::resource("inventory", InventoryController::class);


//category
Route::resource("category", CategoryController::class);



Route::get('/reports', function () {
    return view('inventory.reports');
})->middleware(['auth', 'verified'])->name('reports');

Route::get('/weather', function(){
    return view('weather.weather');
})->middleware(['auth', 'verified'])->name('weather');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
