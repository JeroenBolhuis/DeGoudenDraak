<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;#TEMP

class SalesController extends Controller
{    
    public function index()
    {
        \DB::enableQueryLog();
        // Hardcoded start and end dates for testing
        $startDate = '2019-01-01'; // Example start date
        $endDate = '2024-01-31'; // Example end date
    

        // Query the revenue based on the hardcoded dates
        $revenue = DB::table('dish_has_sales')
            ->join('sales', 'dish_has_sales.sales_id', '=', 'sales.id')
            ->join('dish', 'dish_has_sales.dish_id', '=', 'dish.id')
            ->whereBetween('sales.date', [$startDate, $endDate])
            ->sum('dish.price');
    
        // Pass revenue to the view
        return view('admin.sales', ['revenue' => $revenue]);
    }
    public function calculateRevenue(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Log the dates to verify they are correct
        \Log::info('Start Date: ' . $startDate);
        \Log::info('End Date: ' . $endDate);

        // Query the database
        $revenue = DB::table('dish_has_sales')
            ->join('sales', 'dish_has_sales.sales_id', '=', 'sales.id')
            ->join('dish', 'dish_has_sales.dish_id', '=', 'dish.id')
            ->whereBetween('sales.date', [$startDate, $endDate])
            ->sum('dish.price');

        // Log the calculated revenue
        \Log::info('Calculated Revenue: ' . $revenue);

        return response()->json(['revenue' => $revenue]);
    }
}
