<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projects Hub | Sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/form.css') }}">
</head>
<body style="background-color: #FCFCFC;">

    <div class="container d-flex justify-content-center align-items-center w-100" style="max-width: 768px; height: 100vh;">
        <div class="bg-white shadow-lg rounded-3 px-5" style="padding-top: 2rem; padding-bottom: 2rem;">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <img src="{{ asset('assets/images/logo.jpeg') }}" class="rounded-3 mb-2" style="width: 70px;" />
                <h3 class="mb-2 pb-1" style="border-bottom: 1px solid #eeeeee;">Sign Up</h3>
            </div>
            <form method="post" action="/students" class="d-flex flex-column gap-3 justify-content-center align-items-center">
                @csrf
                <div class="d-flex justify-content-between gap-5 w-100">
                    <div class="form-group w-100">
                        <label class="control-label font-weight-bold mb-2">First Name<span class="text-danger">*</span></label>
                        <input type="text" class="custom-input w-100" value="{{ old('firstName') }}" name="firstName" placeholder="Jane" required />
                        {{-- @if(Session::has('error'))
                            <span class="text-danger">{{ Session::get('error') }}</span>
                        @endif --}}

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <span class="text-danger">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group w-100">
                        <label class="control-label font-weight-bold mb-2">Last Name<span class="text-danger">*</span></label>
                        <input type="text" class="custom-input w-100" value="{{ old('lastName') }}" name="lastName" placeholder="Doe" required />
                    </div>
                </div>
    
                <div class="d-flex justify-content-between gap-5 w-100">
                    <div class="form-group w-100">
                        <label class="control-label font-weight-bold mb-2">Course<span class="text-danger">*</span></label>
                        <select class="form-select" name="course" value="{{ old('course') }}" aria-label="Courses" style="opacity: .7;">
                            <option selected>-- Select your Course of study</option>
                            <option value="BSc. IT">BSc. IT</option>
                            <option value="Computer Science">Computer Science</option>
                        </select>
                    </div>
                    <div class="form-group w-100">
                        <label class="control-label font-weight-bold mb-2">Registration No.<span class="text-danger">*</span></label>
                        <input type="text" class="custom-input w-100" name="regNo" value="{{ old('regNo') }}" minlength="10" placeholder="J31/5423/2019" required />
                    </div>
                </div>
    
                <div class="d-flex justify-content-between gap-5 w-100">
                    <div class="form-group w-100">
                        <label class="control-label font-weight-bold mb-2">Email<span class="text-danger">*</span></label>
                        <input type="email" class="custom-input w-100" name="email" value="{{ old('email') }}" placeholder="doe@gmail.com" required />
                    </div>
                    <div class="form-group w-100">
                        <label class="control-label font-weight-bold mb-2">Phone<span class="text-danger">*</span></label>
                        <input type="tel" class="custom-input w-100" name="phone" value="{{ old('phone') }}" placeholder="0712345678" required />
                    </div>
                </div>
    
                <div class="d-flex justify-content-between gap-5 w-100">
                    <div class="form-group w-100">
                        <label class="control-label font-weight-bold mb-2">Password<span class="text-danger">*</span></label>
                        <input type="password" class="custom-input w-100" minlength="8" value="{{ old('password') }}" name="password" placeholder="********" required />
                    </div>
                    <div class="form-group w-100">
                        <label class="control-label font-weight-bold mb-2">Confirm Password<span class="text-danger">*</span></label>
                        <input type="password" class="custom-input w-100" value="{{ old('confirmPassword') }}" minlength="8" name="confirmPassword" placeholder="********" required />
                    </div>
                </div>
    
                <div class="form-group w-100 mt-3">
                    <button class="btn btn-success w-100 mb-3">Sign up</button>
                    <div class="d-flex flex-column gap-1 justify-content-center text-center">
                        <span>OR</span>
                        <a href="/login">Login Here</a></span>
                    </div>
                </div>
                <span class="opacity-50">
                    &copy;Projects Hub <script>document.write(new Date().getFullYear())</script>
                </span>
            </form>
        </div>
    </div>
</body>
</html>