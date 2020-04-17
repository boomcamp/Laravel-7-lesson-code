<?php

namespace App\Http\Controllers;

use App\Mentor;
use Illuminate\Http\Request;

class MentorController extends Controller {
    
    // display mentors
    public function index()
    {
        $mentors = Mentor::all()->toArray();
        return array_reverse($mentors);
    }

    // add mentor
    public function add(Request $request)
    {
        $mentors = new Mentor([
            'fullname' => $request->input('fullname'),
            'course_handle' => $request->input('course_handle')
        ]);
        $mentors->save();

        return response()->json('The mentor successfully added');
    }

    // edit mentor
    public function edit($id)
    {
        $mentors = Mentor::find($id);
        return response()->json($mentors);
    }

    // update mentor
    public function update($id, Request $request)
    {
        $mentors = Mentor::find($id);
        $mentors->update($request->all());

        return response()->json('The mentor successfully updated');
    }

    // delete mentor
    public function delete($id)
    {
        $mentor = Mentor::find($id);
        $mentor->delete();

        return response()->json('The mentor successfully deleted');
    }
}