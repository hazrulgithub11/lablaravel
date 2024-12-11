<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:groups',
        ]);

        Group::create($request->all());

        return redirect()->route('groups.index')
                         ->with('success', 'Group created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        $request->validate([
            'name' => 'required|unique:groups,name,' . $group->id,
        ]);

        $group->update($request->all());

        return redirect()->route('groups.index')
                         ->with('success', 'Group updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('groups.index')
                         ->with('success', 'Group deleted successfully.');
    }
}