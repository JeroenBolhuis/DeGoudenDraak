<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts = Discount::all();
        return view('backend.kassa.discount.index', ['discounts' => $discounts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dishes = Dish::all();
        return view('backend.kassa.discount.create', ['dishes' => $dishes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'price' => 'required|numeric',
            'dish' => 'required|exists:dish,id'
        ], [
            'start_date.after_or_equal' => 'The start date must be today or later.',
            'end_date.after_or_equal' => 'The end date must be after the start date.',
        ]);
    
        $dish = Dish::find($validated['dish']);
    
        if (!$dish) {
            abort(404, 'Invalid dish selected.');
        }
    
        if ($validated['price'] > $dish->price) {
            return redirect()->back()->withErrors(['price' => 'The discount price cannot be higher than the normal price of the dish.']);
        }

        // Custom validation to check for overlapping discounts
        $overlappingDiscount = Discount::where('dish_id', $validated['dish'])
            ->where(function ($query) use ($validated) {
                $query->whereBetween('start_date', [$validated['start_date'], $validated['end_date']])
                    ->orWhereBetween('end_date', [$validated['start_date'], $validated['end_date']])
                    ->orWhere(function ($query) use ($validated) {
                        $query->where('start_date', '<=', $validated['start_date'])
                            ->where('end_date', '>=', $validated['end_date']);
                    });
            })
            ->first();
    
        if ($overlappingDiscount) {
            return redirect()->back()->withErrors(['general' => 'Dates overlap existing discount for this item']);
        }
    
        $discount = new Discount();
    
        $discount->start_date = $validated['start_date'];
        $discount->end_date = $validated['end_date'];
        $discount->price = $validated['price'];
        $discount->dish_id = $validated['dish'];
        $discount->save();
    
        return redirect()->route('kassa.discount.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();
    
        return redirect()->route('kassa.discount.index')->with('success', 'Discount deleted successfully.');
    }
}
