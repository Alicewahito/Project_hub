<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AnalysisController extends Controller
{
    public function store(Request $request) {
        Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
        ]);

        $paper = new Analysis();

        $paper->title = $request->title;
        $paper->description = $request->description;

        if($request->hasFile('doc')) {
            $paper->file = $request->file('doc')->store('analysis', 'public');
        }

        $user = User::findOrFail(Auth::id());
        $student = Student::where('email', $user->email)->first();

        $paper->student_id = $student->id;
        // $paper->task_id = 1;

        $paper->save();
        
        return back()->with('success', 'System Analysis submitted successfully');
    }

    public function update(Request $request, $id) {
        Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
        ]);

        $paper = Analysis::findOrFail($id);

        $paper->title = $request->title;
        $paper->description = $request->description;

        if($request->hasFile('doc')) {
            $paper->file = $request->file('doc')->store('analysis', 'public');
        }

        $user = User::findOrFail(Auth::id());
        $student = Student::where('email', $user->email)->first();

        $paper->student_id = $student->id;
        // $paper->task_id = 1;

        $paper->save();
        
        return back()->with('success', 'System Analysis updated successfully');
    }

    public function markAnalysis(Request $request, $id) {
        Validator::make($request->all(),[
            'marks'=>'min: 0|max: 30',
            'status'=>'required',
            'remarks'=>'required',
        ]);

        $analysis = Analysis::findOrFail($id);

        $analysis->status = $request->status;
        $analysis->marks = $request->marks;
        $analysis->remarks = $request->remarks;

        $analysis->save();

        return back()->with('success', 'Analysis marked successfully');
    }
}
