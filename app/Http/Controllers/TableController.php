<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

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
        $table->save();

        return redirect()->route('admin.table.index')->with('tables', $table->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $table = table::find($id);
        
        if(!$table) {
            return redirect()->route(404);
        }

        return view('backend.admin.table.show', ['table' => $table]);
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
