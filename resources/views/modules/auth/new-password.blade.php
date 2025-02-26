@extends('modules.auth.layout')

@section('title', 'New Password')

@section('content')
    <div class="d-flex flex-column flex-column-fluid flex-lg-row">
        <div class="d-flex flex-column-fluid p-6 p-lg-20 justify-content-center">
            <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-500px p-5">
                <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10">
                    <form class="form w-100" novalidate="novalidate" action="#">
                        <div class="mb-11">
                            <h1 class="text-gray-900 fw-bolder mb-3 fs-1">New Password,</h1>
                            <p>Please add your new password.</p>
                        </div>
                        <div class="fv-row mb-8">
                            <input type="password" placeholder="New password" name="password" autocomplete="off" class="form-control bg-transparent" />
                        </div>
                        <div class="fv-row mb-8">
                            <input type="password" placeholder="Repeat password" name="new_password" autocomplete="off" class="form-control bg-transparent" />
                        </div>
                        <div class="alert alert-success">
                            Your password has been updated successfully.
                        </div>
                        <!--begin::Actions-->
                        <div class="d-grid mb-10">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                <span class="indicator-label">Continue</span>
                                <span class="indicator-progress">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>

                        <!--end::Actions-->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection