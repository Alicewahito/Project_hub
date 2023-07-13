<?php

namespace App\Http\Controllers;

use App\Models\ConceptPaper;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ConceptPaperController extends Controller
{
    
    public function store(Request $request) {
        Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
            'solution'=>'required',
            'tools'=>'required',
        ]);

        $paper = new ConceptPaper();

        $paper->title = $request->title;
        $paper->problem_description = $request->description;
        $paper->proposed_solution = $request->solution;
        $paper->tools = $request->tools;

        $user = User::findOrFail(Auth::id());

        $student = Student::where('email', $user->email)->first();

        $paper->student_id = $student->id;
        // $paper->task_id = 1;
        
        $paper->save();
        
        return back()->with('success', 'Concept paper submitted successfully');
    }

    public function update(Request $request, $id) {
        Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
            'solution'=>'required',
            'tools'=>'required',   
            'status' => 'required',
            'remarks'=> 'required',      
        ]);

        $remarks = $request->remarks === "" ? null : $request->remarks;

        $paper = ConceptPaper::findOrFail($id);

        $paper->title = $request->title;
        $paper->problem_description = $request->description;
        $paper->proposed_solution = $request->solution;
        $paper->status = $request->status;
        $paper->remarks = $remarks;

        $user = User::findOrFail(Auth::id());

        $student = Student::where('email', $user->email)->first();

        $paper->student_id = $student->id;
        // $paper->task_id = 1;

        $paper->save();
        
        return back()->with('success', 'Concept paper updated successfully');
    }

    
}
