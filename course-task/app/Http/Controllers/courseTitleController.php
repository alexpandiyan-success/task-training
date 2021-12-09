<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseTitle;
use Illuminate\Http\Request;

class courseTitleController extends Controller
{
    public function index()
    {
        $getAllCourseTitle = CourseTitle::latest('created_at')->get();

        return view('view-course-titles',compact('getAllCourseTitle'));
    }

    public function AddCourseTitle()
    {
        $getAllCourse = Course::latest('created_at')->get();

        return view('add-course-titles',compact('getAllCourse'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'course_id' => 'required'
        ]);

        $addCourseTitle = new CourseTitle;

        $addCourseTitle->title = $request->title;
        $addCourseTitle->course_id = $request->course_id;

        if($addCourseTitle->save())
        {
            return "created successfully";
        }
    }

    public function show($id)
    {
        $getCourseTitle = CourseTitle::FindOrFail($id);

        return ($getCourseTitle);
    }

    public function update()
    {
        # code...
    }
    
    public function delete($id)
    {
        $getCourseTitle = CourseTitle::FindOrFail($id);

        if($getCourseTitle->delete()){
            return "Deleted successfully";
        }
    }
}
