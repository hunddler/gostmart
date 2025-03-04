<html lang="en">
    <head>
        <title>@yield('title', 'GosthMart')</title>
        @include('include.styles')
    </head>
    <body
        id="kt_app_body"
        data-kt-app-header-fixed="true"
        data-kt-app-header-fixed-mobile="true"
        data-kt-app-sidebar-enabled="true"
        data-kt-app-sidebar-fixed="true"
        data-kt-app-sidebar-hoverable="true"
        data-kt-app-sidebar-push-toolbar="true"
        data-kt-app-sidebar-push-footer="true"
        data-kt-app-aside-enabled="true"
        data-kt-app-aside-fixed="true"
        data-kt-app-aside-push-toolbar="true"
        data-kt-app-aside-push-footer="true"
        class="app-default"
    >
        @include('include.theme-script') 

        <!--begin::App-->
        <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
            <!--begin::Page-->
            <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

                <!--begin::Header-->
                @include('include.components.header')
                <!--end::Header-->

                <!--begin::Wrapper-->
                <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">

                    <!--begin::Sidebar-->
                    @include('include.components.sidebar')
                    <!--end::Sidebar-->

                    <!--begin::Main-->
                    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                        <!--begin::Content wrapper-->
                        <div class="d-flex flex-column flex-column-fluid">
                            <!--begin::Content-->

                            @yield('breadcrum')

                            <div id="kt_app_content" class="app-content flex-column-fluid">
                                <!--begin::Content container-->
                                <div id="kt_app_content_container" class="app-container container-fluid">
                                    @yield('content') 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end:::Main-->
                </div>
            </div>
        </div>

        @include('include.scripts')

    </body>
</html>
