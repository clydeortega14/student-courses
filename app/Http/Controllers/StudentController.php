<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Student;

class StudentController extends Controller
{
    public function index()
    {
        $courses = Course::get(['id', 'course_name']);

        return view('welcome', compact('courses'));
    }

    public function storeStudent(Request $request)
    {
        $request->validate([

            'name' => ['required', 'string', 'max:255'],
            'year' => ['required', 'integer', 'digits:4', 'min:1900', 'max:'.(date('Y'))]

        ]);

        $student = Student::firstOrCreate([
            'name' => $request->name,
            'year' => $request->year
        ]);


        if($request->has('courses')){

            if(count($student->courses) > 0){

                $student->courses()->detach();
            }

            foreach($request->courses as $course){

                $student->courses()->attach($course);
            }
        }



        return redirect()->back()->with('success', 'Successfully created student');
    }
}
