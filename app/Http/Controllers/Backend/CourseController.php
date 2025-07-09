<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        // Example: fetch courses if you're using a model
        // $courses = Course::all();
        // return view('backend.courses.index', compact('courses'));

        return view('backend.courses.index');
    }
}

