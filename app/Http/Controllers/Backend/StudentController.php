<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // Show list (exclude deleted students)
    public function index()
    {
        $students = Student::where('is_delete', 0)->get();
        return view('backend.students.index', compact('students'));
    }

    // Show create form
    public function create()
    {
        return view('backend.students.create');
    }

    // Store new student
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'age' => 'required|integer|min:1',
        ]);

        Student::create($validated);

        return redirect()->route('admin.students.index')->with('success', 'Student added successfully.');
    }

    // Show a single student (optional)
    public function show(Student $student)
    {
        return view('backend.students.show', compact('student'));
    }

    // Show edit form
    public function edit(Student $student)
    {
        return view('backend.students.edit', compact('student'));
    }

    // Update student
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'age' => 'required|integer|min:1',
        ]);

        $student->update($validated);

        return redirect()->route('admin.students.index')->with('success', 'Student updated successfully.');
    }

    // Soft-delete student by setting is_delete = 1
    public function destroy(Student $student)
    {
        $student->update(['is_delete' => 1]);
        return redirect()->route('admin.students.index')->with('success', 'Student deleted.');
    }
}
