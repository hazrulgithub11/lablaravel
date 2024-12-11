<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Illuminate\Http\Request;

class DayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $days = Day::all();
        return view('days.index', compact('days'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('days.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'day_name' => 'required|unique:days',
        ]);

        Day::create($request->all());

        return redirect()->route('days.index')
                         ->with('success', 'Day created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Day $day)
    {
        return view('days.show', compact('day'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Day $day)
    {
        return view('days.edit', compact('day'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Day $day)
    {
        $request->validate([
            'day_name' => 'required|unique:days,day_name,' . $day->id,
        ]);

        $day->update($request->all());

        return redirect()->route('days.index')
                         ->with('success', 'Day updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Day $day)
    {
        $day->delete();

        return redirect()->route('days.index')
                         ->with('success', 'Day deleted successfully.');
    }
}