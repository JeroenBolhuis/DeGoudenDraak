<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $tables = Table::all();
        return view('backend.restaurant.index', compact('tables'));
    }

    public function callHelp(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:table,number',
        ]);
        $table = Table::where('number', $validatedData['id'])->firstOrFail();
        $table->update(['need_help' => true]);
    
        return redirect()->route('restaurant')->with('success', 'Hulp succesvol aangevraagd.');
    }
    
}
