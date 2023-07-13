@extends('layouts.dashboard')

@section('title')Students @endsection

@section('content')
<div class="d-flex justify-content-between align-items-center gap-2 mb-3">
    <h3>Students</h3>
</div>
    <div class="mt-3 table-responsive text-nowrap fs-6 fw-normal text-start">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Registration No.</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Course</th>
                    {{-- <th>Superviser</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>
                            {{ $student->reg_no }}
                        </td>
                        <td>
                            {{ $student->reg_no }} {{ $student->last_name }} 
                        </td>
                        <td>
                            {{ $student->phone }}
                        </td>
                        <td>
                            {{ $student->email }}
                        </td>
                        <td>
                            {{ $student->course }}
                        </td>
                        {{-- <td>Sam Oonge</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection