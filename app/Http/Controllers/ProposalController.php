<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProposalController extends Controller
{
    public function store(Request $request) {
        Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
        ]);

        $paper = new Proposal();

        $paper->title = $request->title;
        $paper->description = $request->description;

        if($request->hasFile('doc')) {
            $paper->file = $request->file('doc')->store('proposals', 'public');
        }

        $user = User::findOrFail(Auth::id());
        $student = Student::where('email', $user->email)->first();

        $paper->student_id = $student->id;
        // $paper->task_id = 1;

        $paper->save();
        
        return back()->with('success', 'Proposal submitted successfully');
    }

    public function update(Request $request, $id) {
        Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
        ]);

        $paper = Proposal::findOrFail($id);

        $paper->title = $request->title;
        $paper->description = $request->description;

        if($request->hasFile('doc')) {
            $paper->file = $request->file('doc')->store('proposals', 'public');
        }

        $user = User::findOrFail(Auth::id());
        $student = Student::where('email', $user->email)->first();

        $paper->student_id = $student->id;
        // $paper->task_id = 1;

        $paper->save();
        
        return back()->with('success', 'Proposal updated successfully');
    }

    public function markProposal(Request $request, $id) {
        Validator::make($request->all(),[
            'marks'=>'min: 0|max: 30',
            'status'=>'required',
            'remarks'=>'required',
        ]);

        $proposal = Proposal::findOrFail($id);

        $proposal->status = $request->status;
        $proposal->marks = $request->marks;
        $proposal->remarks = $request->remarks;

        $proposal->save();

        return back()->with('success', 'Proposal marked successfully');
    }

}
