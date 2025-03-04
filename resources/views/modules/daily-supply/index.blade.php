@extends('layout.layout')

@section('title', 'Daily Supply & Billing')

@section('breadcrum')
    <div id="kt_app_toolbar" class="app-toolbar pt-6 pb-2">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">Daily
                        Supply & Billing</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('/dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Daily Supply & Billing</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <div
                        class="d-flex flex-row justify-content-between border border-gray-300 border-dashed rounded min-w-150px w-100 py-2 px-4 me-6 align-items-center">
                        <div class="d-flex flex-column">
                            <!--begin::Date-->
                            <span class="fs-6 text-gray-700 fw-bold">
                                @if ($rate !== 'Not Set')
                                    Rs.
                                @endif {{ $rate }}
                            </span>
                            <!--end::Date-->
                            <!--begin::Label-->
                            <div class="fw-semibold text-gray-500">Today's Rate</div>
                            <!--end::Label-->
                        </div>
                        <div>
                            <a data-bs-toggle="modal" data-bs-target="#today-rate" href="#"
                                class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                <i class="ki-outline ki-pencil fs-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                    <input type="text" data-kt-customer-table-filter="search"
                        class="form-control form-control-solid w-250px ps-12" placeholder="Search Customers" />
                </div>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end">
                        <i class="ki-outline ki-filter fs-2"></i>Filter</button>
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true"
                        id="kt-toolbar-filter">
                        <div class="px-7 py-5">
                            <div class="fs-4 text-gray-900 fw-bold">Filter Options</div>
                        </div>
                        <div class="separator border-gray-200"></div>
                        <div class="px-7 py-5">
                            <div class="mb-10">
                                <label class="form-label fs-5 fw-semibold mb-3">Status Type:</label>
                                <div class="d-flex flex-column flex-wrap fw-semibold"
                                    data-kt-customer-table-filter="payment_type">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input" type="radio" name="payment_type" value="all"
                                            checked="checked" />
                                        <span class="form-check-label text-gray-600">All</span>
                                    </label>
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input" type="radio" name="payment_type" value="visa" />
                                        <span class="form-check-label text-gray-600">Active</span>
                                    </label>
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                        <input class="form-check-input" type="radio" name="payment_type"
                                            value="mastercard" />
                                        <span class="form-check-label text-gray-600">In-Active</span>
                                    </label>
                                    <label class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="payment_type"
                                            value="american_express" />
                                        <span class="form-check-label text-gray-600">Archived</span>
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2"
                                    data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">Reset</button>
                                <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true"
                                    data-kt-customer-table-filter="filter">Apply</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                        data-bs-target="#export-table">
                        <i class="ki-outline ki-exit-up fs-2"></i>Export</button>
                </div>
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                    <div class="fw-bold me-5">
                        <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                    </div>
                    <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete
                        Selected</button>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            @if ($rate === 'Not Set')
                <div class="mb-3 notice d-flex bg-light-warning rounded border-warning border border-dashed mb-12 p-6">
                    <!--begin::Icon-->
                    <i class="ki-outline ki-information fs-2tx text-warning me-4"></i>
                    <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1">
                        <!--begin::Content-->

                        <div class="fw-semibold">
                            <h4 class="text-gray-900 fw-bold">Set today's Chicken rate</h4>
                            <div class="fs-6 text-gray-700">You need to setup today's rate before droping supply
                                <a href="#" class="fw-bold" data-bs-toggle="modal"
                                    data-bs-target="#today-rate">Setup</a>.
                            </div>
                        </div>

                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
            @endif
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                <thead>
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                    data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
                            </div>
                        </th>
                        <th class="min-w-125px">Customer Name</th>
                        <th class="min-w-125px">Phone #</th>
                        <th class="min-w-125px">Chicken Supply</th>
                        <th class="min-w-125px">Discount/Kg</th>
                        <th class="min-w-125px">Bill Amount</th>
                        <th class="min-w-125px">Received Amount</th>
                        <th class="min-w-125px">Difference</th>
                        <th class="text-end min-w-70px">Total Debt</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">

                    @if (count($Customers) > 0)
                        @foreach ($Customers as $customer)
                            @php
                                $DropSupply = DB::table('customer_supplies')
                                    ->where('customer_id', $customer->id)
                                    ->where('date', $today)
                                    ->first();

                                $Debit = DB::table('customer_debt')->where('customer_id', $customer->id)->first();
                            @endphp
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ url('customer/detail') }}"
                                        class="text-gray-800 text-hover-primary mb-1">{{ $customer->name }}</a>
                                </td>
                                <td>
                                    <a href="#"
                                        class="text-gray-600 text-hover-primary mb-1">{{ $customer->phone }}</a>
                                </td>
                                <td>
                                    @if (!empty($DropSupply))
                                        <div class="d-flex gap-2">
                                            <div>
                                                {{ $DropSupply->chicken_supply }} Kgs
                                            </div>
                                            <div>
                                                <a href="#"
                                                    onclick="editdropsupply({{ $DropSupply->id }},'{{ $DropSupply->chicken_supply }}','{{ $DropSupply->discount_per_kg }}')"
                                                    data-bs-toggle="modal" data-bs-target="#edit-drop-supply">
                                                    <i class="ki-outline ki-pencil fs-4"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <a data-bs-toggle="modal" onclick="dropsupply({{ $customer->id }})"
                                            data-bs-target="#drop-supply" href="#"
                                            class="btn btn-sm btn-light">Drop Supply</a>
                                    @endif
                                </td>
                                <td>

                                    @if (!empty($DropSupply) && $DropSupply->discount_per_kg !== null)
                                        RS. {{ $DropSupply->discount_per_kg }} <br>
                                        <i> (RS . {{ $DropSupply->discount_per_kg * $DropSupply->chicken_supply }}) </i>
                                    @else
                                        --
                                    @endif

                                </td>
                                <td>
                                    @if (!empty($DropSupply))
                                        RS. {{ $DropSupply->total_amount }}
                                    @else
                                        --
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($DropSupply))
                                        <div class="d-flex gap-2">

                                            <div>
                                                RS. {{ $DropSupply->received_amount }}

                                                <a href="#"
                                                    onclick="receiveAmount({{ $customer->id }},'{{ $DropSupply->chicken_supply }}','{{ $rate }}')"
                                                    data-bs-toggle="modal" data-bs-target="#receive-amount">
                                                    <i class="ki-outline ki-pencil fs-4"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        --
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($DropSupply))
                                        RS.{{ $DropSupply->difference }}
                                    @else
                                        --
                                    @endif
                                </td>

                                <td class="text-end">
                                    <span class="text-danger">
                                        @if (!empty($DropSupply))
                                            RS.{{ $Debit->total_debt_amount }}
                                        @else
                                            --
                                        @endif
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    @endif



                </tbody>
            </table>
        </div>
    </div>


    @include('modules.daily-supply.popups.export')
    @include('modules.daily-supply.popups.drop-supply')
    @include('modules.daily-supply.popups.receive-amount')
    @include('modules.daily-supply.popups.today-rate')


    <script>
        function setdailyrate() {

            var rate = $('#rate').val();
            if ($('#rate').val() === '') {
                toastr.error('Please Enter Amount');
                return false;
            }
            $.ajax({
                type: "POST",
                url: "{{ url('admin/setdailyrate') }}",
                data: {
                    rate: rate,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    toastr.success(response.success);
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                },
                error: function(response) {
                    toastr.error('error');
                }
            });
        }

        function dropsupply(val) {
            $('#customer_id').val(val);
        }

        $(document).ready(function() {
            $('#kt_customers_export_form_supply').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.error) {
                            toastr.error(response.error);
                        } else {
                            toastr.success(response.success);
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        }

                    },
                    error: function(response) {
                        if (response.responseJSON.errors) {
                            var errors = response.responseJSON.errors;
                            var errorMsg = '';
                            for (var error in errors) {
                                errorMsg += errors[error][0] + '<br>';
                            }
                            toastr.error(errorMsg);
                        } else {
                            toastr.error(response.responseJSON.error);
                        }



                    }
                });
            });

        });

        function editdropsupply(id, supply, discount) {
            $('#customer_edit_id').val(id);
            $('#chicken_supply').val(supply);
            $('#discount_per_kg').val(discount);

        }

        $(document).ready(function() {
            $('#kt_customers_export_form_supply_edit').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        toastr.success(response.success);
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    },
                    error: function(response) {
                        toastr.error(esponse.error);

                    }
                });
            });

        });

        function receiveAmount(id, supply, rate) {
            if (!rate || isNaN(rate)) {
                rate = 0;
            }

            let totalAmount = supply * rate;
            $('#customer_id_amount').val(id);
            document.getElementById('supply-value').textContent = supply;
            document.getElementById('current-rate').textContent = rate;
            document.getElementById('total-amount').textContent = totalAmount.toLocaleString();
        }

        $(document).ready(function() {
            $('#kt_customers_export_form_amount').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.error) {
                            toastr.error(response.error);
                        } else {
                            toastr.success(response.success);
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        }

                    },
                    error: function(response) {
                        if (response.responseJSON.errors) {
                            var errors = response.responseJSON.errors;
                            var errorMsg = '';
                            for (var error in errors) {
                                errorMsg += errors[error][0] + '<br>';
                            }
                            toastr.error(errorMsg);
                        } else {
                            toastr.error(response.responseJSON.error);
                        }



                    }
                });
            });

        });
    </script>


@endsection
