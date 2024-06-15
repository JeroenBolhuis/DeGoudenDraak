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
        return view('discount.index', ['discounts' => $discounts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dishes = Dish::all();
        return view('discount.create', ['dishes' => $dishes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'start_date' => 'required|date|after:now',
            'end_date' => 'required|date|after:start_date',
            'price' => 'required|numeric',
            'dish' => 'required|exists:dish,id' 
        ]);
 

        $discount = new Discount();

        $discount->start_date = $validated['start_date'];
        $discount->end_date = $validated['end_date'];
        $discount->price = $validated['price'];
        $discount->dish_id = $validated['dish'];
        $discount->save();

        return redirect()->route('admin.discount.index');

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
    public function destroy(string $id)
    {
        //
    }
}
