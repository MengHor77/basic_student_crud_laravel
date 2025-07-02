<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// List all active students
Route::get('/student', [StudentController::class, 'index']);

// Create student form
Route::get('/create-student', [StudentController::class, 'createStudent']);

// Create student POST
Route::post('/create-student', [StudentController::class, 'storeStudent']);

// Edit student form
Route::get('/edit-student/{id}', [StudentController::class, 'editStudent']);

// Update student (PUT)
Route::put('/update-student/{id}', [StudentController::class, 'submitUpdate']);

// Soft delete student (DELETE)
Route::delete('/delete-student/{id}', [StudentController::class, 'deleteStudent']);
