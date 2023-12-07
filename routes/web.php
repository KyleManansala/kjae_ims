    <?php

    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\InventoryController;
    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\WeatherController;
    use App\Http\Controllers\ReportController;
    use App\Http\Controllers\NotificationController;
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

    //inventory
    Route::resource("inventory", InventoryController::class);
    Route::get('/download-report', [InventoryController::class, 'generateReport'])->middleware(['auth', 'verified'])->name('generate.report');



    //category
    Route::resource("category", CategoryController::class);

    Route::get('/tips', function () {
        return view('tips.tips');
    })->middleware(['auth', 'verified'])->name('tips');

    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
   
    //Profile
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });



    require __DIR__.'/auth.php';
