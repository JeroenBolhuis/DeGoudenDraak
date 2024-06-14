<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sales;
use App\Models\DishHasSale;
use App\Models\Dish;

class KassaController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $dishes = Dish::query();

        if ($query) {
            $dishes->where('name', 'like', '%' . $query . '%')
                ->orWhere('dishnumber', 'like', '%' . $query . '%');
        }
        
        $dishes = $dishes->get();

        return view('backend.kassa.index', compact('dishes'));
    }
    public function store(Request $request)
    {
        \Log::info('Request Payload: ', $request->all());
        try {
            // Create a new sale record
            $sale = Sales::create(['date' => now()]);
    
            // Loop through the items and create DishHasSale records
            foreach ($request->items as $item) {
                DishHasSale::create([
                    'sales_id' => $sale->id,
                    'dish_id' => $item['id'],
                    'comment' => $item['comment'] ?? null,
                ]);
            }
    
            return response()->json(['message' => 'Checkout successful'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500); // Send the error message in response
        }
    }
    
}
