<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Models\CourseTechnology;

class CourseTechnologyController extends Controller
{
    public function index()
    {
        return view('course-technologies-management');
    }

    public function getCourseTechnology()
    {

        $getTechnology = Technology::all();

        $getCourse = Course::all();

        return view('add-course-technologies', ['technologies' => $getTechnology, 'courses' => $getCourse]);
    }

    public function addCourseTechnology(Request $request)
    {

        $request->validate([
            'course_id' => 'required',
            'technology_id' => 'required',
        ]);

        $courseTech = new CourseTechnology;

        $courseTech->course_id = $request->course_id;

        $courseTech->technology_id = $request->technology_id;

        if ($courseTech->save()) {
            $getTechnology = Technology::all();
            $getCourse = Course::all();
            return view('add-course-technologies', ['technologies' => $getTechnology, 'courses' => $getCourse, 'success' => 'Successfully added a course.!']);
        }
    }

    public function editCourseTecnology()
    {
        return view('edit-course-tecnology');
    }

    public function showCourseTecnology($id)
    {
        $show = CourseTechnology::findOrFail($id);

        return ($show);
    }

    public function DeleteCourseTechnology($id)
    {
        $courseTechnology = CourseTechnology::find($id);

        if ($courseTechnology->delete()) {
            return view('edit-course-tecnology');
        }
    }
}
