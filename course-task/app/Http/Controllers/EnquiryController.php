<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function viewCourseEnquiry(){
        $getAllEnquiry = Enquiry::with('courseEnquiry')->get();
        
        return view('enquiry-management',compact('getAllEnquiry'));
    }

    public function editEnquiry(){
        return view('edit-enquiry');
    }

    public function checkout($id){

        $courseId= $id;

        return view('buy',compact('courseId'));

    }

    public function addCourseEnquiry(Request $request){


        $request->validate([
            'name' =>'required',
            'email' =>'required',
            'course_id' =>'required',
            'mobile_number' =>'required',
            'dob' =>'required',
            'passed_out' =>'sometimes',
            'studying_year' =>'sometimes',
            'district' =>'required',
            'ug_degree' =>'required',
            'specialization' =>'required',
            'college_name' =>'required',
            'interested_course' =>'required',
        ]);


         $enquiry = new Enquiry;
         $enquiry->name = $request->name;
         $enquiry->email = $request->email;
         $enquiry->mobile_number = $request->mobile_number;
         $enquiry->dob = $request->dob;
         $enquiry->passed_out = $request->passed_out;
         $enquiry->studying_year = $request->studying_year;
         $enquiry->district = $request->district;
         $enquiry->ug_degree = $request->ug_degree;
         $enquiry->specialization = $request->specialization;
         $enquiry->college_name = $request->college_name;
         $enquiry->interested_course = $request->interested_course;
         $enquiry->course_id = $request->course_id;
         $enquiry->status = '0';

         if($enquiry->save()){
                $getAllCourses =  Course::all();
                return view('welcome',compact('getAllCourses'));
         }
  
    }

    public function showEnquiry(){
        return view('edit-enquiry');
    }

    public function DeleteCourse(){
        return view('edit-enquiry');
    }
}
