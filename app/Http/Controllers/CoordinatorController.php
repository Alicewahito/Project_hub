<?php

namespace App\Http\Controllers;

use App\Models\ConceptPaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoordinatorController extends Controller
{
    public function conceptPapers() {
        return view('coordinator.concept', ['papers' => ConceptPaper::all()]);
    }
    

    public function markConceptPaper(Request $request, $id) {
        Validator::make($request->all(),[
            'status'=>'required',
            'remarks'=>'required',       
        ]);

        $paper = ConceptPaper::findOrFail($id);

        $paper->status = $request->status;
        $paper->remarks = $request->remarks;

        $paper->save();
        
        return back()->with('success', 'Concept paper marked successfully');
    }
}
