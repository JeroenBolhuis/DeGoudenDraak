<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{    
    public function showSales()
    {
        return view('backend.admin.sales');
    }
    public function calculateRevenue(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Query the database
        $revenue = DB::table('dish_has_sales')
            ->join('sales', 'dish_has_sales.sales_id', '=', 'sales.id')
            ->join('dish', 'dish_has_sales.dish_id', '=', 'dish.id')
            ->whereBetween('sales.date', [$startDate, $endDate])
            ->sum('dish.price');

        return response()->json(['revenue' => $revenue]);
    }
}