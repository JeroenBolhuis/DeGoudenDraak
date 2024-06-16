<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class WebController extends Controller
{
    
    public function showDiscounts(Request $request)
    {
        $now = Carbon::now();
        $oneWeekLater = $now->copy()->addWeek();
    
        $discounts = Discount::where('end_date', '>=', $now)
            ->where('start_date', '<=', $oneWeekLater)
            ->get();
    
        return view('web.discounts', compact('discounts'));
    }
}
