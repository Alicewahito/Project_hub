<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use App\Models\Design;
use App\Models\Implementation;
use App\Models\Proposal;
use App\Models\Student;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index() {

        $proposals = Proposal::all();

        $reportData = [];

        foreach ($proposals as $proposal) {
            $studentId = $proposal->student_id;

            $first_name = Student::findOrFail($studentId)->first_name;
            $last_name = Student::findOrFail($studentId)->last_name;
            $reg_no = Student::findOrFail($studentId)->reg_no;
            $course = Student::findOrFail($studentId)->course;

            $reportData[] = [
            'student_id' => $studentId,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'reg_no' => $reg_no,
            'course' => $course,
            'proposal_marks' => $proposal->marks,
            'analysis_marks' => $this->getAnalysisMarks($studentId),
            'design_marks' => $this->getDesignMarks($studentId),
            'implementation_marks' => $this->getImplementationMarks($studentId),
        ];

        // dd($reportData);

        return view('coordinator.reports', ['data' => $reportData]);
    }

    }

    private function getAnalysisMarks($studentId)
    {
        return Analysis::where('student_id', $studentId)->value('marks');
    }

    private function getDesignMarks($studentId)
    {
        return Design::where('student_id', $studentId)->value('marks');
    }

    private function getImplementationMarks($studentId)
    {
        return Implementation::where('student_id', $studentId)->value('marks');
    }

    public function exportData() {
        $proposals = Proposal::all();

        $reportData = [];

        foreach ($proposals as $proposal) {
            $studentId = $proposal->student_id;

            $first_name = Student::findOrFail($studentId)->first_name;
            $last_name = Student::findOrFail($studentId)->last_name;
            $reg_no = Student::findOrFail($studentId)->reg_no;
            $course = Student::findOrFail($studentId)->course;

            $reportData[] = [
            'student_id' => $studentId,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'reg_no' => $reg_no,
            'course' => $course,
            'proposal_marks' => $proposal->marks,
            'analysis_marks' => $this->getAnalysisMarks($studentId),
            'design_marks' => $this->getDesignMarks($studentId),
            'implementation_marks' => $this->getImplementationMarks($studentId),
        ];

        $csvData = $this->generateCsvData($reportData);
        $filename = 'report.csv';

        return Response::make($csvData)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename=' . $filename);
        }
        return back()->with('success', 'Data exported successfully');
    }

    private function generateCsvData($reportData)
    {
        $headers = ['Student ID', 'Student Reg No.', 'First Name', 'Last Name', 'Course', 'Proposal Marks', 'System Analysis Marks', 'System Design Marks', 'System Implementation Marks'];
        $csvData = implode(',', $headers) . "\n";

        foreach ($reportData as $data) {
            $csvData .= implode(',', $data) . "\n";
        }

        return $csvData;
    }

}
