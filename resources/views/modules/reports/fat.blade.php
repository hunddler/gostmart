@extends('layout.layout')

@section('title', 'Fat Report')


@section('content')
    <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <!--begin::Card title-->
            <div class="card-title">
                <div class="row p-0 mb-5 px-9">
                    <!--begin::Col-->
                    <div class="col">
                        <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                            <span class="fs-4 fw-semibold text-success d-block">Total Purchase</span>
                            <span class="fs-2hx fw-bold text-gray-900" data-kt-countup="true" data-kt-countup-value="36899">0</span>
                        </div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col">
                        <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                            <span class="fs-4 fw-semibold text-primary d-block">Paid amount</span>
                            <span class="fs-2hx fw-bold text-gray-900" data-kt-countup="true" data-kt-countup-value="72">0</span>
                        </div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col">
                        <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                            <span class="fs-4 fw-semibold text-danger d-block">Diffrence</span>
                            <span class="fs-2hx fw-bold text-gray-900" data-kt-countup="true" data-kt-countup-value="291">0</span>
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4"></i>
                    <input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Report" />
                </div>
                <!--end::Search-->
                <!--begin::Export buttons-->
                <div id="kt_ecommerce_report_sales_export" class="d-none"></div>
                <!--end::Export buttons-->
            </div>
            <!--end::Card title-->
            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                <!--begin::Filter-->
                <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <i class="ki-outline ki-filter fs-2"></i>Filter</button>
                <!--begin::Menu 1-->
                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
                    <!--begin::Header-->
                    <div class="px-7 py-5">
                        <div class="fs-4 text-gray-900 fw-bold">Filter Options</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Separator-->
                    <div class="separator border-gray-200"></div>
                    <!--end::Separator-->
                    <!--begin::Content-->
                    <div class="px-7 py-5">
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-5 fw-semibold mb-3">Month:</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-customer-table-filter="month" data-dropdown-parent="#kt-toolbar-filter">
                                <option></option>
                                <option value="aug">August</option>
                                <option value="sep">September</option>
                                <option value="oct">October</option>
                                <option value="nov">November</option>
                                <option value="dec">December</option>
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-5 fw-semibold mb-3">Status:</label>
                            <!--end::Label-->
                            <!--begin::Options-->
                            <div class="d-flex flex-column flex-wrap fw-semibold" data-kt-customer-table-filter="payment_type">
                                <!--begin::Option-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                    <input class="form-check-input" type="radio" name="payment_type" value="all" checked="checked" />
                                    <span class="form-check-label text-gray-600">All</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                    <input class="form-check-input" type="radio" name="payment_type" value="visa" />
                                    <span class="form-check-label text-gray-600">active</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                    <input class="form-check-input" type="radio" name="payment_type" value="mastercard" />
                                    <span class="form-check-label text-gray-600">inactive</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->

                                <!--end::Option-->
                            </div>
                            <!--end::Options-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">Reset</button>
                            <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true" data-kt-customer-table-filter="filter">Apply</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Menu 1-->
                <!--end::Filter-->
                <!--begin::Export-->
                <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_customers_export_modal">
                <i class="ki-outline ki-exit-up fs-2"></i>Export</button>
                <!--end::Export-->
                <!--begin::Add customer-->
                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">Add Customer</button> -->
                <!--end::Add customer-->
            </div>
            <!--begin::Card toolbar-->
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                <!--begin::Daterangepicker-->
                <input class="form-control form-control-solid w-100 mw-250px" placeholder="Pick date range" id="kt_ecommerce_report_sales_daterangepicker" />
                <!--end::Daterangepicker-->
                <!--begin::Export dropdown-->
                <button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <i class="ki-outline ki-exit-up fs-2"></i>Export Report</button>
                <!--begin::Menu-->
                <div id="kt_ecommerce_report_sales_export_menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-kt-ecommerce-export="copy">Copy to clipboard</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-kt-ecommerce-export="excel">Export as Excel</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-kt-ecommerce-export="csv">Export as CSV</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3" data-kt-ecommerce-export="pdf">Export as PDF</a>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu-->
                <!--end::Export dropdown-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                <thead>
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
                            </div>
                        </th>
                        <th class="min-w-125px">Customer Name</th>
                        <th class="min-w-125px">Phone #</th>
                        <th class="text-end min-w-70px">Date</th>
                        <th class="min-w-125px">Fat Purchase</th>
                        <th class="min-w-125px">Rate/kg</th>
                        <th class="min-w-125px">Discount/Kg</th>
                        <th class="min-w-125px">Bill Amount</th>
                        <th class="min-w-125px">Received Amount</th>
                        <th class="min-w-125px">Difference</th>
                        <th class="text-end min-w-70px">status</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">

                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <a href="{{url('customer/detail')}}" class="text-gray-800 text-hover-primary mb-1">Ahmad</a>
                        </td>
                        <td>
                            <a href="#" class="text-gray-600 text-hover-primary mb-1">03407712693</a>
                        </td>
                        <td>
                            <a href="#" class="text-gray-600 text-hover-primary mb-1">24-5-2021</a>
                        </td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#drop-supply" href="#" class="btn btn-sm btn-light">Drop Supply</a>
                        </td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        </td>
                        <td class="text-end">
                            <span class="text-danger">in-active</span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <a href="{{url('customer/detail')}}" class="text-gray-800 text-hover-primary mb-1">Ahmad</a>
                        </td>
                        <td>
                            <a href="#" class="text-gray-600 text-hover-primary mb-1">03407712693</a>
                        </td>
                        <td>
                            <a href="#" class="text-gray-600 text-hover-primary mb-1">24-5-2021</a>
                        </td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#drop-supply" href="#" class="btn btn-sm btn-light">Drop Supply</a>
                        </td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        </td>
                        <td class="text-end">
                            <span class="text-danger">in-active</span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <a href="{{url('customer/detail')}}" class="text-gray-800 text-hover-primary mb-1">Yaseen</a>
                        </td>
                        <td>
                            <a href="#" class="text-gray-600 text-hover-primary mb-1">03407712693</a>
                        </td>
                        <td>
                            <a href="#" class="text-gray-600 text-hover-primary mb-1">24-5-2021</a>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <div>
                                    499 Kgs
                                </div>
                                <div>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#drop-supply">
                                        <i class="ki-outline ki-pencil fs-4"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td>--</td>
                        <td>Rs. 20 <br> <i>(Rs. 3400)</i></td>
                        <td>Rs. 224,550</td>
                        <td>
                            <div class="d-flex gap-2">
                                <div>
                                    Rs. 200,000
                                </div>
                                <div>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#receive-amount">
                                        <i class="ki-outline ki-pencil fs-4"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-danger">Rs. 24,550</span>
                        </td>
                        <td class="text-end">
                            <span class="text-danger">in-active</span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td>
                            <a href="{{url('customer/detail')}}" class="text-gray-800 text-hover-primary mb-1">Yaseen</a>
                        </td>
                        <td>
                            <a href="#" class="text-gray-600 text-hover-primary mb-1">03407712693</a>
                        </td>
                        <td>
                            <a href="#" class="text-gray-600 text-hover-primary mb-1">24-5-2021</a>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <div>
                                    499 Kgs
                                </div>
                                <div>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#drop-supply">
                                        <i class="ki-outline ki-pencil fs-4"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td>--</td>
                        <td>Rs. 20 <br> <i>(Rs. 3400)</i></td>
                        <td>Rs. 224,550</td>
                        <td>
                            <div class="d-flex gap-2">
                                <div>

                                </div>
                                <div>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#receive-amount">
                                        <i class="ki-outline ki-pencil fs-4"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <!-- <span class="text-danger">Rs. 24,550</span> -->
                            --
                        </td>
                        <td class="text-end">
                            <span class="text-success">active</span>
                        </td>
                    </tr>

                </tbody>
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Products-->
@endsection
