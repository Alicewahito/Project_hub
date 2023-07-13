@extends('layouts.dashboard')

@section('title')Tasks @endsection

@section('content')
<div class="d-flex justify-content-between align-items-center gap-2 mb-3">
    <h3>Tasks</h3>
    <button class="btn btn-primary btn-sm"
    data-bs-toggle="modal" data-bs-target="#addTaskModal"
    >Add Task</button>
</div>
<div class="tasks">
    @foreach($tasks as $task)
        <div class="card border-0 shadow-none rounded-3">
            <div class="card-body">
            <div class="px-3 py-2">
                <h4 style="font-size: 1.1rem;">{{ $task->title }}</h4>
                <div class="d-flex justify-content-between align-items-center gap-2">
                    <span class="opacity-50" style="font-size: .8rem;">Start: {{ $task->start_date }}</span>
                    <span class="opacity-50" style="font-size: .8rem;">End: {{ $task->end_date }}</span>
                </div>
            
                <p class="mt-3 description" style="color: #9BA4B5;">
                {{ $task->description }}
                </p>
            </div>
            <div class="d-flex gap-3 align-items-center justify-content-between px-2">
                <div class="d-flex gap-3 align-items-center">
                    <button
                    class="btn btn-success btn-sm d-flex align-items-center"
                    data-bs-toggle="modal" data-bs-target="#updateTaskModal"
                    >
                    <i class="fas fa-edit"></i>
                    </button>
                    <form method="post" action="/tasks/{{ $task->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center" onclick="return confirm('Delete this item?')">
                        <i class="fas fa-trash"></i>
                        </button>
                    </form> 
                </div>
                <button class="btn btn-outline-primary btn-sm" style="font-size: .75rem;">Details</button>
            </div>
            </div>


        <!-- Edit Modal -->
        <div class="modal fade" id="updateTaskModal" tabindex="-1" aria-labelledby="updateTaskModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="updateTaskModal">Update Task</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="d-flex flex-column gap-3 py-2" action="/tasks/{{ $task->id }}" method="post" >
                            @csrf
                            <div class="form-group">
                                <label for="title" class="control-label font-weight-bold mb-2">Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ $task->title }}" name="title" required />
                            </div>
                            <div class="form-group">
                                <label for="description" class="control-label font-weight-bold mb-2">Description<span class="text-danger">*</span></label>
                                <textarea rows="5" class="form-control" value="{{ $task->description }}" name="description">{{ $task->description }}</textarea>
                            </div>

                            <div class="d-flex justify-content-between gap-3 align-item-center">
                                <div class="form-group w-100">
                                    <label class="control-label mb-2">Start Date<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control w-100" value="{{ $task->start_date }}" name="startDate" />
                                </div>
                                <div class="form-group w-100">
                                    <label class="control-label mb-2">End Date<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control w-100" value="{{ $task->end_date }}" name="endDate" />
                                </div>
                            </div>

                            <div class="form-group d-flex align-items-center gap-2 mt-3">
                                <button class="btn btn-success" type="submit">Update</button>
                                <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

    @endforeach
</div>

<!-- Add Modal -->
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addTakModal">New Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="d-flex flex-column gap-3 py-2" method="post" action="/tasks">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="control-label font-weight-bold mb-2">Title<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" required />
                    </div>
                    <div class="form-group">
                        <label for="description" class="control-label font-weight-bold mb-2">Description<span class="text-danger">*</span></label>
                        <textarea rows="5" class="form-control" name="description"></textarea>
                    </div>

                    <div class="d-flex justify-content-between gap-3 align-item-center">
                        <div class="form-group w-100">
                            <label class="control-label mb-2">Start Date<span class="text-danger">*</span></label>
                            <input type="date" class="form-control w-100" name="startDate" />
                        </div>
                        <div class="form-group w-100">
                            <label class="control-label mb-2">End Date<span class="text-danger">*</span></label>
                            <input type="date" class="form-control w-100" name="endDate" />
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-center gap-2 mt-3">
                        <button class="btn btn-success" type="submit">Submit</button>
                        <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection