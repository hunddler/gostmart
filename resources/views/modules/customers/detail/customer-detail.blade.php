<div class="card-body pt-9 pb-0">
    <div class="d-flex flex-wrap flex-sm-nowrap">
        <div class="me-7 mb-4">
            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                @if ($CustomerDetail->image)
                    <img src="{{asset('assets/customer/' . $CustomerDetail->image)}}"
                        alt="image" />
                @else
                    <img src="https://cdn.vectorstock.com/i/500p/95/56/user-profile-icon-avatar-or-person-vector-45089556.jpg"
                        alt="image" />
                @endif
            </div>
        </div>
        <div class="flex-grow-1">
            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                <div class="d-flex flex-column">
                    <div class="d-flex align-items-center mb-2">
                        <a href="#"
                            class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $CustomerDetail->name }}</a>
                    </div>
                    <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                        <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                            <i class="ki-outline ki-geolocation fs-4 me-1"></i>{{ $CustomerDetail->address }}</a>
                        <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                            <i class="ki-outline ki-sms fs-4"></i>{{ $CustomerDetail->phone }}</a>
                    </div>
                </div>
                <div class="d-flex my-4">
                    <a href="#" class="btn btn-sm btn-light me-2" id="kt_user_follow_button">
                        <i class="ki-outline ki-check fs-3 d-none"></i>
                        <span class="indicator-label">Record Fat</span>
                    </a>
                    <a href="#" class="btn btn-sm btn-light me-3" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_offer_a_deal">Record Waste</a>
                    <div class="me-0">
                        <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <i class="ki-solid ki-dots-horizontal fs-2x"></i>
                        </button>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                            data-kt-menu="true">
                            <div class="menu-item px-3">
                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Actions</div>
                            </div>
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Inactive</a>
                            </div>
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Activate</a>
                            </div>
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">Delete/Archive</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-wrap flex-stack">
                <div class="d-flex flex-column flex-grow-1 pe-8">
                    <div class="d-flex flex-wrap">
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="fs-2 fw-bold">Rs. {{ $CustomerDebt->total_debt_amount }}</div>
                            </div>
                            <div class="fw-semibold fs-6 text-gray-500">Debt Amount</div>
                        </div>
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="fs-2 fw-bold">Rs. 308,000</div>
                            </div>
                            <div class="fw-semibold fs-6 text-gray-500">Last Month Debt</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
        <li class="nav-item mt-2">
            <a class="nav-link text-active-primary ms-0 me-10 py-5 active"
                href="{{ url('customer/detail/' . $CustomerDetail->id) }}">Chicken Supply</a>
        </li>
        <li class="nav-item mt-2">
            <a class="nav-link text-active-primary ms-0 me-10 py-5"
                href="{{ url('customer/detail/cash-in-cash-out/' . $CustomerDetail->id) }}">Cash In / Cash Out</a>
        </li>
        <li class="nav-item mt-2 disabled">
            <a class="nav-link text-active-primary ms-0 me-10 py-5" href="{{ url('customer/detail/fat') }}">Fat</a>
        </li>
        <li class="nav-item mt-2">
            <a class="nav-link text-active-primary ms-0 me-10 py-5" href="{{ url('customer/detail/waste') }}">Waste</a>
        </li>
        <li class="nav-item mt-2">
            <a class="nav-link text-active-primary ms-0 me-10 py-5"
                href="{{ url('customer/detail/settings/' . $CustomerDetail->id) }}">Settings</a>
        </li>
    </ul>
</div>


<div class="modal fade" id="cash-in" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-400px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Cash In</h2>
                <div id="kt_customers_export_close" data-bs-dismiss="modal"
                    class="btn btn-icon btn-sm btn-active-icon-primary">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-5 my-5">
                <form id="kt_customers_export_form_checkin" method="POST" class="form"
                    action="{{ url('admin/addcheckin') }}">
                    @csrf
                    <input type="hidden" name="customer_id" id="customer_id_check_in" value="">
                    <div class="fv-row mb-5">
                        <label class="fs-5 fw-semibold form-label mb-5">Amount</label>
                        <input type="number" min="0" required class="form-control form-control-solid"
                            name="amount" />
                    </div>
                    <div class="fv-row mb-5">
                        <label class="fs-5 fw-semibold form-label mb-5">Description</label>
                        <textarea required class="form-control form-control-solid" name="detail" rows="2" cols="2"></textarea>
                    </div>

                    <div class="fv-row mb-5">
                        <label class="fs-5 fw-semibold form-label mb-5">Document</label>
                        <input type="file" accept=".png, .jpg, .jpeg,.pdf,.docs"
                            class="form-control form-control-solid" name="document" />
                    </div>
                    <div class="text-center">
                        <button type="reset" data-bs-dismiss="modal" id="kt_customers_export_cancel"
                            class="btn btn-light me-3">Discard</button>
                        <button type="submit" id="kt_customers_export_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
