@extends('layouts.dashboard')

@section('title')Students @endsection

@section('content')
<div class="d-flex justify-content-between align-items-center gap-2 mb-3">
    <h3>Students System Analysis</h3>
</div>
    <div class="mt-3 table-responsive text-nowrap fs-6 fw-normal text-start">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Registration No.</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>
                            {{ $student->reg_no }}
                        </td>
                        <td>
                            {{ $student->first_name }} {{ $student->last_name }} 
                        </td>
                        <td>
                            {{ $student->course }}
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm"
                                data-bs-toggle="modal" data-bs-target="#viewPaperModal-{{ $student->id }}"
                            >
                                <i class="fas fa-eye"></i> View
                            </button>
                        </td>
                    </tr>

                    <div class="modal fade" id="viewPaperModal-{{ $student->id }}" tabindex="-1" aria-labelledby="viewPaperModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="updatePaperModal">{{ $student->first_name}} {{ $student->last_name}} Analysis</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="padding: 2rem 1rem;">
                                    @if($student->analysis)
                                        <div class="d-flex flex-column gap-4">
                                            <div>
                                                @if($student->analysis->status === 'Approved')
                                                    <span class="badge bg-success py-2 px-3"><i class="fas fa-check-circle" style="margin-right: .3rem;"></i> {{ $student->analysis->status }}</span>
                                                @elseif($student->analysis->status === 'Rejected')
                                                    <span class="badge bg-danger py-2 px-3"><i class="fas fa-close" style="margin-right: .3rem;"></i> {{ $student->analysis->status }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="mb-3" style="font-weight: 400;">Title</label>
                                                <input type="text" name="title" class="form-control custom-input" value="{{ $student->analysis->title }}" required readonly />
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="mb-3" style="font-weight: 400;">Description</label>
                                                <textarea name="description" class="form-control custom-input" rows="4" required readonly>{{ $student->analysis->description }}</textarea>
                                            </div>

                                            <div class="d-flex flex-column gap-2">
                                                <img src="{{ asset('assets/images/pdf.png') }}" style="width: 40px; margn-bottom: 0;" />
                                                <a href="/storage/{{ $student->proposal->file }}" target="_blank" class="text-decoration-underline mt-0">Documentation</a>
                                            </div>
                                        </div>

                                        @if($student->analysis->status === 'Pending')                                       
                                            <form action="/mark-analysis/{{ $student->analysis->id }}" method="post">
                                                @csrf
                                                <div class="shadow-t-5" style="border-top: 1px solid #e7e7e7; margin: 3rem 0; padding-top: 2rem;">
                                                    <div class="form-group" >
                                                        <label for="" class="mb-3" style="font-weight: 400;">Remarks<span class="text-danger">*</span></label>
                                                        <textarea name="remarks" class="form-control" rows="6" required placeholder="Your remarks here..."></textarea>
                                                    </div>

                                                    <div class="d-flex justify-content-between gap-5 mt-4">
                                                        <div class="form-group w-100">
                                                            <label class="control-label font-weight-bold mb-2">Status<span class="text-danger">*</span></label>
                                                            <select class="form-select" name="status" aria-label="Status" style="opacity: .7;" required>
                                                                <option>-- Status --</option>
                                                                <option value="Approved">Approve</option>
                                                                <option value="Rejected">Reject</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group w-100">
                                                            <label class="control-label font-weight-bold mb-2">Marks</label>
                                                            <input type="number" class="form-control" name="marks" min="0" max="30" placeholder="Out of 30" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-top: 2rem;">
                                                        <button class="btn btn-success">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        @endif
                                    @else 
                                    <span class="badge bg-primary px-3 py-2">Not submitted</span>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection