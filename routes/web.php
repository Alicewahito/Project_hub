<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/signup', function () {
    return view('authentication.signup');
});

Route::get('/sign-up', function () {
    return view('authentication.lecturer-sign-up');
});

Route::get('/login', function () {
    return view('authentication.login');
});

Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
    Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index']);
    Route::get('/students', [App\Http\Controllers\StudentController::class, 'index']);
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile']);

    // LECTURERS
    Route::get('/lecturers', [App\Http\Controllers\LecturerController::class, 'index']);
    Route::post('/lecturers', [App\Http\Controllers\LecturerController::class, 'store']);

    Route::get('/my-students', [App\Http\Controllers\StudentController::class, 'myStudents']);
    Route::get('/my-students-proposal', [App\Http\Controllers\LecturerController::class, 'myStudentsProposals']);
    Route::get('/my-students-system-analysis', [App\Http\Controllers\LecturerController::class, 'myStudentsAnalysis']);
    Route::get('/my-students-system-design', [App\Http\Controllers\LecturerController::class, 'myStudentsDesign']);
    Route::get('/my-students-implementation', [App\Http\Controllers\LecturerController::class, 'myStudentsImplementation']);
    Route::get('/student/proposal/{id}', [App\Http\Controllers\ProposalController::class, 'proposal']);

    Route::post('/mark-proposal/{id}', [App\Http\Controllers\ProposalController::class, 'markProposal']);
    Route::post('/mark-analysis/{id}', [App\Http\Controllers\AnalysisController::class, 'markAnalysis']);
    Route::post('/mark-design/{id}', [App\Http\Controllers\DesignController::class, 'markDesign']);

    // COORDINATOR
    Route::post('/student-allocations', [App\Http\Controllers\AllocationController::class, 'store']);
    Route::get('/all-concept-papers', [App\Http\Controllers\CoordinatorController::class, 'conceptPapers']);
    Route::post('/mark-concept-paper/{id}', [App\Http\Controllers\CoordinatorController::class, 'markConceptPaper']);
    Route::get('/reports', [App\Http\Controllers\ReportController::class, 'index']);
    Route::get('/export-data', [App\Http\Controllers\ReportController::class, 'exportData']);


    // STUDENTS
    Route::post('/students', [App\Http\Controllers\StudentController::class, 'store']);
    Route::get('/students/concept-paper', [App\Http\Controllers\StudentController::class, 'conceptPaper']);
    Route::post('/students/concept-paper', [App\Http\Controllers\ConceptPaperController::class, 'store']);
    Route::post('/students/concept-paper/{id}', [App\Http\Controllers\ConceptPaperController::class, 'update']);

    Route::get('/students/proposal', [App\Http\Controllers\StudentController::class, 'proposal']);
    Route::post('/students/proposal', [App\Http\Controllers\ProposalController::class, 'store']);
    Route::post('/students/proposal/{id}', [App\Http\Controllers\ProposalController::class, 'update']);

    Route::get('/students/system-analysis', [App\Http\Controllers\StudentController::class, 'analysis']);
    Route::post('/students/system-analysis', [App\Http\Controllers\AnalysisController::class, 'store']);
    Route::post('/students/system-analysis/{id}', [App\Http\Controllers\AnalysisController::class, 'update']);

    Route::get('/students/system-design', [App\Http\Controllers\StudentController::class, 'design']);
    Route::post('/students/system-design', [App\Http\Controllers\DesignController::class, 'store']);
    Route::post('/students/system-design/{id}', [App\Http\Controllers\DesignController::class, 'update']);

    Route::get('/students/implementation', [App\Http\Controllers\StudentController::class, 'implementation']);
    Route::post('/students/implementation', [App\Http\Controllers\ImplementationController::class, 'store']);
    Route::post('/students/implementation/{id}', [App\Http\Controllers\ImplementationController::class, 'update']);

    // TASKS
    Route::post('/tasks', [App\Http\Controllers\TaskController::class, 'store']);
    Route::post('/tasks/{id}', [App\Http\Controllers\TaskController::class, 'update']);
    Route::delete('/tasks/{id}', [App\Http\Controllers\TaskController::class, 'destroy']);
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
});



