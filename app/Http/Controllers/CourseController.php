<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    public function index()
    {
        return view('courses');
    }

    public function storeCourse(Request $request)
    {
        $request->validate([

            'name' => ['required', 'string', 'max:255']
        ]);


        $course = Course::firstOrCreate(['course_name' => $request->name ]);


        return redirect()->back()->with('success', 'Successfully created course');
    }
}
