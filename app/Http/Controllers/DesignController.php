<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DesignController extends Controller
{
    public function store(Request $request) {
        Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
        ]);

        $paper = new Design();

        $paper->title = $request->title;
        $paper->description = $request->description;

        if($request->hasFile('doc')) {
            $paper->file = $request->file('doc')->store('design', 'public');
        }

        $user = User::findOrFail(Auth::id());
        $student = Student::where('email', $user->email)->first();

        $paper->student_id = $student->id;
        // $paper->task_id = 1;

        $paper->save();
        
        return back()->with('success', 'System Design submitted successfully');
    }

    public function update(Request $request, $id) {
        Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
        ]);

        $paper = Design::findOrFail($id);

        $paper->title = $request->title;
        $paper->description = $request->description;

        if($request->hasFile('doc')) {
            $paper->file = $request->file('doc')->store('design', 'public');
        }

        $user = User::findOrFail(Auth::id());
        $student = Student::where('email', $user->email)->first();

        $paper->student_id = $student->id;
        // $paper->task_id = 1;

        $paper->save();
        
        return back()->with('success', 'System Design updated successfully');
    }

    public function markDesign(Request $request, $id) {
        Validator::make($request->all(),[
            'marks'=>'min: 0|max: 30',
            'status'=>'required',
            'remarks'=>'required',
        ]);

        $design = Design::findOrFail($id);

        $design->status = $request->status;
        $design->marks = $request->marks;
        $design->remarks = $request->remarks;

        $design->save();

        return back()->with('success', 'Design marked successfully');
    }
}
