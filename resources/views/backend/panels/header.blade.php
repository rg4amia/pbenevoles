<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
     <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
     <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
     <meta name="author" content="agenceemploi">

     <title>
        @yield('title')
     </title>

     <link rel="apple-touch-icon" href="{{asset('assets/img/logo-oscn.png')}}">
     <link rel="shortcut icon" type="image/x-icon" href="{{asset('logo.png')}}">
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/vendors/css/forms/select/select2.min.css') }}">
     <!-- BEGIN: Vendor CSS-->
     <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/vendors/css/vendors.min.css') }}">
     {{--<link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/vendors/css/charts/apexcharts.css') }}">--}}
     <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/vendors/css/extensions/toastr.min.css') }}">
     <!-- END: Vendor CSS-->

    {{--table--}}
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css') }}">

     <!-- BEGIN: Theme CSS-->
     <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/bootstrap.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/bootstrap-extended.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/colors.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/components.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/themes/dark-layout.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/themes/bordered-layout.css') }}">

     <!-- BEGIN: Page CSS-->
     <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/core/menu/menu-types/horizontal-menu.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/pages/dashboard-ecommerce.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/plugins/charts/chart-apex.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <!-- END: Page CSS-->

     <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/vendors/css/extensions/sweetalert2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/plugins/extensions/ext-component-sweet-alerts.css') }}">
    <!-- END: Custom CSS-->

     <!-- BEGIN: Custom CSS-->
     <link rel="stylesheet" type="text/css" href="{{ asset('backend_assets/css/style.css') }}">
     <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">

