<!doctype html>
<html lang="en" dir="ltr">

<head>

    @include('admin.layouts.head')


    <style>
        @include('admin.layouts.loader.formLoader.loaderCss')

    </style>




</head>

<body class="app sidebar-mini" onload="myFunction()">

    <!-- Start Switcher -->
{{--    @include('admin.layouts.switcher')--}}
    <!-- End Switcher -->

    <!-- GLOBAL-LOADER -->
    @include('admin.layouts.loader')
    <!-- /GLOBAL-LOADER -->

    <style>
            @media print {
                #printH {display: none}
            }
    </style>
    <!-- PAGE -->
    <div class="page">
        <div class="page-main">
            <!--APP-SIDEBAR-->
            @include('admin.layouts.main-sidebar')
            <!--/APP-SIDEBAR-->

            <!-- Header -->
            @include('admin.layouts.main-header')
            <!-- Header -->
            <!--Content-area open-->
            <div class="app-content">
                <div class="side-app">

                    <!-- PAGE-HEADER -->
                    <div class="page-header" id="printH">
                        <div>
                            <h1 class="page-title">Welcome Back <i class="fas fa-heart text-danger"></i></h1>
                            <ol class="breadcrumb">
                                @if (Route::currentRouteName() == 'admin.home')
                            @else
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ trans('admin.dashboard') }}</a></li>
                                @endif
                                <li class="breadcrumb-item active" aria-current="page">@yield('page_name')</li>
                            </ol>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->
                    @yield('content')
                </div>
                <!-- End Page -->
            </div>
            <!-- CONTAINER END -->

            <!-- reregisterForm Modal -->
            <div class="modal fade bd-example-modal-lg" id="RegisterForm" data-backdrop="static"  role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example-Modal3">{{ trans('admin.re_record_the_track') }} @lang('admin.period') ({{ $periods[0]->period_start_date }} - {{ $periods[0]->period_end_date }})</h5>
                        </div>
                        <div class="modal-body" id="RegisterForm-body">

                        </div>
                    </div>
                </div>
            </div>
            <!-- reregisterForm Modal -->
        </div>
        <!-- SIDE-BAR -->

        <!-- FOOTER -->
        @include('admin.layouts.footer')
        <!-- FOOTER END -->
    </div>
    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up mt-4"></i></a>

    @include('admin.layouts.scripts')

    @yield('ajaxCalls')


</body>

</html>
