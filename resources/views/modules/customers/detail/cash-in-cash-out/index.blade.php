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
                        <th class="min-w-125px">Date</th>
                        <th class="min-w-125px">Check In/Out Amount</th>
                        <th class="min-w-125px">Detail</th>
                        <th class="min-w-125px">Total Debt Amount</th>
                        <th class="min-w-125px">Type</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">
                    @if (count($CustomerCash) > 0)
                        @foreach ($CustomerCash as $index => $supply)
                            <tr>
                                <td>{{ Carbon\Carbon::parse($supply->date)->format('d M y') }}</td>
                                <td>
                                    RS. {{ $supply->cash }}
                                </td>
                                <td>{{ $supply->detail }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <div>Rs. {{ $supply->total_debt_amount }}</div>
                                    </div>
                                </td>
                                <td>
                                    @if ($supply->type === 'cashin')
                                        <span class="badge badge-light-success">{{ $supply->type }}</span>
                                    @endif

                                    @if ($supply->type === 'cashout')
                                        <span class="badge badge-light-danger">{{ $supply->type }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>


    @include('modules.daily-supply.popups.drop-supply')
    @include('modules.daily-supply.popups.receive-amount')
    @include('modules.customers.detail.script-modal')


    <script>
        function cashout(id) {
            $('#customer_id_cash_out').val(id);
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



        $(document).ready(function() {
            $('#kt_customers_export_form_cashout').on('submit', function(e) {
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
