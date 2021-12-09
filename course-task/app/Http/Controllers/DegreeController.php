<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
    public function index()
    {
        $getAllDegrees = Degree::latest('created_at')->get();

        return view('view-degree',compact('getAllDegrees'));

    }

    public function indexPage()
    {
        return view('add-degree');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'sometimes',
        ]);

        $addDegree = new Degree;

        $addDegree->name = $request->name;

        $image = request()->file('image');
        $assignName = time() . '.' . $image->getClientOriginalExtension();
        $image->move('./images', $assignName);

        $addDegree->image = $assignName;

        if($addDegree->save())
        {
            return view ('add-degree');
        }
    }

    public function show($id)
    {
        $getDegree = Degree::FindOrFail($id);

        return ($getDegree);
    }

    public function update()
    {
        # code...
    }
    
    public function delete($id)
    {
        $getDegree = Degree::FindOrFail($id);

        if($getDegree->delete()){
            return "Deleted successfully";
        }
    }
}
