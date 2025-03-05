@extends('layout.layout')

@section('title', 'Account Setting')

@section('content')

@if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::has('message'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    @error('password_confirmation')
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">

                {{ $message }}
            </div>
        </div>
    @enderror

    @error('password')
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">

                {{ $message }}
            </div>
        </div>
    @enderror
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Profile Details</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
            <form id="kt_account_profile_details_form" method="POST" class="form" action="{{url('update-profile')}}" enctype="multipart/form-data">
               @csrf
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Image input-->
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('public/assets/media/svg/avatars/blank.svg')">
                                <!--begin::Preview existing avatar-->
                                @if(auth::user()->image)
                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ asset('public/assets/customer/'.auth::user()->image) }}');"></div>
                                @else
                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ asset('public/assets/media/avatars/blank.png') }}');"></div>

                                @endif
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="ki-outline ki-pencil fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki-outline ki-cross fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="ki-outline ki-cross fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Hint-->
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            <!--end::Hint-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-12 fv-row">
                                    <input type="text" value="{{auth::user()->name}}" name="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Full name" />
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->

                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->

                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                            <span class="required">Contact Phone</span>
                            <span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
                                <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="tel" value="{{auth::user()->phone}}" name="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="" />
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->

                    <!--end::Input group-->
                    <!--begin::Input group-->

                    <!--end::Input group-->
                    <!--begin::Input group-->

                    <!--begin::Input group-->

                    <!--end::Input group-->

                    <!--begin::Input group-->


                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>
    <div class="card mb-5 mb-xl-10 px-3">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">security</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <form id="kt_signin_change_password" method="POST" class="form"action="{{url('update-password')}}"  novalidate="novalidate">
            @csrf
            <div class="row mb-1">
                <div class="col-lg-6">
                    <div class="fv-row mb-0">
                        <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Current Password</label>
                        <input type="password" required class="form-control form-control-lg form-control-solid" name="old_password" id="currentpassword" />
                    </div>
                </div>
                </div>
                <div class="row mb-1">
                <div class="col-lg-6">
                    <div class="fv-row mb-0">
                        <label for="newpassword" class="form-label fs-6 fw-bold mb-3">New Password</label>
                        <input type="password" required class="form-control form-control-lg form-control-solid" name="password" id="newpassword" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="fv-row mb-0">
                        <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Confirm New Password</label>
                        <input type="password" required class="form-control form-control-lg form-control-solid" name="password_confirmation" id="confirmpassword" />
                    </div>
                </div>
            </div>
            <div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>
            <div class="d-flex">
                <button id="kt_password_submit" type="submit" class="btn btn-primary me-2 px-6">Update Password</button>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection
