<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // Show all active students
    public function index()
    {
        $students = Student::where('is_delete', 0)->get();
        return view('student.index', compact('students'));
    }

    // Show create form
    public function create()
    {
        return view('student.create');
    }

    // Handle create form POST
    public function store(Request $request)
    {
        Student::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'age' => $request->age,
            'is_delete' => 0,
        ]);

        return redirect('/student')->with('success', 'Student created successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit', compact('student'));
    }

    // Handle update submission
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $student->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'age' => $request->age,
        ]);

        return redirect('/student')->with('success', 'Student updated successfully!');
    }

    // Soft delete student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->update(['is_delete' => 1]);

        return redirect('/student')->with('success', "Student with ID $id deleted (soft).");
    }
}