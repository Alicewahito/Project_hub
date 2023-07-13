<?php

namespace App\Http\Controllers;

use App\Models\Allocation;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllocationController extends Controller
{
    public function store(Request $request) {

        
        $integerIds = array_map('intval', $request->input('students'));
        
        foreach($integerIds as $id) {
            $allocation = new Allocation();

            $student = Student::findOrFail($id);
            
            $student->lecturer_id = $request->input('lecturerId');

            $student->save();

            $allocation->students_id = $id;
            $allocation->lecturer_id = $request->input('lecturerId');
            $allocation->save();

        }


        return back()->with('success', 'Allocation successful');
    }
}
