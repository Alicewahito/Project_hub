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
                    <div class="form-group d-flex gap-3 align-items-center">
                        <label for="" class="" style="font-weight: 400;">Document:</label>
                        <a href="/{{ $paper->file }}" class="text-decoration-underline" target="_blank">Document</a> 
                    </div>
                    <div class="form-group">
                        <label for="" class="mb-3" style="font-weight: 400;">Description</label>
                        <textarea name="description" class="form-control custom-input" rows="5" readonly>
                            {{ $paper->description }}
                        </textarea>
                    </div>
                    
                </div>

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
            </div>

            @else
                <div class="col-lg-6 col-md-12">
                    <div class="mb-4">
                        <h4 class="m-0">Proposal</h4>
                        <p style="opacity: .8;">Submit your proposal details</p>
                    </div>
                    <form action="/students/proposal" method="post" class="d-flex flex-column gap-4 pb-5" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="" class="mb-3" style="font-weight: 400;">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Project title" required />
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-3" style="font-weight: 400;">Upload file</label>
                            <input type="file" name="doc" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-3" style="font-weight: 400;">Description</label>
                            <textarea name="description" class="form-control" rows="5" placeholder="Proposal description...." required></textarea>
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
                        <form action="/students/proposal/{{ $paper->id }}" method="post" class="d-flex flex-column gap-4 pb-3" enctype="multipart/form-data">
                            @csrf
    
                            <div class="form-group">
                                <label for="" class="mb-3" style="font-weight: 400;">Title</label>
                                <input type="text" name="title" class="form-control custom-input" value="{{ $paper->title }}" required />
                            </div>

                            <div class="form-group w-100">
                                <label for="" class="mb-3" style="font-weight: 400;">Upload file</label>
                                <input type="file" name="doc" class="form-control custom-input mb-2" value="{{ $paper->tools }}" />
                                <a href="/{{ $paper->file }}" target="_blank">View Document</a>
                            </div>

                            <div class="form-group">
                                <label for="" class="mb-3" style="font-weight: 400;">Description</label>
                                <textarea name="description" class="form-control custom-input" rows="5" required>{{ $paper->description }}</textarea>
                            </div>        
                            <div class="form-group mt-2">
                                <button class="btn btn-success" type="submit">Submit Correction</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection