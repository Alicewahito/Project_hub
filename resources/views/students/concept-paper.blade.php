@extends('layouts.dashboard')

@section('content')
    <div class="p-4 position-relative">

        @if(!$paper)
            <img src={{ asset('assets/images/task.png') }} class="page-icon" />
        @endif

        @if($paper)
                <div class="paper-container">
                    <div class="d-flex flex-column gap-4 pb-5">
                        <div class="form-group">
                            <label for="" class="mb-3" style="font-weight: 400;">Title</label>
                            <input type="text" name="title" class="form-control custom-input" value="{{ $paper->title }}" readonly />
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-3" style="font-weight: 400;">Description</label>
                            <textarea name="description" class="form-control p-3 custom-input" rows="5" readonly>
                            {{ $paper->problem_description }}
                            </textarea>
                        </div>
                        
                        <div class="d-flex justify-content-between gap-5">
                            <div class="form-group w-100">
                                <label for="" class="mb-3" style="font-weight: 400;">Proposed Solution</label>
                                <input type="text" name="solution" class="form-control custom-input" value="{{ $paper->proposed_solution }}" readonly />
                            </div>
                            <div class="form-group w-100">
                                <label for="" class="mb-3" style="font-weight: 400;">Tools</label>
                                <input type="text" name="tools" class="form-control custom-input" value="{{ $paper->tools }}" readonly />
                        </div>
                    </div>
                </div>

                @if($paper->status === 'Pending')
                <div>
                    <span class="badge text-bg-primary py-2 px-3">Your submission is under review</span>
                </div>
                @endif

                @if($paper->status !== 'Pending')
                    <div class="">
                        <div class="form-group">
                            <label for="" class="mb-3" style="font-weight: 400;">Remarks</label>
                            <textarea name="description" class="form-control custom-input" rows="10" readonly>{{ $paper->remarks }}</textarea>
                        </div>
                        <div class="form-group mt-4 d-flex align-items-center gap-3">
                            <label for="" class="font-weight-bold">Status</label>
                            <span class="badge rounded-2 text-bg-primary py-2 px-3">{{ $paper->status }}</span>
                        </div>

                        @if($paper->status === 'Rejected')
                            <div class="form-group mt-5">
                                <button class="btn btn-success btn-sm"
                                data-bs-toggle="modal" data-bs-target="#updatePaperModal"
                                >Submit Correction</button>
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            @else
                <div class="col-lg-6 col-md-12">
                    <div class="mb-4">
                        <h4 class="m-0">Concept Paper</h4>
                        <p style="opacity: .8;">Submit your concept paper details</p>
                    </div>
                    <form action="/students/concept-paper" method="post" class="d-flex flex-column gap-4 pb-5">
                        @csrf

                        <div class="form-group">
                            <label for="" class="mb-3" style="font-weight: 400;">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Project title" required />
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-3" style="font-weight: 400;">Description</label>
                            <textarea name="description" class="form-control" rows="5" placeholder="Project description & justification...." required></textarea>
                        </div>
                        
                        <div class="d-flex justify-content-between gap-5">
                            <div class="form-group w-100">
                                <label for="" class="mb-3" style="font-weight: 400;">Proposed Solution</label>
                                <input type="text" name="solution" class="form-control" placeholder="Proposed solution" required />
                            </div>
                            <div class="form-group w-100">
                                <label for="" class="mb-3" style="font-weight: 400;">Tools</label>
                                <input type="text" name="tools" class="form-control" placeholder="Proposed tools for solution" required />
                            </div>

                        </div>

                        <div class="form-group mt-2">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
        @endif

        @if($paper)
        <div class="modal fade" id="updatePaperModal" tabindex="-1" aria-labelledby="updatePaperModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="updatePaperModal">Make Corrections</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/students/concept-paper/{{ $paper->id }}" method="post" class="d-flex flex-column gap-4 pb-3">
                            @csrf
    
                            <div class="form-group">
                                <label for="" class="mb-3" style="font-weight: 400;">Title</label>
                                <input type="text" name="title" class="form-control custom-input" value="{{ $paper->title }}" required />
                            </div>
                            <div class="form-group">
                                <label for="" class="mb-3" style="font-weight: 400;">Description</label>
                                <textarea name="description" class="form-control custom-input" rows="5" required>{{ $paper->problem_description }}</textarea>
                            </div>

                            <input type="hidden" value="Pending" name="status" />
                            <input type="hidden" value="" name="remarks" />
                            
                            <div class="d-flex justify-content-between gap-5">
                                <div class="form-group w-100">
                                    <label for="" class="mb-3" style="font-weight: 400;">Proposed Solution</label>
                                    <input type="text" name="solution" class="form-control custom-input" value="{{ $paper->proposed_solution }}" required />
                                </div>
                                <div class="form-group w-100">
                                    <label for="" class="mb-3" style="font-weight: 400;">Tools</label>
                                    <input type="text" name="tools" class="form-control custom-input" value="{{ $paper->tools }}" required />
                                </div>
    
                            </div>
    
                            <div class="form-group mt-2">
                                <button class="btn btn-success" type="submit">Submit Correction</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection