<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::post('/revenue', function (Request $request) {
    $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    $revenue = DB::table('dish_has_sales')
        ->join('sales', 'dish_has_sales.sales_id', '=', 'sales.id')
        ->join('dish', 'dish_has_sales.dish_id', '=', 'dish.id')
        ->whereBetween('sales.date', [$startDate, $endDate])
        ->sum('dish.price');

    \Log::info('Calculated Revenue: ' . $revenue); // Log the revenue value


    return response()->json(['revenue' => $revenue]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
