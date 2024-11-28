<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::all(); // Replace `Student` with your actual model if different
        return view('students.index', compact('students'));
    }
}
