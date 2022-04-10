<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Admin & Dashboard | HR" />
        <meta name="author" content="ARMA Software" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Title -->
        <title>Dashboard | HR </title>
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

        <!-- select2 css -->
        <link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- dropzone css -->
        <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css -->
        <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        <!-- Styles -->
        <link href="{{asset('assets/css/style.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        <!-- RTL CSS -->
        @if (LaravelLocalization::getCurrentLocale() == 'ar')
            <link href="{{ asset('assets/css/app-rtl.min.css') }}" rel="stylesheet" type="text/css">
            <link href="{{asset('assets/css/style-rtl.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        @endif

        @yield('style')
    </head>

    <body data-sidebar="dark">
        
        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="{{route('master.home')}}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('assets/images/logo.svg')}}" alt="" height="25">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('assets/images/logo.svg')}}" alt="" height="30">
                                    <span class="logo-text">HR SYSTEM</span>
                                </span>
                            </a>

                            <a href="{{route('master.home')}}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset('assets/images/logo.svg')}}" alt="" height="25">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('assets/images/logo.svg')}}" alt="" height="30">
                                    <span class="logo-text">HR SYSTEM</span>
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img id="header-lang-img" src="{{asset('assets/images/flags/'.LaravelLocalization::getCurrentLocale().'.png')}}" alt="Header Language" height="16">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" class="dropdown-item notify-item language" data-lang="en">
                                    <img src="{{asset('assets/images/flags/en.png')}}" alt="user-image" class="me-1" height="16"> <span class="align-middle">{{__('master.ENGLISH')}}</span>
                                </a>
                                <!-- item-->
                                <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" class="dropdown-item notify-item language" data-lang="en">
                                    <img src="{{asset('assets/images/flags/ar.png')}}" alt="user-image" class="me-1" height="16"> <span class="align-middle">{{__('master.ARABIC')}}</span>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </button>
                        </div>

                        {{-- <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-bell"></i>
                                <span class="badge bg-danger rounded-pill">1</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0" key="t-notifications"> {{__('master.NOTIFICATIONS')}} </h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#!" class="small" key="t-view-all"> {{__('master.VIEW-ALL')}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;">
                                    <a href="javascript: void(0);" class="text-reset notification-item">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="bx bx-cart"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1" key="t-your-order">Your order is placed</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1" key="t-grammer">If several languages coalesce the grammar</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">3 min ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2 border-top d-grid">
                                    <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                        <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">{{__('master.VIEW-MORE')}}</span> 
                                    </a>
                                </div>
                            </div>
                        </div> --}}

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{ asset(Auth::user()->avatar) }}" alt="Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ Auth::user()->name }}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="{{ route('profile') }}"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">{{__('master.PROFILE')}}</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">{{__('master.LOG-OUT')}}</span></a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </header>

            <!-- ========== Top Horizontalbar Start ========== -->
            <div class="topnav main-content">
                <div class="container-fluid d-flex justify-content-center">
                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                        <div class="collapse navbar-collapse" id="topnav-menu-content">
                            <ul class="navbar-nav">

                                <li class="nav-item">
                                    <a class="nav-link arrow-none @if(str_contains(url()->current(), '/master')) active @endif" href="{{route('master.home')}}">
                                        <i class="bx bx-copy-alt mx-2"></i><span>{{__('master.MASTER')}}</span>
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link arrow-none @if(str_contains(url()->current(), '/leaves')) active @endif" href="{{route('leaves.home')}}">
                                        <i class="bx bx-user-pin mx-2"></i><span>{{__('master.LEAVES-AND-ATTENDANCE')}}</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link arrow-none @if(str_contains(url()->current(), '/payroll')) active @endif" href="{{route('payroll.home')}}">
                                        <i class="bx bx-receipt mx-2"></i><span>{{__('master.PAYROLL')}}</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link arrow-none @if(str_contains(url()->current(), '/tasks')) active @endif" href="{{route('tasks.home')}}">
                                        <i class="bx bx-task mx-2"></i><span>{{__('master.TASKS-MANAGEMENT')}}</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- Top Horizontalbar End -->

            <!-- ========== Left Sidebar Start ========== -->
            @yield('sidebar')
            <!-- Left Sidebar End -->

            @yield('content')
            
        </div>


        <!-- Popup Modal -->
        <div class="modal fade" id="popup" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-wrapper">
                <div class="modal-dialog modal-lg" id="modal_body">
                    
                </div>
            </div>
        </div>

        <!-- Loader -->
        <div id="loader" data-load='<div class="divload"><img src="{{asset("images/load.gif")}}" width="50" class="m-auto"></div>'></div>
        <div id="loader2" data-load='<div class="d-flex"><img src="{{asset("images/loader.gif")}}" width="50" class="m-auto"></div>'></div>

        <!-- JAVASCRIPT -->
        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
        <!-- select 2 plugin -->
        <script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>
        <!-- dropzone plugin -->
        <script src="{{asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>
        <!-- init js -->
        <script src="{{asset('assets/js/pages/ecommerce-select2.init.js')}}"></script>
        <!-- App js -->
        <script src="{{asset('assets/js/app.js')}}"></script>
        <!-- DataTables js -->
        <script src="{{asset('assets/js/dataTables.min.js')}}"></script>
        <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Sweet Alert 2 js -->
        <script type="application/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

        <script>
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document).ready(function() 
                {
                    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
                });

                $(document).on("click",".alert-dismissible .close", function()
                {
                    $(this).parents('.alert-dismissible').hide();
                });
        </script>

        @yield('script')
    </body>

</html>
