    @if (count($Customers) > 0)
        @foreach ($Customers as $customer)
            <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input checkbox" type="checkbox" value="{{ $customer->id }}" />
                    </div>
                </td>
                <td>
                    <a href="#" class="text-gray-800 text-hover-primary mb-1">{{ $customer->name }}</a>
                </td>
                <td>
                    <a href="#" class="text-gray-600 text-hover-primary mb-1">{{ $customer->phone }}</a>
                </td>
                <td>
                    <span class="text-danger">Rs. {{ $customer->debt_amount }}</span>
                    <!-- If the debt amount is 0 -->
                    <!-- <span class="text-muted">Rs. 0</span> -->
                </td>
                <td>Rs. {{ $customer->discount }}/KG</td>
                <td>Rs. {{ $customer->fat_rate }}/KG</td>
                <td>Rs. {{ $customer->waste_rate }}/KG</td>
                <td>
                    @if ($customer->status == 'Active')
                        <span class="badge badge-light-success">{{ $customer->status }}</span>
                    @endif
                    @if ($customer->status == 'In-Active')
                        <span class="badge badge-light-warning">{{ $customer->status }}</span>
                    @endif
                    @if ($customer->status == 'Archived')
                        <span class="badge badge-light-danger">Archived</span>
                    @endif
                </td>



                <td class="">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Actions <i class="ki-outline ki-down fs-5 ms-1"></i>
                        </a>
                        <div class="dropdown-menu menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                            aria-labelledby="dropdownMenuButton">
                            <div class="menu-item px-3">
                                <a href="{{ url('customer/edit/' . $customer->id) }}"
                                    class="dropdown-item menu-link px-3 p-1">Quick Edit</a>
                            </div>
                            <div class="menu-item px-3">
                                <a href="{{ url('customer/detail') }}"
                                    class="dropdown-item menu-link px-3 p-1">View</a>
                            </div>
                            <div class="menu-item px-3">
                                <a href="{{ url('change-status/' . $customer->id) }}"
                                    class="dropdown-item menu-link px-3 p-1" data-kt-customer-table-filter="delete_row">
                                    @if ($customer->status == 'Active')
                                        In-Active
                                    @elseif($customer->status == 'In-Active')
                                        Archived
                                    @else
                                        Active
                                    @endif
                                </a>
                            </div>
                            <div class="menu-item px-3">
                                <a href="#" data-toggle="modal" onclick="deletecustomer({{ $customer->id }});"
                                    data-target="#delete-customer" class="menu-link px-3"
                                    data-kt-customer-table-filter="delete_row">Delete</a>
                            </div>

                        </div>
                    </div>
                </td>
            </tr>

            <div class="modal fade" id="delete-customer" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="top:200 !important">
                        <div class="modal-body">
                            <form id="" method="POST" class="form"
                                action="{{ url('admin/deletecustomer') }}">
                                @csrf
                                <input type="hidden" id="delete_id" name="delete_id">
                                <div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
                                    <div class="swal2-icon-content">!</div>
                                </div>
                                <div class="swal2-html-container">
                                    Are you sure you want to delete selected customers?
                                </div>

                        </div>
                        <div class="text-center mb-20">
                            <button type="submit" class="btn btn-danger">Yes, Delete!</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
