<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalesController;
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

Route::middleware('auth')->group(function () {
    Route::get('/kassa', function () {
        return view('admin.kassa');
    })->name('admin.kassa');
    Route::get('/kassamenu', function () {
        return view('admin.menu');
    })->name('admin.menu');
    Route::get('/sales', function () {
        return view('admin.sales');
    })->name('admin.sales');
    Route::get('/sales', [SalesController::class, 'index'])->name('admin.sales');
    Route::post('/sales', [SalesController::class, 'calculateRevenue']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('app.index');
});

Route::get('/home', function () {
    return view('app.index');
})->name('home');

Route::get('/news', function () {
    return view('app.news');
})->name('news');

Route::get('/menu', function () {
    return view('app.menu');
})->name('menu');

Route::get('/contact', function () {
    return view('app.contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
