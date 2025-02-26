@extends('layout.layout')

@section('title', 'All Customer')

@section('breadcrum')
	<div id="kt_app_toolbar" class="app-toolbar pt-6 pb-2">
		<div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
			<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
				<div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
					<h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">All Customer</h1>
					<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
						<li class="breadcrumb-item text-muted">
							<a href="{{url('/dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
						</li>
						<li class="breadcrumb-item">
							<span class="bullet bg-gray-500 w-5px h-2px"></span>
						</li>
						<li class="breadcrumb-item text-muted">Customers</li>
					</ul>
				</div>
				<div class="d-flex align-items-center gap-2 gap-lg-3">
					<a href="{{url('customer/add')}}" class="btn btn-flex btn-primary h-40px fs-7 fw-bold">Add Customer</a>
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
                <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Customers" />
            </div>
        </div>
        <div class="card-toolbar">
            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <i class="ki-outline ki-filter fs-2"></i>Filter</button>
                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
                    <div class="px-7 py-5">
                        <div class="fs-4 text-gray-900 fw-bold">Filter Options</div>
                    </div>
                    <div class="separator border-gray-200"></div>
                    <div class="px-7 py-5">
                        <div class="mb-10">
                            <label class="form-label fs-5 fw-semibold mb-3">Status Type:</label>
                            <div class="d-flex flex-column flex-wrap fw-semibold" data-kt-customer-table-filter="payment_type">
                                <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                    <input class="form-check-input" type="radio" name="payment_type" value="all" checked="checked" />
                                    <span class="form-check-label text-gray-600">All</span>
                                </label>
                                <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                    <input class="form-check-input" type="radio" name="payment_type" value="visa" />
                                    <span class="form-check-label text-gray-600">Active</span>
                                </label>
                                <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                    <input class="form-check-input" type="radio" name="payment_type" value="mastercard" />
                                    <span class="form-check-label text-gray-600">In-Active</span>
                                </label>
                                <label class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="radio" name="payment_type" value="american_express" />
                                    <span class="form-check-label text-gray-600">Archived</span>
                                </label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">Reset</button>
                            <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true" data-kt-customer-table-filter="filter">Apply</button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_customers_export_modal">
                <i class="ki-outline ki-exit-up fs-2"></i>Export</button>
            </div>
            <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                <div class="fw-bold me-5">
                <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
                <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
            </div>
        </div>
    </div>
    <div class="card-body pt-0">
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
                    <th class="min-w-125px">Debt Amount</th>
                    <th class="min-w-125px">Discount/Kg</th>
                    <th class="min-w-125px">Fat rate/Kg</th>
                    <th class="min-w-125px">Waste rate/Kg</th>
                    <th class="min-w-125px">Status</th>
                    <th class="text-end min-w-70px">Actions</th>
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
                        <a href="apps/customers/view.html" class="text-gray-800 text-hover-primary mb-1">Emma Smith</a>
                    </td>
                    <td>
                        <a href="#" class="text-gray-600 text-hover-primary mb-1">03407712693</a>
                    </td>
                    <td>
                    	<span class="text-danger">Rs. 47,5000</span>
                    	<!-- If the debt amount is 0 -->
                    	<!-- <span class="text-muted">Rs. 0</span> -->
                    </td>
                    <td>Rs. 20/KG</td>
                    <td>Rs. 20/KG</td>
                    <td>Rs. 20/KG</td>
                    <td>
                        <span class="badge badge-light-success">Active</span>
                        <!-- Other status once active -->
                        <!-- <span class="badge badge-light-warning">In-Active</span>
                        <span class="badge badge-light-danger">Archived</span> -->
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions 
                        <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                            <div class="menu-item px-3">
                                <a href="apps/customers/view.html" class="menu-link px-3">Quick Edit</a>
                            </div>
                            <div class="menu-item px-3">
                                <a href="{{url('customer/detail')}}" class="menu-link px-3">View</a>
                            </div>
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row">In-active</a>
                            </div>
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete/Archive</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection