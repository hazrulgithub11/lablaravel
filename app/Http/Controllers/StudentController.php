<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'age' => 'nullable|numeric'
        ]);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'age' => $request->age
            ]);

            return redirect()->route('students.index')
                            ->with('success', 'Student created successfully.');
        } 
        catch (\Exception $e) {
            return redirect()->back()
                            ->withInput()
                            ->with('error', 'Error creating student. Please try again.');
        }
    }

    public function show($id)
    {
        $student = User::findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function edit($id)
    {
        $student = User::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'age' => 'nullable|numeric'
        ]);

        try {
            $student = User::findOrFail($id);
            $updateData = [
                'name' => $request->name,
                'email' => $request->email,
                'age' => $request->age
            ];

            if ($request->filled('password')) {
                $updateData['password'] = bcrypt($request->password);
            }

            $student->update($updateData);

            return redirect()->route('students.index')
                            ->with('success', 'Student updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                            ->withInput()
                            ->with('error', 'Error updating student. Please try again.');
        }
    }

    public function destroy($id)
    {
        try {
            $student = User::findOrFail($id);
            $student->delete();

            return redirect()->route('students.index')
                            ->with('success', 'Student deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                            ->with('error', 'Error deleting student. Please try again.');
        }
    }
}