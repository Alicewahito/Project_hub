<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projects Hub | @yield('title')</title>
    <link rel="shortcut icon" href="{{asset('assets/images/logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <script src="//unpkg.com/alpinejs" defer></script>

</head>
<body>

{{--    <x-flash-message />--}}
    {{-- @include('components/flash-message') --}}
    <div class="wrapper">
        
        <!-- Sidebar -->
        <nav
        class="sidebar px-2 shadow-xs"
        style="width: 16rem;"
    >
        <div class="bg-white sticky-top pt-4 pb-2">
            <a to="/dashboard">
                <img src="{{ asset('assets/images/logo.jpeg') }}" width="70" />
            </a>
        </div>
        <div class="d-flex flex-column align-items-start justify-content-between gap-5 px-2">
            <div
                class="d-flex flex-column gap-2 w-100"
                style="margin-top: 1rem"
            >
            <h5 class="px-2" style="font-size: 1rem; opacity: .6;">MAIN MENU</h5>
                <a
                    href="/dashboard"
                    class="d-flex align-items-center gap-2 p-2 rounded menu-item"
                    data-toggle="tooltip"
                    data-placement="right"
                    title="Dashboard"
                >
                    <i class="fas fa-table-columns"></i>
                    <span>
                        Dashboard
                    </span>
                </a>       
                
                @if(Auth::user()->role === 'ROLE_STUDENT')
                <a
                    href="/students/concept-paper"
                    class="d-flex align-items-center gap-2 p-2 rounded menu-item"
                    data-toggle="tooltip"
                    data-placement="right"
                    title="Concept Paper"
                    >
                        <i class="fas fa-book"></i>
                        <span>
                            Concept Paper
                        </span>
                    </a>

                    <a
                    href="/students/proposal"
                    class="d-flex align-items-center gap-2 p-2 rounded menu-item"
                    data-toggle="tooltip"
                    data-placement="right"
                    title="Tasks"
                    >
                        <i class="fas fa-tasks"></i>
                        <span>
                            Proposal
                        </span>
                    </a>

                    <a
                    href="/students/system-analysis"
                    class="d-flex align-items-center gap-2 p-2 rounded menu-item"
                    data-toggle="tooltip"
                    data-placement="right"
                    title="System Analysis"
                    >
                        <i class="fas fa-bar-chart"></i>
                        <span>
                            System Analysis
                        </span>
                    </a>

                    <a
                    href="/students/system-design"
                    class="d-flex align-items-center gap-2 p-2 rounded menu-item"
                    data-toggle="tooltip"
                    data-placement="right"
                    title="System Design"
                    >
                        <i class="fas fa-server"></i>
                        <span>
                            System Design
                        </span>
                    </a>

                    <a
                    href="/students/implementation"
                    class="d-flex align-items-center gap-2 p-2 rounded menu-item"
                    data-toggle="tooltip"
                    data-placement="right"
                    title="System Implementation"
                    >
                        <i class="fas fa-code"></i>
                        <span>
                            Implementation
                        </span>
                    </a>
                    @endif
                
                    @if(Auth::user()->role === 'ROLE_COORDINATOR')
                    <a
                    href="/tasks"
                    class="d-flex align-items-center gap-2 p-2 rounded menu-item"
                    data-toggle="tooltip"
                    data-placement="right"
                    title="Tasks"
                    >
                        <i class="fas fa-tasks"></i>
                        <span>
                            Tasks
                        </span>
                    </a>
                    <a
                            href="/all-concept-papers"
                            class="d-flex align-items-center gap-2 p-2 rounded menu-item"
                            data-toggle="tooltip"
                            data-placement="right"
                            title="Concept Paper"
                            >
                                <i class="fas fa-book"></i>
                                <span>
                                    Concept Papers
                                </span>
                        </a>
                        <a
                            href="/lecturers"
                            class="d-flex align-items-center gap-2 p-2 rounded menu-item"
                            data-toggle="tooltip"
                            data-placement="right"
                            title="Lecturers"
                        >
                            <i class="fas fa-chalkboard-user"></i>
                            <span>
                                Lecturers
                            </span>
                        </a>
                        <a
                            href="/students"
                            class="d-flex align-items-center gap-2 p-2 rounded menu-item"
                            data-toggle="tooltip"
                            data-placement="right"
                            title="Students"
                        >
                            <i class="fas fa-graduation-cap"></i>
                            <span>
                                Students
                            </span>
                        </a>
                        <a
                                href="/reports"
                                class="d-flex align-items-center gap-2 p-2 rounded menu-item"
                                data-toggle="tooltip"
                                data-placement="right"
                                title="Reports"
                            >
                                <i class="fas fa-bar-chart"></i>
                                <span>
                                    Reports
                                </span>
                            </a>
                        @endif

                    @if(Auth::user()->role === 'ROLE_LECTURER')
                        <a
                            href="/my-students"
                            class="d-flex align-items-center gap-2 p-2 rounded menu-item"
                            data-toggle="tooltip"
                            data-placement="right"
                            title="Students"
                        >
                            <i class="fas fa-graduation-cap"></i>
                            <span>
                                My Students
                            </span>
                        </a>
                    <a
                    href="/my-students-proposal"
                    class="d-flex align-items-center gap-2 p-2 rounded menu-item"
                    data-toggle="tooltip"
                    data-placement="right"
                    title="Tasks"
                    >
                        <i class="fas fa-tasks"></i>
                        <span>
                            Proposal
                        </span>
                    </a>

                    <a
                    href="/my-students-system-analysis"
                    class="d-flex align-items-center gap-2 p-2 rounded menu-item"
                    data-toggle="tooltip"
                    data-placement="right"
                    title="System Analysis"
                    >
                        <i class="fas fa-bar-chart"></i>
                        <span>
                            System Analysis
                        </span>
                    </a>

                    <a
                    href="/my-students-system-design"
                    class="d-flex align-items-center gap-2 p-2 rounded menu-item"
                    data-toggle="tooltip"
                    data-placement="right"
                    title="System Design"
                    >
                        <i class="fas fa-server"></i>
                        <span>
                            System Design
                        </span>
                    </a>

                    <a
                    href="/my-students-implementation"
                    class="d-flex align-items-center gap-2 p-2 rounded menu-item"
                    data-toggle="tooltip"
                    data-placement="right"
                    title="System Implementation"
                    >
                        <i class="fas fa-code"></i>
                        <span>
                            Implementation
                        </span>
                    </a>
                    @endif
            </div>

            <div class="w-100 position-absolute" style="bottom: 5rem;">
                <h5 class="px-2" style="font-size: 1rem; opacity: .6;">SETTINGS</h5>

                <a
                href="/profile"
                class="d-flex align-items-center gap-2 p-2 rounded menu-item w-75 mb-3 opacity-80"
                data-toggle="tooltip"
                data-placement="right"
                title="Profile"
            >
                <i class="fas fa-user"></i>
                <span>
                    Profile
                </span>
            </a>
            </div>
            
        </div>
    </nav>

        <div class="content"
        >
            
            <!-- Header -->
            <header
            class="bg-white header d-flex justify-content-between align-items-center gap-3 shadow-xs"
            style="padding-left: 17rem"
        >
            <i class="fas fa-close"></i>

            <div class="d-flex align-items-center gap-4">
                <i class="fas fa-bell opacity-60"></i>

                <div
                    class="dropdown user"
                    id="userMenu"
                    data-bs-toggle="dropdown"
                >
                    <div class="d-flex align-items-center gap-2">
                        <img src={{ asset('assets/images/user.jpg') }} alt="">
                        <div class="d-flex gap-2 align-items-center">
                            <i class="fas fa-user-circle opacity-50" style="font-size: 2.2rem;"></i>
                            <span>{{ Auth::user()->name}}</span>
                        </div>
                        <i class="fas fa-chevron-down" style="font-size: .8rem;"></i>
                    </div>
                    <ul
                        class="dropdown-menu shadow border-0 mt-3"
                        aria-labelledby="userMenu"
                        id="menu-main"

                    >
                                <li>
                            <a href="/profile"
                                class="dropdown-item d-flex align-items-center gap-1"
                            >
                                <i class="fas fa-user"></i> Profile
                            </a>
                        </li>
                        
                        <li>
                            <a href="/logout"
                                class="dropdown-item d-flex align-items-center gap-1"
                            >
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

            <div
                class="content-wrapper bg-white rounded-2 shadow-sm p-4"
                style="margin-left: 17rem; position: relative;"
            >
            @include('components/flash-message')

            @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/js/dropdown.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>