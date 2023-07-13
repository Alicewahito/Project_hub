@extends('layouts.dashboard')

@section('title')Lecturers @endsection

@section('content')
<div class="d-flex justify-content-between align-items-center gap-2 mb-3">
    <h3>Lecturers</h3>
    {{-- <button class="btn btn-primary btn-sm"
    data-bs-toggle="modal" data-bs-target="#addLecturerModal"
    >Add Lecturer</button> --}}
</div>
    <div class="mt-3 table-responsive text-nowrap fs-6 fw-normal text-start">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Staff ID</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lecturers as $lecturer)
                <tr>
                    <td>
                        {{ $lecturer->staff_id }}
                    </td>
                    <td>
                        {{ $lecturer->first_name }} {{ $lecturer->last_name }}
                    </td>
                    <td>
                        {{ $lecturer->phone }}
                    </td>
                    <td>
                        {{ $lecturer->email }}
                    </td>
                    <td>
                        <button class="btn btn-success btn-sm" style="margin-right: .3rem;" 
                            data-bs-toggle="modal" data-bs-target="#allocateModal"
                        >
                            Allocate Students
                        </button>
                        {{-- <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash" style="margin-right: .2rem;"></i>
                        </button> --}}
                    </td>
                </tr>   


                    <!-- Allocation Modal -->
                    <div class="modal fade" id="allocateModal" tabindex="-1" aria-labelledby="allocateModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="allocateModal">{{ $lecturer->first_name }} {{ $lecturer->last_name }} Students</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form class="d-flex flex-column gap-3 py-2" method="post" action="/student-allocations">
                                        @csrf

                                        <div class="allocated-students">
                                            @foreach ($students as $student)
                                            <div class="form-group d-flex gap-2">
                                                <input type="checkbox" name="students[]" value={{ $student->id }} 
                                                    {{-- {{ @if($role->permissions->contains($permission->id)) checked=checked @endif }} --}}
                                                />
                                                <label style="padding-top: .2rem;">{{ $student->first_name }} {{ $student->last_name }}</label>
                                            </div>
                                            <input type="hidden" value="{{ $lecturer->id }}" name="lecturerId" />
                                            @endforeach
                                        </div>

                                        <div class="form-group mt-3">
                                            <button class="btn btn-primary btn-sm">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach             
            </tbody>
        </table>
    </div>
@endsection