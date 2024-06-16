<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Discount;
use App\Models\DishType;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::all();
        return view('backend.admin.dish.index', ['dishes' => $dishes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dishtypes = DishType::all();
        return view('backend.admin.dish.create', ['dishtypes' => $dishtypes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([ 
            'dishnumber' => 'nullable|numeric',
            'addition' => 'nullable|alpha',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'dishtype' => 'required|exists:dishtype,type'
        ]);

        $dish = new Dish();
        $dish->dishnumber = $validatedData['dishnumber'];
        $dish->addition = $validatedData['addition'];
        $dish->name = $validatedData['name'];
        $dish->price = $validatedData['price'];
        $dish->description = $validatedData['description'];
        $dish->dishtype = $validatedData['dishtype'];
        $dish->save();

        return redirect()->route('admin.dish.index')->with('dishes', $dish->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dish = Dish::find($id);
        
        if(!$dish) {
            return redirect()->route(404);
        }

        return view('backend.admin.dish.show', ['dish' => $dish]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dishtypes = DishType::all();
        $dish = Dish::find($id);
        return view('backend.admin.dish.edit', ['dish' => $dish, 'dishtypes' => $dishtypes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([ 
            'dishnumber' => 'nullable|numeric',
            'addition' => 'nullable|alpha',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'dishtype' => 'required|exists:dishtype,type'
        ]);

        $dish = Dish::find($id);
        if(!empty($dish)) {
            $dish->dishnumber = $validatedData['dishnumber'];
            $dish->addition = $validatedData['addition'];
            $dish->name = $validatedData['name'];
            $dish->price = $validatedData['price'];
            $dish->description = $validatedData['description'];
            $dish->dishtype = $validatedData['dishtype'];
            $dish->save();

            return redirect()->route('admin.dish.index');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dish = Dish::find($id);
        $dish->delete();

        return redirect()->route('admin.dish.index');
    }

    public function saveAsPdf() {
        $dishes = Dish::with('discount')->get();
        $discounts = Discount::all();


        return view('layouts.menu-template', ['dishes' => $dishes, 'discounts' => $discounts]);
    }

    public function downloadMenu() {
        $dishes = Dish::with('discount')->get();
        $discounts = Discount::all();
        $filename = 'menu_degoudendraak';

        // $pdf= Pdf::loadView('layouts.menu-template', ['dishes' => $dishes, 'discounts' => $discounts]);
        // return $pdf->download($filename);
        $pdf = Pdf::loadView('layouts.menu-template', ['dishes' => $dishes, 'discounts' => $discounts]);
        return $pdf->download($filename . '.pdf');
        
    }
}
