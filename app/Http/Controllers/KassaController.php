<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Dish;
use App\Models\Sales;
use App\Models\DishHasSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Storage;

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
        Log::info('Request Payload: ', $request->all());
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

    public function saveAsPdf() {
    
        return view('backend.kassa.rekening-template');
    }

    public function generatePDF(Request $request)  {
        // $items = $request->input('items');
        
        // $data = [
        //     'logo' => public_path('storage/dragon-small.png'),
        //     'items' => $items,
        //     'totalPrice' => array_reduce($items, function ($carry, $item) {
        //         return $carry + ($item['price'] * $item['quantity']);
        //     }, 0)
        // ];

        // try {
        //     $pdf = FacadePdf::loadView('backend.kassa.rekening-template', $data);
        //     return $pdf->setPaper([0, 0, 241, 283])->download('rekening.pdf');
        // } catch (\Exception $e) {
        //     \Log::error('PDF Generation Error: ' . $e->getMessage());
        //     return response()->json(['error' => 'Failed to generate PDF'], 500);
        // }
        try {
            $items = $request->input('items');
    
            // Ensure $items is not empty before proceeding
            if (empty($items)) {
                throw new \Exception('No items provided for PDF generation.');
            }
            
            $data = [
                'logo' => public_path('storage/dragon-small.png'),
                'items' => $items,
                'totalPrice' => array_reduce($items, function ($carry, $item) {
                    return $carry + ($item['price'] * $item['quantity']);
                }, 0)
            ];
    
            // Ensure the view exists before attempting to load it
            if (!view()->exists('backend.kassa.rekening-template')) {
                throw new \Exception('Template not found.');
            }
    
            $pdf = FacadePdf::loadView('backend.kassa.rekening-template', $data);
    
            return $pdf->setPaper([0, 0, 241, 283])->download('rekening.pdf');
        } catch (\Exception $e) {
            \Log::error('PDF Generation Error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to generate PDF'], 500);
        }

    }
    
}
