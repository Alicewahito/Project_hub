<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use App\Models\ConceptPaper;
use App\Models\Design;
use App\Models\Implementation;
use App\Models\Lecturer;
use App\Models\Proposal;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index() {
        return view('students.index', ['students' => Student::all()]);
    }

    public function store(Request $request) {
        Validator::make($request->all(),[
            'firstName'=> ['required', ],
            'lastName'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'course' => 'required',
            'regNo' => 'required',
            'password' => 'required',
            'confirmPassword' => 'required',
        ]);

        if($request->password !== $request->confirmPassword) {
            return back()->with('error', 'Password mismatch')->withInput();
        }

        $user = new User();

        $user->name = $request->firstName;
        $user->email = $request->email;
        $user->role = 'ROLE_STUDENT';
        $user->password = bcrypt($request->password);

        $user->save();

        $student = new Student();

        $student->first_name = $request->firstName;
        $student->last_name = $request->lastName;
        $student->email = $request->email;
        $student->reg_no = $request->regNo;
        $student->course = $request->course;
        $student->phone = $request->phone;

        $student->save();

        return redirect('/login')->with('success', 'Account created successfully');
    }

    public function conceptPaper() {
        $user = User::findOrFail(Auth::id());

        $student = Student::where('email', $user->email)->first();

        $paper = ConceptPaper::where('student_id', $student->id)->first();

        return view('students.concept-paper', ['paper' => $paper]);
    }

    public function proposal() {
        $user = User::findOrFail(Auth::id());

        $student = Student::where('email', $user->email)->first();

        $paper = Proposal::where('student_id', $student->id)->first();

        return view('students.proposal', ['paper' => $paper]);
    }

    public function analysis() {
        $user = User::findOrFail(Auth::id());

        $student = Student::where('email', $user->email)->first();

        $paper = Analysis::where('student_id', $student->id)->first();

        return view('students.analysis', ['paper' => $paper]);
    }

    public function design() {
        $user = User::findOrFail(Auth::id());

        $student = Student::where('email', $user->email)->first();

        $paper = Design::where('student_id', $student->id)->first();

        return view('students.design', ['paper' => $paper]);
    }

    public function implementation() {
        $user = User::findOrFail(Auth::id());

        $student = Student::where('email', $user->email)->first();

        $paper = Implementation::where('student_id', $student->id)->first();

        return view('students.implementation', ['paper' => $paper]);
    }

    public function myStudents() {
        $user = User::findOrFail(Auth::id());

        $lecturer = Lecturer::where('email', $user->email)->first();

        

        return view('lecturers.students', ['students' => Student::where('lecturer_id', $lecturer->id)->get()]);
    }
}
