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
        $days = Day::pluck('day_name', 'id');
        $halls = Hall::pluck('lecture_hall_name', 'id');
        $subjects = Subject::pluck('subject_name', 'id');

        return view('timetables.create', compact('days', 'subjects', 'halls'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Timetable::create([
            'user_id' => auth()->user()->id,
            'day_id' => $request->day_id,
            'subject_id' => $request->subject_id,
            'hall_id' => $request->hall_id,
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,
        ]);

        return redirect()->route('timetables.index')->with('success', 'Timetable created successfully.');
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
        $days = Day::pluck('day_name', 'id');
        $halls = Hall::pluck('lecture_hall_name', 'id');
        $subjects = Subject::pluck('subject_name', 'id');

        return view('timetables.edit', compact('days', 'subjects', 'halls', 'timetable'));
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
