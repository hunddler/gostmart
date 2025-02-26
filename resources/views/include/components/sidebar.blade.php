<div
    id="kt_app_sidebar"
    class="app-sidebar flex-column"
    data-kt-drawer="true"
    data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}"
    data-kt-drawer-overlay="true"
    data-kt-drawer-width="250px"
    data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle"
>
    <div class="app-sidebar-wrapper">
        <div
            id="kt_app_sidebar_wrapper"
            class="hover-scroll-y my-5 my-lg-2 mx-4"
            data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}"
            data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_header"
            data-kt-scroll-wrappers="#kt_app_sidebar_wrapper"
            data-kt-scroll-offset="5px"
        >
            <div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false" class="app-sidebar-menu-primary menu menu-column menu-rounded menu-sub-indention menu-state-bullet-primary px-3 mb-5">

            	<div class="menu-item">
				    <a class="menu-link" href="{{url('/dashboard')}}">
				        <span class="menu-icon">
                            <i class="ki-outline ki-home-2 fs-2"></i>
                        </span>
				        <span class="menu-title">Dashboard</span>
				    </a>
				</div>

                <div class="menu-item">
                    <a class="menu-link" href="{{url('/daily-supply')}}">
                        <span class="menu-icon">
                            <i class="ki-outline ki-arrow-right-left fs-2"></i>
                        </span>
                        <span class="menu-title">Daily Supply & Billing</span>
                    </a>
                </div>

				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-outline ki-people fs-2"></i>
                        </span>
                        <span class="menu-title">Customers</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{url('customers')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">All Customers</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{url('customer/add')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Add Customer</span>
                            </a>
                        </div>
                    </div>
                </div>


				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-outline ki-chart fs-2"></i>
                        </span>
                        <span class="menu-title">Reports</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{url('report/chicken')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Chicken</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{url('report/fat')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Fat</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{url('report/waste')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Waste</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
