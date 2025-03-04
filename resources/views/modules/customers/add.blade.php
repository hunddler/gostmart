@extends('layout.layout')

@section('title', 'Add Customer')

@section('breadcrum')
    <div id="kt_app_toolbar" class="app-toolbar pt-6 pb-2">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">Add
                        Customer</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('/dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('/customers') }}" class="text-muted text-hover-primary">Customers</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Add Customer</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')

    @if (session()->has('success'))
        <div class='row'>
            <div class='col-md-12'>
                <div class='alert alert-success'> {{ session()->get('success') }} </div>
            </div>
        </div>
    @endif

    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row" method="POST"
        action="{{ url('admin/addcustomer') }}" enctype="multipart/form-data">
        @csrf
        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-400px mb-7 me-lg-10">
            <div class="card card-flush py-4">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Customer Image</h2>
                    </div>
                </div>
                <div class="card-body text-center pt-0">
                    <style>
                        .image-input-placeholder {
                            background-image: url('{{ asset('public/assets/media/svg/files/blank-image.svg') }}');
                        }

                        [data-bs-theme="dark"] .image-input-placeholder {
                            background-image: url('{{ asset('public/assets/media/svg/files/blank-image-dark.svg') }}');
                        }
                    </style>
                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                        data-kt-image-input="true">
                        <div class="image-input-wrapper w-150px h-150px"></div>
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                            <i class="ki-outline ki-pencil fs-7"></i>
                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                            <input type="hidden" name="avatar_remove" />
                        </label>
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                            <i class="ki-outline ki-cross fs-2"></i>
                        </span>
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                            <i class="ki-outline ki-cross fs-2"></i>
                        </span>
                    </div>
                    <div class="text-muted fs-7">Set the category thumbnail image. Only *.png, *.jpg and *.jpeg image files
                        are accepted</div>
                </div>
            </div>
            <div class="card card-flush py-4">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Status</h2>
                    </div>
                    <div class="card-toolbar">
                        <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <select class="form-select mb-2" name="status" data-control="select2" data-hide-search="true"
                        data-placeholder="Select an option" id="kt_ecommerce_add_category_status_select">
                        <option></option>
                        <option value="Active" selected="selected">Active</option>
                        <option value="In-Active">In-Active</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
            <div class="card card-flush py-4">
                <div class="card-header">
                    <div class="card-title">
                        <h2>General</h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-5 fv-row">
                                <label class="required form-label">Customer Name</label>
                                <input type="text" required name="customer_name" class="form-control mb-2" placeholder=""
                                    value="" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-5 fv-row">
                                <label class="required form-label">Guaranteed Person</label>
                                <input type="text" name="Guaranteed_person" class="form-control mb-2" required
                                    value="" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-5 fv-row">
                                <label class="required form-label">Phone number</label>
                                <input type="text" name="phone_number" class="form-control mb-2" required
                                    value="" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-5 fv-row">
                                <label class="required form-label">Complete Address</label>
                                <input type="text" name="complete_address" class="form-control mb-2" required
                                    value="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-flush py-4">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Debt Information</h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-10">
                                <label class="form-label">Debt Amount (PKR)</label>
                                <input type="number" class="form-control mb-2" name="debpt_amount" />
                                <div class="text-muted fs-7">This is the amount you gave that person while onboarding.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-10">
                                <label class="form-label">Discount per kg (PKR)</label>
                                <input type="number" class="form-control mb-2" name="meta_title" />
                                <div class="text-muted fs-7">The amount of discount applied to the supply of chicken he
                                    gets</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-10">
                                <label class="form-label">Fat rate/kg (PKR)</label>
                                <input type="number" name="fat_rate" class="form-control mb-2" value="" />
                                <div class="text-muted fs-7">Last updated on [date]</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-10">
                                <label class="form-label">Waste rate/kg (PKR)</label>
                                <input type="number" name="waste_rate" class="form-control mb-2" value="" />
                                <div class="text-muted fs-7">Last updated on [date]</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end::Automation-->
            <div class="d-flex justify-content-end">
                <!--begin::Button-->
                <!--end::Button-->
                <!--begin::Button-->
                <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                    <span class="indicator-label">Save Changes</span>
                    <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
                <!--end::Button-->
            </div>

        </div>
    </form>

@endsection
