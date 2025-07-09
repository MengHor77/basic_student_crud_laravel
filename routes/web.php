<?php

use Illuminate\Support\Facades\Route;

// Frontend Controllers
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;

// Admin Auth and Backend Controllers
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
| Admin Authentication Routes (Public - No Middleware)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
});

/*
|--------------------------------------------------------------------------
| Admin Protected Routes (Require admin auth middleware)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Logout
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Students (Admin Panel)
    |--------------------------------------------------------------------------
    */
    Route::resource('students', StudentController::class);

    /*
    |--------------------------------------------------------------------------
    | Users (Admin Panel)
    |--------------------------------------------------------------------------
    */
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
    });

    /*
    |--------------------------------------------------------------------------
    | Courses (Admin Panel)
    |--------------------------------------------------------------------------
    */
    Route::resource('courses', CourseController::class);

    /*
    |--------------------------------------------------------------------------
    | Teachers (Admin Panel)
    |--------------------------------------------------------------------------
    */
    Route::prefix('teachers')->name('teachers.')->group(function () {
        Route::get('/', [TeacherController::class, 'index'])->name('index');
        // You can add more teacher CRUD routes here
    });

    /*
    |--------------------------------------------------------------------------
    | Schedule, Reports, Settings
    |--------------------------------------------------------------------------
    */
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
});
