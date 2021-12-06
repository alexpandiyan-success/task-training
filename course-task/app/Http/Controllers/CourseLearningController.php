<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseLearning;

class CourseLearningController extends Controller
{
    public function index(){
        return view('course-learning-management');
    }

    public function addCourseLearning(Request $request){
          
        $request->validate([
            'name' =>'required',
            'course_id' =>'required|numeric',
        ]);

        $learning = new CourseLearning;

        $learning->name = $request->name;
        $learning->course_id = $request->course_id;

       if($learning->save())
       {
        $getCourse = Course::all();
        return view('add-course-learning',['courses' => $getCourse,'success'=>"Learning successfully added"]);
       }

    }
    
    public function getCourse()
    {
        $getCourse = Course::all();
        return view('add-course-learning',['courses' => $getCourse]);
     }

    public function editCourseLearning(){
        return view('edit-course-learning');
    }

    public function showCourseLearning(){
        return view('edit-course-learning');
    }

    public function DeleteCourse(){
        return view('edit-course-learning');
    }
}
