<div class="card-body pt-9 pb-0">
    <div class="d-flex flex-wrap flex-sm-nowrap">
        <div class="me-7 mb-4">
            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                @if ($CustomerDetail->image)
                    <img src="{{ asset('public/assets/customer/' . $CustomerDetail->image) }}" alt="image" />
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
                    <a href="#" onclick="getafat({{ $CustomerDetail->id }})" class="btn btn-sm btn-light me-2"
                        data-bs-target="#kt_modal_fat" data-bs-toggle="modal" id="kt_user_follow_button">
                        <i class="ki-outline ki-check fs-3 d-none"></i>
                        <span class="indicator-label">Record Fat</span>
                    </a>
                    <a href="#" onclick="getwaste({{ $CustomerDetail->id }})" class="btn btn-sm btn-light me-3"
                        data-bs-toggle="modal" data-bs-target="#kt_modal_waste">Record Waste</a>
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
            <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ Request::is('customer/detail/' . $CustomerDetail->id) ? 'active' : '' }}"
                href="{{ url('customer/detail/' . $CustomerDetail->id) }}">
                Chicken Supply
            </a>
        </li>
        <li class="nav-item mt-2">
            <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ Request::is('customer/detail/cash-in-cash-out/' . $CustomerDetail->id) ? 'active' : '' }}"
                href="{{ url('customer/detail/cash-in-cash-out/' . $CustomerDetail->id) }}">
                Cash In / Cash Out
            </a>
        </li>
        <li class="nav-item mt-2 disabled">
            <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ Request::is('customer/detail/fat/' . $CustomerDetail->id) ? 'active' : '' }}"
                href="{{ url('customer/detail/fat/' . $CustomerDetail->id) }}">Fat</a>
        </li>
        <li class="nav-item mt-2 disabled">
            <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ Request::is('customer/detail/waste/' . $CustomerDetail->id) ? 'active' : '' }}"
                href="{{ url('customer/detail/waste/' . $CustomerDetail->id) }}">Waste</a>
        </li>
        <li class="nav-item mt-2">
            <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ Request::is('customer/detail/settings/' . $CustomerDetail->id) ? 'active' : '' }}"
                href="{{ url('customer/detail/settings/' . $CustomerDetail->id) }}">
                Settings
            </a>
        </li>
    </ul>
</div>
