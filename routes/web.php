<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// List all active students
Route::get('/', [StudentController::class, 'index'])->name('student.index');
Route::get('/student', [StudentController::class, 'index'])->name('student.index');

// Create student form
Route::get('/student/create-student', [StudentController::class, 'create'])->name('student.create');

// Create student POST
Route::post('/student/create-student', [StudentController::class, 'store'])->name('student.store');

// Edit student form
Route::get('/student/edit-student/{id}', [StudentController::class, 'edit'])->name('student.edit');

// Update student (PUT)
Route::put('/student/update-student/{id}', [StudentController::class, 'update'])->name('student.update');

// Soft delete student (DELETE)
Route::delete('/student/delete-student/{id}', [StudentController::class, 'destroy'])->name('student.delete');
