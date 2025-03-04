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
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                <thead>
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">#</th>
                        <th class="min-w-125px">Date</th>
                        <th class="min-w-125px">Chicken Supply</th>
                        <th class="min-w-125px">Discount/Kg</th>
                        <th class="min-w-125px">Bill Amount</th>
                        <th class="min-w-125px">Received Amount</th>
                        <th class="min-w-125px">Difference</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">
                    @if (count($Customersupply) > 0)
                        @foreach ($Customersupply as $index => $supply)
                            @php
                                $rate = DB::table('gosht_rates')->where('date', $supply->date)->value('rate');
                            @endphp
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ Carbon\Carbon::parse($supply->date)->format('d M y') }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <div>{{ $supply->chicken_supply }} Kgs</div>
                                        <div>
                                            <a href="#" data-bs-toggle="modal"
                                                onclick="supplycustomer({{ $supply->id }})"
                                                data-bs-target="#drop-supply-customer">
                                                <i class="ki-outline ki-pencil fs-4"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>Rs. @if (!empty($supply->discount_per_kg))
                                        {{ $supply->discount_per_kg }}
                                    @else
                                        0
                                    @endif <br> <i>(Rs.
                                        {{ $supply->discount_per_kg * $supply->chicken_supply }})</i></td>
                                <td>Rs. {{ $supply->total_amount }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <div>Rs. {{ $supply->received_amount }}</div>
                                        <div>
                                            <a href="#"
                                                onclick="receiveAmount({{ $supply->id }},'{{ $supply->chicken_supply }}','{{ $rate }}')"
                                                data-bs-toggle="modal" data-bs-target="#receive-amount-edit">
                                                <i class="ki-outline ki-pencil fs-4"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="text-danger">Rs. {{ $supply->difference }}</span></td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>


    @include('modules.daily-supply.popups.drop-supply')
    @include('modules.daily-supply.popups.receive-amount')

    <script>
        function supplycustomer(id) {
            $('#edit_id').val(id);
        }

        $(document).ready(function() {
            $('#kt_customers_export_form_supply_customer').on('submit', function(e) {
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



        $(document).ready(function() {
            $('#kt_customers_export_form_amount_edit').on('submit', function(e) {
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

        function receiveAmount(id, supply, rate) {
            if (!rate || isNaN(rate)) {
                rate = 0;
            }

            let totalAmount = supply * rate;
            $('#supply_id').val(id);
            document.getElementById('supply-value-edit').textContent = supply;
            document.getElementById('current-rate-edit').textContent = rate;
            document.getElementById('total-amount-edit').textContent = totalAmount.toLocaleString();
        }

        function checkIn(id) {
            $('#customer_id_check_in').val(id);
        }

        $(document).ready(function() {
            $('#kt_customers_export_form_checkin').on('submit', function(e) {
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
