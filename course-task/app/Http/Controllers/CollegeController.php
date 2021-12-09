<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    public function index()
    {
        $getAllColleges = College::latest('created_at')->get();

        return view('view-college',compact('getAllColleges'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'sometimes',
            'location' => 'required'
        ]);

        $addCollege = new College;

        $addCollege->name = $request->name;
        $addCollege->location = $request->location;

        $image = request()->file('image');
        $assignName = time() . '.' . $image->getClientOriginalExtension();
        $image->move('./images', $assignName);

        $addCollege->image = $assignName;

        if($addCollege->save())
        {
            return "created successfully";
        }
    }

    public function show($id)
    {
        $getCollege = College::FindOrFail($id);

        return ($getCollege);
    }

    public function update()
    {
        # code...
    }
    
    public function delete($id)
    {
        $getCollege = College::FindOrFail($id);

        if($getCollege->delete()){
            return "Deleted successfully";
        }
    }
}
