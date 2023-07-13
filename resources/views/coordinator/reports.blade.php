@extends('layouts.dashboard')

@section('title')Reports @endsection

@section('content')
<div class="d-flex justify-content-between align-items-center gap-2 mb-3">
    <h3>Students Report</h3>
    <a href="/export-data" class="btn btn-primary btn-sm d-flex align-items-center gap-2"><i class="fas fa-download"></i>Download</a>
</div>
    <div class="mt-3 table-responsive text-nowrap fs-6 fw-normal text-start">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Registration No.</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Proposal/30</th>
                    <th>Analysis/30</th>
                    <th>Design/30</th>
                    <th>Implementation/30</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $student)
                    <tr>
                        <td>
                            {{ $student['reg_no'] }}
                        </td>
                        <td>
                            {{ $student['first_name'] }} {{ $student['last_name'] }} 
                        </td>
                        <td>
                            {{ $student['course'] }}
                        </td>
                        <td>
                            {{ $student['proposal_marks'] }}
                        </td>
                        <td>
                            {{ $student['analysis_marks'] }}
                        </td>
                        
                        <td>
                            {{ $student['design_marks'] }}
                        </td>
                        <td>
                            {{ $student['implementation_marks'] }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection