<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    
    <!-- Fonts -->
    <link href="{{ asset('css/admin/style.min.css') }}" rel="stylesheet">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/multicheck.css') }}">
    <link href="{{ asset('css/admin/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/quill.snow.css') }}">
    <link href="{{ asset('css/admin/float-chart.css') }}" rel="stylesheet">


    <!-- Scripts -->
    <script src="{{ asset('js/admin/admin-form-validate.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('js/admin/popper.min.js') }}"></script>
    <script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
    

    <script src="{{ asset('js/admin/jquery.ui.touch-punch-improved.js') }}"></script>
    <script src="{{ asset('js/admin/jquery-ui.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('js/admin/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('js/admin/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('js/admin/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('js/admin/custom.min.js') }}"></script>

    <!-- this page js -->
    <script src="{{ asset('js/admin/moment.min.js') }}"></script>
    <script src="{{ asset('js/admin/excanvas.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.flot.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('js/admin/chart-page-init.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/admin/custom.js') }}"></script>
    <script src="{{ asset('js/admin/datatables.min.js') }}"></script>
    
    <script src="{{ asset('js/admin/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('js/admin/mask.init.js') }}"></script>
    <script src="{{ asset('js/admin/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/admin/select2.min.js') }}"></script>
    <script src="{{ asset('js/admin/quill.min.js') }}"></script>
    <script src="{{ asset('js/admin/ckeditor.js') }}"></script>


</head>