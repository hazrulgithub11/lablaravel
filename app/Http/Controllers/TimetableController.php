<?php

namespace App\Http\Controllers;

use App\Models\Timetable;
use App\Models\Subject;
use App\Models\Day;
use App\Models\Hall;
use App\Models\Group;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timetables = Timetable::with(['day', 'subject', 'hall'])->get();
        return view('timetables.index', compact('timetables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get all options for dropdowns
        $subjects = Subject::orderBy('subject_name')->get();
        $days = Day::orderBy('day_name')->get();
        $halls = Hall::orderBy('lecture_hall_name')->get();
        $groups = Group::orderBy('name')->get();  // Changed from 'group_name' to 'name'
    
        return view('timetables.create', compact('subjects', 'days', 'halls', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'subject_id' => 'required',
        'day_id' => 'required',
        'hall_id' => 'required',
        'group_id' => 'required',
        'time_from' => 'required',
        'time_to' => 'required',
    ]);

    // Create the timetable entry
    Timetable::create($request->all());

    return redirect()->route('timetables.index')
        ->with('success', 'Timetable created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(Timetable $timetable)
    {
        return view('timetables.show', compact('timetable'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Timetable $timetable)
    {
        $subjects = Subject::orderBy('subject_name')->get();
        $days = Day::orderBy('day_name')->get();
        $halls = Hall::orderBy('lecture_hall_name')->get();
        $groups = Group::orderBy('name')->get();  // Changed from 'group_name' to 'name'
    
        return view('timetables.edit', compact('timetable', 'subjects', 'days', 'halls', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Timetable $timetable)
    {
        $timetable->update($request->all());
        return redirect()->route('timetables.index')->with('success', 'Timetable updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Timetable $timetable)
    {
        $timetable->delete();
        return redirect()->route('timetables.index')->with('success', 'Timetable deleted successfully.');
    }       
}
