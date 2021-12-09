<?php

namespace App\Http\Controllers;

use App\Models\CourseTitle;
use App\Models\CourseTitleDetail;
use Illuminate\Http\Request;

class courseTitleDetailController extends Controller
{
    public function index()
    {
        $getAllCourseTitleDetails = CourseTitleDetail::latest('created_at')->get();

        return view('view-course-title-details',compact('getAllCourseTitleDetails'));
    }

    public function AddCourseTitleDetails()
    {
        $getAllCourseTitle = CourseTitle::latest('created_at')->get();

        return view('add-course-title-details',compact('getAllCourseTitle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'course_title_id' => 'required',
            'description' => 'required'
        ]);

        $addCourseTitleDetails = new CourseTitleDetail;

        $addCourseTitleDetails->title = $request->title;
        $addCourseTitleDetails->course_title_id = $request->course_title_id;
        $addCourseTitleDetails->description = $request->description;

        if($addCourseTitleDetails->save())
        {
            $getAllCourseTitle = CourseTitle::latest('created_at')->get();

        return view('add-course-title-details',compact('getAllCourseTitle'));
        }
    }

    public function show($id)
    {
        $getCourseTitleDetail = CourseTitleDetail::FindOrFail($id);

        return ($getCourseTitleDetail);
    }

    public function update()
    {
        # code...
    }
    
    public function delete($id)
    {
        $getCourseTitleDetail = CourseTitleDetail::FindOrFail($id);

        if($getCourseTitleDetail->delete()){
            return "Deleted successfully";
        }
    }
}
