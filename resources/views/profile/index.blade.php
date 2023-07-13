@extends('layouts.dashboard')

@section('title')Profile @endsection

@section('content')
    <div class="row p-5" style="padding-bottom: 10rem;">
    <div class="col-lg-5 col-md-12 bio">
        <img src={{ asset('assets/images/user.png') }} style="width: 100px; margin-bottom: 2rem;" />

        <form class="d-flex flex-column  gap-3">
            <div class="details">
                <div class="form-group w-100">
                    <label for="" class="mb-2">First Name</label>
                    <input type="text" class="form-control" value="Jane" style="opacity: .6;" />
                </div>

                <div class="form-group w-100">
                    <label for="" class="mb-2">Last Name</label>
                    <input type="text" class="form-control" value="Doe"  style="opacity: .6;"/>
                </div>
            </div>

            <div class="details">
                <div class="form-group w-100">
                    <label for="" class="mb-2">Email</label>
                    <input type="text" class="form-control" value="doe@gmail.com" style="opacity: .6;" />
                </div>

                <div class="form-group w-100">
                    <label for="" class="mb-2">Phone</label>
                    <input type="tel" class="form-control" value="0734576832"  style="opacity: .6;"/>
                </div>
            </div>
            <div class="form-group" style="margin-top: .5rem;">
                <button class="btn btn-success btn-sm" style="width: fit-content;">Update Details</button>
            </div>
        </form>
    </div>

    <div class="col-lg-4 col-md-1"></div>

        <div class="col-lg-3 col-md-12 d-flex flex-column password" style="right: 3rem; top: 5.5rem;">
            <img src={{ asset('assets/images/password.png') }} style="width: 100px; margin-bottom: 2rem;" />
            <form class="d-flex flex-column gap-3 w-100">
                <div class="form-group w-100">
                    <label for="" class="mb-2">New Password<span class="text-danger">*</span></label>
                    <input type="password" class="form-control" style="opacity: .6;" />
                </div>

                <div class="form-group w-100">
                    <label for="" class="mb-2">Confirm Password<span class="text-danger">*</span></label>
                    <input type="password" class="form-control"  style="opacity: .6;"/>
                </div>
                <div class="form-group" style="margin-top: .5rem;">
                    <button class="btn btn-primary btn-sm">Change password</button>
                </div>
            </form>
        </div>
    </div>
@endsection