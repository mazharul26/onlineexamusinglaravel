<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @php $me = Auth::user();
    @endphp

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Karooni') }}</title>

    <!-- Scripts -->
     

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
     

  <link rel="stylesheet" href="{{asset('css/w3.css')}}">
    <!-- Styles -->
    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('alte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('alte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('alte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('alte/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('alte/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('alte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('alte/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('alte/plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
  {{-- <link rel="stylesheet" href="{{asset('alte/plugins/jquery.dateentry/jquery.dateentry.css')}}"> --}}
     <style>    

  /*   .nav-sidebar>.nav-item {
    border-bottom: 1px solid #dfdfdf !important;
    }*/

    .nav-legacy.nav-sidebar .nav-item>.nav-link {
      border-top: 1px solid #dfdfdf !important;
    }
  </style>
  

  @stack('css')


</head>

 
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm control-sidebar-push-slide- " >
{{-- <body class="hold-transition sidebar-mini layout-fixed "> --}}
<div class="wrapper">


@include('layouts.header')
@include('layouts.leftsidebar')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     
     @yield('content')

  </div>
  <!-- /.content-wrapper -->


@include('layouts.footer')
@include('layouts.rightsidebar')


</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="{{asset('alte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('alte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('alte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('alte/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('alte/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('alte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('alte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('alte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('alte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('alte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('alte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('alte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('alte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('alte/dist/js/adminlte.js')}}"></script>
<script src="{{asset('alte/dist/js/pages/dashboard.js')}}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>


 <script type="text/javascript">
   $(function(){

    $('[data-widget="sidebar-search"]').SidebarSearch(['highlightClass':'text-green'])

   });
 </script>
  <script>
    @if(Session::has('success'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('success') }}");
    @endif
    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif
    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif
    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
  </script>
@stack('js')

</body>
</html>
