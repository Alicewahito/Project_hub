@extends('layouts.dashboard')

@section('title')Dashboard @endsection

@section('content')
@if(Auth::user()->role === 'ROLE_COORDINATOR')
    <div class="row">
        <div class="col-md-6 col-lg-4 col-xl-4 col-sm-12 mb-4">
            <div class="card border pt-2 stat" style="background-color: #4977e6;">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase mb-3 d-flex justify-content-between align-items-center">
                                <span class="sub-text text-white">Tasks</span>
                                <span class="col-auto icon">
                                    <i class="fas fa-tasks text-white opacity-50"></i>
                                </span>
                            </div>
                            <div class="text-white fw-bold mb-0">
                                <h2>{{ $total_tasks }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer pt-3 border-0">
                    <p class="py-1 sub-text">
                        <a
                            href="/tasks"
                            class="d-flex align-items-center gap-2 text-white opacity-75"
                        >
                            All Tasks
                            <i class="fas fa-arrow-right-long"></i>
                        </a>
                    </p>
                </div>
            </div>        
        </div>

        <div class="col-md-6 col-lg-4 col-xl-4 col-sm-12 mb-4">
            <div class="card border pt-2 stat" style="background-color: #14a44d;">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase mb-3 d-flex justify-content-between align-items-center">
                                <span class="sub-text text-white">Lecturers</span>
                                <span class="col-auto icon">
                                    <i class="fas fa-chalkboard-user text-white opacity-50"></i>
                                </span>
                            </div>
                            <div class="text-white fw-bold mb-0">
                                <h2>{{ $total_lecturers }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer pt-3 border-0">
                    <p class="py-1 sub-text">
                        <a
                            href="/lecturers"
                            class="d-flex align-items-center gap-2 text-white opacity-75"
                        >
                            All Lecturers
                            <i class="fas fa-arrow-right-long"></i>
                        </a>
                    </p>
                </div>
            </div>        
        </div>

        <div class="col-md-6 col-lg-4 col-xl-4 col-sm-12 mb-4">
            <div class="card border pt-2 stat" style="background-color: #f3a225;">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase mb-3 d-flex justify-content-between align-items-center">
                                <span class="sub-text text-white">Students</span>
                                <span class="col-auto icon">
                                    <i class="fas fa-graduation-cap text-white opacity-50"></i>
                                </span>
                            </div>
                            <div class="text-white fw-bold mb-0">
                                <h2>{{ $total_students }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer pt-3 border-0">
                    <p class="py-1 sub-text text-white">
                        <a
                            href="/students"
                            class="d-flex align-items-center gap-2 text-white opacity-75"
                        >
                            All Students
                            <i class="fas fa-arrow-right-long"></i>
                        </a>
                    </p>
                </div>
            </div>        
        </div>
    </div>
    @endif

    @if(Auth::user()->role === 'ROLE_STUDENT')
        <div class="student-dashboard">
            @foreach($tasks as $task)
                    <div class="card border-0 shadow-sm pt-2" style="background-color: #fbfbfd;">
                        <div class="card-body py-1">
                            <div class="align-items-center no-gutters">
                                <div class="text-uppercase d-flex justify-content-between align-items-center">
                                    <h5 class="text-dark">{{ $task->title }}</h5>
                                </div>
                                <div class="col me-2">
                                    <div class="mb-0 d-flex justify-content-between align-items-center" style="gap: 3rem;">
                                        <div class="">
                                            <p class="flex-1" style="opacity: .8; font-size: .95rem;">{{ $task->description }}</p>
                                            <button class="btn btn-primary">Ongoing</button>
                                        </div>
                                        <img src="{{ asset('assets/images/task.png') }}" style="width: 200px; transform: rotate(20deg)" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer pt-3 pb-3 border-0" style="background-color: #f8f8f8;">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span
                                    class="d-flex gap-2 opacity-75"
                                    style="font-size: .8rem;"
                                >
                                <i class="fas fa-calendar-alt" style="padding-top: .1rem;"></i>
                                Start: {{ $task->start_date }}
                                </span>

                                <span
                                class="d-flex gap-2 opacity-75"
                                style="font-size: .8rem;"
                            >
                            <i class="fas fa-calendar-alt" style="padding-top: .1rem;"></i>
                            End {{ $task->end_date }}
                            </span>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>
    @endif

@endsection