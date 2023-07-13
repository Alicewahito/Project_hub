<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.index', [
            'tasks' => Task::all(), 
            'total_lecturers' => Lecturer::count(), 
            'total_students' => Student::count(),
            'total_tasks' => Task::count()
        ]);
    }
}
