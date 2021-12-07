<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technology;

class TechnologyController extends Controller
{
    public function index()
    {
        return view('technology-management');
    }

    public function refreshTechnology()
    {
        return view('add-technology');
    }

    public function addCourseTechnology(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'file_path' => 'required|mimes:jpeg,png,jpg,bmp,gif,svg',
        ]);

        $technology = new Technology();
        $technology->name = $request->name;
        $technology->description = $request->description;

        $image = request()->file('file_path');

        $assignName = time() . '.' . $image->getClientOriginalExtension();

        $image->move('./images', $assignName);

        $technology->image =  $assignName;

        if ($technology->save()) {
            return view('add-technology', ['success' => 'Successfully added a technology.!']);
        }
    }

    public function getAllTechnology()
    {
        $getTechnology =  Technology::all();


        return view('edit-technology', compact('getTechnology'));
    }

    public function editTechnology()
    {
        return view('edit-technology');
    }

    public function showTechnology($id)
    {
        $show = Technology::findOrFail($id);

        return ($show);
    }

    public function DeleteTechnology($id)
    {
        $deleteTechnology = Technology::find($id);

        if ($deleteTechnology->delete()) {
            return view('edit-technology');
        }
    }
}
