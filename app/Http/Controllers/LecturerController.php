<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class LecturerController extends Controller
{
    public function index() {
        return view('lecturers.index', ['lecturers' => Lecturer::all(), 'students' => Student::all()]);
    }

    public function store(Request $request) {
        Validator::make($request->all(),[
            'firstName'=>'required',
            'lastName'=>'required',
            'staffId' => 'required',
            'email'=>'required',
            'phone'=>'required',
            'password' => 'required',
            'confirmPassword' => 'required'
        ]);

        if($request->password !== $request->confirmPassword) {
            return back()->with('error', 'Password mismatch')->withInput();
        }

        $user = new User();

        $user->name = $request->firstName;
        $user->email = $request->email;
        $user->role = 'ROLE_LECTURER';
        $user->password = bcrypt($request->password);

        $user->save();

        $lecturer = new Lecturer();
        
        $lecturer->first_name = $request->firstName;
        $lecturer->last_name = $request->lastName;
        $lecturer->email = $request->email;
        $lecturer->staff_id = $request->staffId;
        $lecturer->phone = $request->phone;
        
        $lecturer->save();
        
        return redirect('/login')->with('success', 'Account created successfully');
    }

    public function myStudentsProposals() {
        $user = User::findOrFail(Auth::id());

        $lecturer = Lecturer::where('email', $user->email)->first();
        return view('lecturers.proposals', ['students' => Student::where('lecturer_id', $lecturer->id)->get()]);
    }

    public function myStudentsAnalysis() {
        $user = User::findOrFail(Auth::id());

        $lecturer = Lecturer::where('email', $user->email)->first();
        return view('lecturers.analysis', ['students' => Student::where('lecturer_id', $lecturer->id)->get()]);
    }

    public function myStudentsDesign() {
        $user = User::findOrFail(Auth::id());

        $lecturer = Lecturer::where('email', $user->email)->first();
        return view('lecturers.design', ['students' => Student::where('lecturer_id', $lecturer->id)->get()]);
    }

    public function myStudentsImplementation() {
        $user = User::findOrFail(Auth::id());

        $lecturer = Lecturer::where('email', $user->email)->first();
        return view('lecturers.implementation', ['students' => Student::where('lecturer_id', $lecturer->id)->get()]);
    }
}
