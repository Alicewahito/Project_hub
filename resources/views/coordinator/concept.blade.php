@extends('layouts.dashboard')

@section('title')Students @endsection

@section('content')
<div class="d-flex justify-content-between align-items-center gap-2 mb-3">
    <h3>Students Papers</h3>
</div>
    <div class="mt-3 table-responsive text-nowrap fs-6 fw-normal text-start">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Registration No.</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Title</th>
                    {{-- <th>Description</th> --}}
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($papers as $paper)
                    <tr>
                        <td>
                            {{ $paper->student->reg_no }}
                        </td>
                        <td>
                            {{ $paper->student->first_name }} {{ $paper->student->last_name }} 
                        </td>
                        <td>
                            {{ $paper->student->course }}
                        </td>
                        <td>
                            {{ $paper->title }}
                        </td>
                        {{-- <td>
                            {{ $paper->problem_description }}
                        </td> --}}
                        <td>
                            {{ $paper->status }}
                        </td>
                        
                        <td>
                            <button class="btn btn-primary btn-sm"
                                data-bs-toggle="modal" data-bs-target="#updatePaperModal"
                            >
                                <i class="fas fa-eye"></i> Details
                            </button>
                        </td>
                    </tr>

                    <div class="modal fade" id="updatePaperModal" tabindex="-1" aria-labelledby="updatePaperModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="updatePaperModal">{{ $paper->student->first_name}} {{ $paper->student->last_name}} Concept Paper</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="padding-top: 2rem;">
                                    <div class="d-flex flex-column gap-4">
                                        <div class="form-group">
                                            <label for="" class="mb-3" style="font-weight: 400;">Title</label>
                                            <input type="text" name="title" class="form-control custom-input" value="{{ $paper->title }}" required readonly />
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="mb-3" style="font-weight: 400;">Description</label>
                                            <textarea name="description" class="form-control custom-input" rows="4" required readonly>{{ $paper->problem_description }}</textarea>
                                        </div>
                                        
                                        <div class="d-flex justify-content-between gap-5">
                                            <div class="form-group w-100">
                                                <label for="" class="mb-3" style="font-weight: 400;">Proposed Solution</label>
                                                <input type="text" name="solution" class="form-control custom-input" value="{{ $paper->proposed_solution }}" required readonly />
                                            </div>
                                            <div class="form-group w-100">
                                                <label for="" class="mb-3" style="font-weight: 400;">Tools</label>
                                                <input type="text" name="tools" class="form-control custom-input" value="{{ $paper->tools }}" required readonly />
                                            </div>
                                        </div>
                                    </div>

                                    <form action="/mark-concept-paper/{{ $paper->id }}" method="post">
                                        @csrf
                                        <div class="shadow-t-5" style="border-top: 1px solid #e7e7e7; margin: 3rem 0; padding-top: 2rem;">
                                            <div class="form-group" >
                                                <label for="" class="mb-3" style="font-weight: 400;">Remarks<span class="text-danger">*</span></label>
                                                <textarea name="remarks" class="form-control" rows="6" required placeholder="Your remarks here..."></textarea>
                                            </div>

                                            <div class="mt-4">
                                                <div class="form-group w-100">
                                                    <label class="control-label font-weight-bold mb-2">Status<span class="text-danger">*</span></label>
                                                    <select class="form-select" name="status" aria-label="Status" style="opacity: .7;" required>
                                                        <option>-- Status --</option>
                                                        <option value="Approved">Approve</option>
                                                        <option value="Rejected">Reject</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin-top: 2rem;">
                                                <button class="btn btn-success">Submit</button>
                                            </div>
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