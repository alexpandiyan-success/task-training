<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Course;
use App\Models\Degree;
use App\Models\Enquiry;
use App\Models\Payment;
use App\Models\Specializtion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\PseudoTypes\True_;

class EnquiryController extends Controller
{
    public function viewCourseEnquiry()
    {
        $getAllEnquiry = Enquiry::where('status','=','0')->with('courseEnquiry')->get();

        
        return view('enquiry-management',['getAllEnquiry'=>json_decode($getAllEnquiry,true)]);
    }

    public function viewRejectedCourseEnquiry()
    {
        $getAllEnquiry = Enquiry::where('status','=',2)->with('courseEnquiry')->get();

        return view('view-rejected-enquiry', ['getAllEnquiry'=>json_decode($getAllEnquiry,true)]);
    }

    public function approvedData()
    {
        $getAllEnquiry = Enquiry::where('status','=',1)->with('courseEnquiry')->get();

        return view('view-rejected-enquiry', ['getAllEnquiry'=>json_decode($getAllEnquiry,true)]);
    }

    public function aprooveCourseEnquiry($id)
    {
        $enquiryId = Enquiry::find($id);
        return view('aproove-course-enquiry',compact('enquiryId'));
    }

    public function approve(Request $request)
    {
       
        $request->validate([
            'payment_method'=>'required',
            'payment_mode'=>'required',
            'amount'=>'required',
            'enquiry_id'=>'required',
            'reference_number'=>'required'

        ]);
        $approveEnquiry = new Payment;

        $approveEnquiry->enquiry_id = $request->enquiry_id;
        $approveEnquiry->payment_method = $request->payment_method;
        $approveEnquiry->payment_mode = $request->payment_mode;
        $approveEnquiry->amount = $request->amount;
        $approveEnquiry->reference_number = $request->reference_number;
 
        $generateTxnId = 'TXN'.uniqid().date("YhisA");
        $getTxn = Payment::where('txn_number', '=', $generateTxnId)->exists();

        if($getTxn === false){
            $approveEnquiry->txn_number ='TXN'.uniqid().date("YhisA");
        }else{
            $approveEnquiry->txn_number =$generateTxnId;
        }



       if($approveEnquiry->save())
       {
        $changeStatus = Enquiry::find($approveEnquiry->enquiry_id);
        $clone= clone $changeStatus;
        $changeStatus->status = '1';  
        $changeStatus->save();

        $getAllEnquiry = Enquiry::where('status','=','0')->with('courseEnquiry')->get();

        return view('enquiry-management', compact('getAllEnquiry'));
       }


    }

    public function checkout($id)
    {
        $courseId = Course::all();

        return view('buy', compact('courseId'));
    }

    public function addCourseEnquiry(Request $request)
    {
        $request->validate([
            'mobile_number' => 'required',
            'dob' => 'required',
            'passed_out' => 'sometimes',
            'studying_year' => 'sometimes',
            'district' => 'required',
            'ug_degree' => 'required',
            'specialization' => 'required',
            'college_name' => 'required',
            'interested_course' => 'required',
        ]);


        $enquiry = new Enquiry;
        $enquiry->name = Auth::user()->name;
        $enquiry->email = Auth::user()->email;
        $enquiry->user_id = Auth::user()->id;
        $enquiry->mobile_number = $request->mobile_number;
        $enquiry->dob = $request->dob;
        $enquiry->passed_out = $request->passed_out;
        $enquiry->studying_year = $request->studying_year;
        $enquiry->district = $request->district;
        $enquiry->ug_degree = $request->ug_degree;

        if($request->ug_degree){
            $degree = Degree::where('name', '=', $request->ug_degree)->get()->pluck('name')->implode('');
            if($degree !== $request->ug_degree){
                $addDegree = new Degree;
                $addDegree->name = $request->ug_degree;
                $addDegree->save();
            }
        }
        
        $enquiry->specialization = $request->specialization;
        if($request->specialization){
            $specialization = Specializtion::where('name', '=', $request->specialization)->get()->pluck('name')->implode('');
            if($specialization !== $request->specialization){
                $degree_id = Degree::where('name', '=', $request->ug_degree)->get()->pluck('id')->implode('');
                $addspecialization = new Specializtion;
                $addspecialization->name = $request->specialization;
                $addspecialization->degree_id = $degree_id;
                $addspecialization->save();
            }
        }
        $enquiry->college_name = $request->college_name;
        if($request->college_name){
            $college = College::where('name', '=', $request->college_name)->get()->pluck('name')->implode('');
            if($college !== $request->college_name){
                $addcollege = new College;
                $addcollege->name = $request->ug_degree;
                $addcollege->save();
            }
        }
        $enquiry->interested_course = $request->interested_course;
        $enquiry->course_id = $request->interested_course;
        $enquiry->status = '0';

        if ($enquiry->save()) {
            $getAllCourses =  Course::all();
            return view('welcome', compact('getAllCourses'));
        }
    }

    public function showEnquiry($id)
    {
       
        $show = Enquiry::findOrFail($id);

        return ($show);
    }

    public function reject($id)
    {
        $changeStatus = Enquiry::find($id);
        $clone= clone $changeStatus;
        $changeStatus->status = '2';  
        if($changeStatus->save() ){
            $getAllEnquiry = Enquiry::where('status','=','0')->with('courseEnquiry')->get();
           return view('enquiry-management', compact('getAllEnquiry'));
        }
        
    }

    public function getPendingPayment()
    {
        $getPayment = Enquiry::where('status','=',0)->with(['courseEnquiry','getPayment','getUser'])->get()->toArray();

        return view('view-pending-user', compact('getPayment'));

    }
    public function getEnquiry()
    {
        $getAllEnquiry = Enquiry::where('status', '=', 0)->with(['courseEnquiry'])->latest('created_at')->get();

        return view('pay-now', compact('getAllEnquiry'));
    }
    public function getCompletedPayment()
    {
        $getPayment = Enquiry::where('status','=',1)->with(['courseEnquiry','getPayment','getUser'])->get()->toArray();

        return view('payment-completed-user', compact('getPayment'));

    }

    public function deleteEnquiry($id)
    {
        $deleteEnquiry = Enquiry::find($id);

        if ($deleteEnquiry->delete()) {
            return view('edit-enquiry');
        }
    }
}
