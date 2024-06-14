<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your weblication. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->prefix('backend')->group(function () {

    // Backend Index Route
    Route::get('/', function () {
        return view('backend.index');
    })->name('backend');

    // Kassa Routes
    Route::prefix('kassa')->name('kassa.')->group(function () {
        Route::get('/', function () {
            return view('backend.kassa.index');
        })->name('index');
        Route::get('/menu', function () {
            return view('backend.kassa.menu');
        })->name('menu');
    });

    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/sales', [AdminController::class, 'showSales'])->name('sales');
        Route::post('/sales', [AdminController::class, 'calculateRevenue'])->name('sales.calculate');
    });

    // Restaurant Routes
    Route::prefix('restaurant')->name('restaurant.')->group(function () {
        Route::get('/', function () {
            return view('backend.restaurant.index');
        })->name('index');
    });

    // Profile Routes
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
});

//website routes
Route::get('/', function () {
    return view('web.index');
});
Route::get('/home', function () {
    return view('web.index');
})->name('home');
Route::get('/news', function () {
    return view('web.news');
})->name('news');
Route::get('/menu', function () {
    return view('web.menu');
})->name('menu');
Route::get('/contact', function () {
    return view('web.contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/setLocale', function (\Illuminate\Http\Request $request) {
    $locale = $request->input('locale');
    if (in_array($locale, ['en', 'nl'])) {
        Session::put('locale', $locale);
    }
    return back();
})->name('setLocale');


require __DIR__.'/auth.php';
