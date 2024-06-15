<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::all();
        return view('backend.admin.table.index', ['tables' => $tables]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.table.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([ 
            'number' => 'required|numeric',
            'capacity' => 'required|numeric',
        ]);

        $table = new table();
        $table->number = $validatedData['number'];
        $table->capacity = $validatedData['capacity'];
        $table->need_help = false;
        $table->save();

        return redirect()->route('admin.table.index')->with('tables', $table->toArray());
    }


    public function show($id)
    {
        $table = Table::findOrFail($id);  
        $bookings = $table->bookings()
            ->where('datetime', '>=', Carbon::now()->subHours(4))
            ->orderBy('datetime')
            ->get();
        return view('backend.admin.table.show', compact('table', 'bookings'));
    }
    public function addBooking(Request $request, $id)
    {
        $validatedData = $request->validate([
            'datetime' => 'required|date',
        ]);
    
        // If deluxe_menu checkbox is checked, set it to true
        if ($request->has('deluxe_menu')) {
            $validatedData['deluxe_menu'] = true;
        } else {
            $validatedData['deluxe_menu'] = false;
        }
        $table = Table::findOrFail($id);
        $booking = $table->bookings()->create($validatedData);

        return redirect()->route('admin.table.show', $id)->with('success', 'Booking added successfully.');
    }
    public function destroyBooking(string $id)
    {
        $booking = Booking::findOrFail($id);
        $tableId = $booking->table->id; // Get the table ID before deleting the booking
        $booking->delete();

        return redirect()->route('admin.table.show', $tableId)->with('success', 'Booking deleted successfully.');
    }
    public function addCustomer(Request $request, $bookingId)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
        ]);

        $booking = Booking::findOrFail($bookingId);
        $booking->customers()->create($validatedData);

        return redirect()->route('admin.table.show', $booking->table_idtable)->with('success', 'Customer added successfully.');
    }
    public function destroyCustomer(string $id)
    {
        $customer = Customer::findOrFail($id);
        $tableId = $customer->booking->table->id; // Get the table ID before deleting the booking
        $customer->delete();

        return redirect()->route('admin.table.show', $tableId)->with('success', 'Booking deleted successfully.');
    }
    public function resolve($id)
    {
        $table = Table::findOrFail($id);
        $table->need_help = false;
        $table->save();
        return redirect()->route('restaurant.index')->with('success', 'Booking deleted successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $table = table::find($id);
        return view('backend.admin.table.edit', ['table' => $table]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([ 
            'number' => 'required|numeric',
            'capacity' => 'required|numeric',
        ]);

        $table = table::find($id);
        if(!empty($table)) {
            $table->number = $validatedData['number'];
            $table->capacity = $validatedData['capacity'];
            $table->save();

            return redirect()->route('admin.table.index');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $table = table::find($id);
        $table->delete();

        return redirect()->route('admin.table.index');
    }
}
