@extends('modules.auth.layout')

@section('title', 'Forgot Password')

@section('content')
    <div class="d-flex flex-column flex-column-fluid flex-lg-row">
        <div class="d-flex flex-column-fluid p-6 p-lg-20 justify-content-center">
            <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-500px p-5">
                <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10">
                    <form class="form w-100" novalidate="novalidate" action="#">
                        <div class="mb-11">
                            <h1 class="text-gray-900 fw-bolder mb-3 fs-1">Forgot Password,</h1>
                            <p>Please enter your registered email address to get a reset link.</p>
                        </div>
                        <div class="fv-row mb-8">
                            <input type="email" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" />
                        </div>
                        <div class="alert alert-warning">
                            A password reset link has been sent to your email. <a href="#">Resend</a>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                            <button type="button" id="kt_password_reset_submit" class="btn btn-primary me-4">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">Submit</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">Please wait... 
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <!--end::Indicator progress-->
                            </button>
                            <a href="{{url('/')}}" class="btn btn-light">Cancel</a>
                        </div>

                        <!--end::Actions-->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection