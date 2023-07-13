<?php

namespace App\Http\Controllers;

use App\Models\Implementation;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ImplementationController extends Controller
{
    public function store(Request $request) {
        Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
            'github'=> 'required'
        ]);

        $paper = new Implementation();

        $paper->title = $request->title;
        $paper->description = $request->description;
        $paper->github_repo = $request->github;

        if($request->hasFile('doc')) {
            $paper->file = $request->file('doc')->store('implementation', 'public');
        }

        $user = User::findOrFail(Auth::id());
        $student = Student::where('email', $user->email)->first();

        $paper->student_id = $student->id;
        // $paper->task_id = 1;

        $paper->save();
        
        return back()->with('success', 'System Implementation submitted successfully');
    }

    public function update(Request $request, $id) {
        Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
            'github'=>'required'
        ]);

        $paper = Implementation::findOrFail($id);

        $paper->title = $request->title;
        $paper->description = $request->description;
        $paper->github_repo = $request->github;

        if($request->hasFile('doc')) {
            $paper->file = $request->file('doc')->store('design', 'public');
        }

        $user = User::findOrFail(Auth::id());
        $student = Student::where('email', $user->email)->first();

        $paper->student_id = $student->id;
        // $paper->task_id = 1;

        $paper->save();
        
        return back()->with('success', 'System Implementation updated successfully');
    }
}
