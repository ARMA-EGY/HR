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

    </head>

    <body>

        @yield('content')

        <footer class="footer right-0 left-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <a class="mx-4" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">{{__('master.ENGLISH')}}</a>
                        <a class="mx-4" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">{{__('master.ARABIC')}}</a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- JAVASCRIPT -->
        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
        <!-- App js -->
        <script src="{{asset('assets/js/app.js')}}"></script>
    </body>

</html>