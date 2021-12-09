<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {

        return view('dashboard');
    }

    public function indexCourse()
    {
        return view('course-management');
    }

    public function refreshCourse()
    {
        return view('add-course');
    }

    public function getAllCoursesTable()
    {
        $getAllCourses =  Course::all();

        return view('edit-course', compact('getAllCourses'));
    }

    public function getAllCourses()
    {
        $getAllCourses =  Course::all();

        return view('welcome', compact('getAllCourses'));
    }

    public function addCourse(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'short_description' => 'required',
            'detailed_description' => 'required',
            'file_path' => 'required|mimes:jpeg,png,jpg,bmp,gif,svg',
            'video_url' => 'required',
        ]);

        $course = new Course();

        $course->name = $request->name;

        $course->price = $request->price;

        $course->short_description = $request->short_description;

        $course->detailed_description = $request->detailed_description;

        $course->video_url = $request->video_url;

        $image = request()->file('file_path');

        $assignName = time() . '.' . $image->getClientOriginalExtension();

        $image->move('./images', $assignName);

        $course->image =  $assignName;

        if ($course->save()) {
            return view('add-course', ['success' => 'Successfully added a course.!']);
        }
    }

    public function editCourse()
    {

        return view('edit-course');
    }

    public function showCourse($id)
    {
        $getCourse = Course::with(['courseLearnings', 'courseTitle', 'courseTechnologies', 'courseTitle.courseTitleDetails'])->FindOrFail($id);
        return view('course-single', ['students' => json_decode($getCourse, true), 'getCourse' => $getCourse]);
    }

    public function DeleteCourse($id)
    {
        $course = Course::findOrFail($id);
        if ($course->delete()) {
            return view('edit-course');
        }
    }
}
