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
                        <th class="min-w-125px">Waste Rate/Kg</th>
                        <th class="min-w-125px">Total Waste Per/Kg</th>
                        <th class="min-w-125px">Total</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">
                    @if (count($CustomerFat) > 0)
                        @foreach ($CustomerFat as $index => $fat)
                            <tr>
                                <td>{{ Carbon\Carbon::parse($fat->date)->format('d M y') }}</td>
                                <td>
                                    RS. {{ $fat->fat_waste_rate }}
                                </td>
                                <td>{{ $fat->fat_waste_kg }} KG</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <div>Rs. {{ $fat->total }}</div>
                                    </div>
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

    </script>
@endsection
