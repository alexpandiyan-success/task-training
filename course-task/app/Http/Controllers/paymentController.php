<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Enquiry;

class paymentController extends Controller
{
    public function index()
    {
        $getAllPayment = Payment::latest('created_at')->get();

        return ($getAllPayment);
    }

    public function getEnquiry()
    {
        $getAllEnquiry = Enquiry::where('status', '=', 0)->latest('created_at')->get();

        return view('pay-now', compact('getAllEnquiry'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required',
            'payment_mode' => 'required',
            'amount' => 'required',
            'enquiry_id' => 'required'
        ]);
        $approveEnquiry = new Payment;

        $approveEnquiry->enquiry_id = $request->enquiry_id;
        $approveEnquiry->payment_method = $request->payment_method;
        $approveEnquiry->payment_mode = $request->payment_mode;
        $approveEnquiry->reference_number = $request->reference_number;


        $getCourseId = Enquiry::where('id', '=', $request->enquiry_id)->pluck('course_id')->implode('');
        $getCourseAmount = Course::where('id', '=', $getCourseId)->pluck('price')->implode('');

        $approveEnquiry->total_amount = $getCourseAmount;

        if ($approveEnquiry->total_amount < $request->amount) {
            $getAllEnquiry = Enquiry::where('status', '=', 0)->latest('created_at')->get();
            return view('pay-now', ['success' => 'Please enter valid amount', 'getAllEnquiry' => $getAllEnquiry]);
        } 
        else {
            $paidAmount = Payment::where('enquiry_id', '=', $approveEnquiry->enquiry_id)->pluck('amount');
            $a2 = 0;
            foreach ($paidAmount as $paid) {
            $a2 += $paid;
           }
           $totalAmount = Payment::where('enquiry_id', '=', $approveEnquiry->enquiry_id)->pluck('total_amount')->toArray();

           if(intval($totalAmount) === 0){

                if($a2 === 0){
                    $approveEnquiry->amount = $request->amount;
                    $changeStatus = Enquiry::find($approveEnquiry->enquiry_id);
                    $clone = clone $changeStatus;
                    $changeStatus->status = 1;
                    $changeStatus->save();
                   $approveEnquiry->txn_number = $this->uniqueId();

                    $approveEnquiry->save();

                    $getAllEnquiry = Enquiry::where('status', '=', 0)->latest('created_at')->get();
                        return view('pay-now', ['success' => 'Paid successfully', 'getAllEnquiry' => $getAllEnquiry]);
                }
           }else{

            $t = intval($totalAmount['0']) - $a2;
            $approveEnquiry->amount = $t;
            $changeStatus = Enquiry::find($approveEnquiry->enquiry_id);
            $clone = clone $changeStatus;
            $changeStatus->status = 1;
            $changeStatus->save();
         
           }

        }
        $approveEnquiry->txn_number = $this->uniqueId();

        $paidAmount = Payment::where('enquiry_id', '=', $approveEnquiry->enquiry_id)->pluck('amount');
        $a2 = 0;
        foreach ($paidAmount as $paid) {
            $a2 += $paid;
        }
  
        if ($a2 < intval($approveEnquiry->total_amount)) {
            if ($approveEnquiry->save()) {
                $getAllEnquiry = Enquiry::where('status', '=', 0)->latest('created_at')->get();
                return view('pay-now', ['success' => 'Paid successfully', 'getAllEnquiry' => $getAllEnquiry]);
            }
        }elseif($a2 >= intval($approveEnquiry->total_amount)){
            
            $changeStatus = Enquiry::find($approveEnquiry->enquiry_id);
            $clone = clone $changeStatus;
            $changeStatus->status = 1;
            $changeStatus->save();
            $getAllEnquiry = Enquiry::where('status', '=', 0)->latest('created_at')->get();

            return view('pay-now', ['success' => 'Already paid this user', 'getAllEnquiry' => $getAllEnquiry]);
        } else {

            $getAllEnquiry = Enquiry::where('status', '=', 0)->latest('created_at')->get();

            return view('pay-now', ['success' => 'Already paid this user', 'getAllEnquiry' => $getAllEnquiry]);
        }
    }

    public function uniqueId(){

        $txn = "TXN".rand(10000,100000);
        $payment = Payment::where('txn_number', '=', $txn)->exists();
        if(!$payment){
            return $txn;
        }else{
            $this->uniqueId();
        }
    }

    public function show($id)
    {
        $getPayment = Payment::FindOrFail($id);

        return ($getPayment);
    }


    public function update()
    {
        # code...
    }

    public function delete($id)
    {
        $getPayment = Payment::FindOrFail($id);

        if ($getPayment->delete()) {
            return "Deleted successfully";
        }
    }
}
