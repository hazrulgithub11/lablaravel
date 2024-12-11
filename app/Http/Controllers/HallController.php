<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use Illuminate\Http\Request;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $halls = Hall::all();
        return view('halls.index', compact('halls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('halls.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lecture_hall_name' => 'required|unique:halls',
            'lecture_hall_place' => 'required',
        ]);

        Hall::create($request->all());

        return redirect()->route('halls.index')
                         ->with('success', 'Hall created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hall $hall)
    {
        return view('halls.show', compact('hall'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hall $hall)
    {
        return view('halls.edit', compact('hall'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hall $hall)
    {
        $request->validate([
            'lecture_hall_name' => 'required|unique:halls,lecture_hall_name,' . $hall->id,
            'lecture_hall_place' => 'required',
        ]);

        $hall->update($request->all());

        return redirect()->route('halls.index')
                         ->with('success', 'Hall updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hall $hall)
    {
        $hall->delete();

        return redirect()->route('halls.index')
                         ->with('success', 'Hall deleted successfully.');
    }
}