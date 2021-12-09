<?php

namespace App\Http\Controllers;

use App\Models\Specializtion;
use Illuminate\Http\Request;
use App\Models\Degree;

class specializtionController extends Controller
{
    public function index()
    {
        $getAllSpecializtion = Specializtion::latest('created_at')->get();

        return view('view-specializtions',compact('getAllSpecializtion'));
    }

    public function AddSpecializtions()
    {
        $getDegreesSpa = Degree::latest('created_at')->get();

        return view('add-specializtions',compact('getDegreesSpa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'sometimes',
            'degree_id' => 'required'
        ]);

        $addSpecializtion = new Specializtion;

        $addSpecializtion->name = $request->name;
        $addSpecializtion->degree_id = $request->degree_id;

        $image = request()->file('image');
        $assignName = time() . '.' . $image->getClientOriginalExtension();
        $image->move('./images', $assignName);

        $addSpecializtion->image = $assignName;

        if($addSpecializtion->save())
        {
            $getDegreesSpa = Degree::latest('created_at')->get();

        return view('add-specializtions',compact('getDegreesSpa'));
        }
    }

    public function show($id)
    {
        $getSpecializtion = Specializtion::FindOrFail($id);

        return ($getSpecializtion);
    }

    public function update()
    {
        # code...
    }
    
    public function delete($id)
    {
        $getSpecializtion = Specializtion::FindOrFail($id);

        if($getSpecializtion->delete()){
            return "Deleted successfully";
        }
    }
}
