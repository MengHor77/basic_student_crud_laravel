<?php

use Illuminate\Support\Facades\Route;

// Frontend Controllers
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;

// Admin Auth & Backend Controllers
use App\Http\Controllers\Backend\AdminAuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\TeacherController;
use App\Http\Controllers\Backend\ScheduleController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\SettingController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('frontend.home');
Route::get('/about', [AboutController::class, 'index'])->name('frontend.about');
Route::get('/contact', [ContactController::class, 'index'])->name('frontend.contact');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes (Public)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
});

/*
|--------------------------------------------------------------------------
| Admin Protected Routes (Requires Middleware)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Logout
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Resource Controllers (Auto generate all routes for CRUD)
    Route::resource('users', UserController::class);
    Route::resource('students', StudentController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('teachers', TeacherController::class);

    Route::resource('settings', SettingController::class);
    Route::resource('reports', ReportController::class);
    Route::resource('schedule', ScheduleController::class);


});
