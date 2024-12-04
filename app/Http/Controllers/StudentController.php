<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::all(); // Replace `Student` with your actual model if different
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
            'password' => 'required'
        ]);

        try {
            DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            return redirect()->route('students.index')
                            ->with('success', 'Student created successfully.');
        } 
        catch (\Exception $e) {
            return redirect()->back()
                            ->withInput()
                            ->with('error', 'Email address already exists. Please use a different email.');
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
            'password' => 'required',
        ]);

        try {
            $student = User::findOrFail($id);
            $student->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

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
