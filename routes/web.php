<?php

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
    return view('pages.home');
});
Route::get('/home', function () {
    return view('pages.home');
})->name('home');
Route::get('/news', function () {
    return view('pages.news');
})->name('news');
Route::get('/menu', function () {
    return view('pages.menu');
})->name('menu');
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
