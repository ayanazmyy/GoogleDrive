<?php

namespace App\Http\Controllers;

use App\Drive;
use Illuminate\Http\Request;

class DriveController extends Controller
{

    public function index()
    {
        $drives = Drive::all();
        return view('drives.index')->with('drives', $drives);
    }

    public function create()
    {
        return view('drives.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            "title"=>"required|min:3",
            "description"=>"required|min:3|max:50",
            "inputFile"=>"required|file|max:90000"
        ]);
        $drive = new Drive;
        $drive->title = $request->title;
        $drive->description = $request->description;
        // image code
        $drive_data = $request->file('inputFile');
        $drive_name = $drive_data->getClientOriginalName();
        $drive_data->move(public_path() . "/upload/" , $drive_name);
        $drive->file = $drive_name;
        $drive->save();
        return redirect('drives')->with('done', "Uploaded successfully");
    }


    public function show($id)
    {
        $drive = Drive::find($id);
        return view('drives.show')->with('drive', $drive);
    }


    public function edit($id)
    {
        $drive = Drive::find($id);
        return view('drives.edit')->with('drive', $drive);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            "title"=>"required|min:3",
            "description"=>"required|min:3|max:50",
            "inputFile"=>"required|file|max:90000"
        ]);
        $drive = Drive::find($id);
        $drive->title = $request->title;
        $drive->description = $request->description;
        // image code
        $drive_data = $request->file('inputFile');
        $drive_name = $drive_data->getClientOriginalName();
        $drive_data->move(public_path() . "/upload/" , $drive_name);
        $drive->file = $drive_name;
        $drive->save();
        return redirect('drives')->with('done', "Updated successfully");
    }


    public function destroy($id)
    {
        $drive = Drive::find($id);
        $drive->delete();
        return redirect('drives')->with('done', "Deleted successfully");
    }

    public function download($id) {
        $drive = Drive::where('id', $id)->firstOrFail();
        $drive_path = public_path('upload/' . $drive->file);
        return response()->download($drive_path);
    }
}
