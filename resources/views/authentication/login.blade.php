<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projects Hub | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/form.css') }}">
</head>
<body style="background-color: #FCFCFC;">

    <div class="container d-flex justify-content-center align-items-center w-100" style="max-width: 572px; height: 100vh;">
        <form action="/login" method="post" class="d-flex flex-column gap-3 justify-content-center align-items-center bg-white shadow-lg rounded-3 px-5 w-100" style="padding-top: 2rem; padding-bottom: 2rem;">
            @csrf
            <img src="{{ asset('assets/images/logo.jpeg') }}" class="rounded-3" style="height: 80px;" />
            <h3 class="mb-2 pb-1" style="border-bottom: 1px solid #eeeeee;">Welcome Back!</h3>
            <div class="d-flex flex-column gap-3 w-100">
                <div class="form-group w-100">
                    <label class="control-label font-weight-bold mb-2">Email<span class="text-danger">*</span></label>
                    <input type="email" class="custom-input w-100" name="email" placeholder="doe@gmail.com"
                        value="{{ old('email') }}" required />
                    @if(Session::has('error'))
                        <span class="text-danger">{{ Session::get('error') }}</span>
                    @endif
                </div>
                <div class="form-group w-100">
                    <label class="control-label font-weight-bold mb-2">Password<span class="text-danger">*</span></label>
                    <input type="password" class="custom-input w-100" name="password" placeholder="********" 
                        required value="{{ old('password') }}"
                    />
                </div>
               
            </div>

            <div class="form-group w-100 mt-3">
                <button class="btn btn-success w-100 mb-3" type="submit">Login<i class="fas fa-sign-in-alt opacity-75" style="margin-left: .3rem;"></i></button>
                <div class="d-flex flex-column gap-1 justify-content-center text-center">
                    <a href="/forgot-password">Forgot password?</a></span>
                    <span>OR</span>
                    <a href="/signup">Register Here</a></span>
                </div>
            </div>
            <span class="opacity-50">
                &copy;Projects Hub <script>document.write(new Date().getFullYear())</script>
            </span>
        </form>
    </div>
</body>
</html>