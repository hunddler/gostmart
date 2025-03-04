@extends('layout.layout')

@section('title', $CustomerDetail->name)

@section('breadcrum')
@include('modules.customers.detail.customer-breadcrumb')

@endsection

@section('content')
    <div class="card mb-5 mb-xl-10">
        @include('modules.customers.detail.customer-detail')


</div>
<div class="row g-xxl-9">
    <div class="col-md-12">
        <form id="kt_account_profile_details_form" method="POST" class="form" action="{{ url('admin/updatecustomersettings') }}" enctype="multipart/form-data">
         @csrf
        <input type="hidden" name="id" value="{{ $CustomerDetail->id }}">
        <div class="card-body border-top p-9">
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
            <div class="col-lg-8">
                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
                    <div class="image-input-wrapper w-150px h-150px"
                    style="background-image: url('{{ $CustomerDetail->image ? asset('public/assets/customer/' . $CustomerDetail->image) : asset('path/to/default/image.jpg') }}');">
                </div>
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="ki-outline ki-pencil fs-7"></i>
                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                        <input type="hidden" name="avatar_remove" />
                    </label>
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                        <i class="ki-outline ki-cross fs-2"></i>
                    </span>
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                        <i class="ki-outline ki-cross fs-2"></i>
                    </span>
                </div>
                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
            </div>
        </div>
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12 fv-row">
                        <input type="text" value="{{$CustomerDetail->name}}" name="customer_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Full name" />
                    </div>

                </div>
            </div>
        </div>

        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                <span class="required">Contact Phone</span>
                <span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                </span>
            </label>
            <div class="col-lg-8 fv-row">
                <input type="tel" value="{{$CustomerDetail->phone}}" name="phone_number" class="form-control form-control-lg form-control-solid" placeholder="Phone number"  />
            </div>
        </div>

    </div>
    <div class="card-footer d-flex justify-content-end py-6 px-9">
        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
    </div>
</form>


@endsection
