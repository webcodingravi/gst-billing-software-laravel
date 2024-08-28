<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>DASHBOARD</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- App favicon -->
  <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

  <!-- Plugins css -->
  <!-- <link href="assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" /> -->

  <!-- App css -->
  <link href="{{asset('assets/css2/bootstrap-creative.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
  <link href="{{asset('assets/css2/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

  <link href="{{asset('assets/css2/bootstrap-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet"
    disabled />
  <link href="{{asset('assets/css2/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"
    disabled />

  <!-- icons -->
  <link href="{{asset('assets/css2/icons.min.css')}}" rel="stylesheet" type="text/css" />

  <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>


  <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body data-layout-mode="detached"
  data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>
  <!-- Begin page -->
  <div id="wrapper">
    <!-- Topbar Start -->
    @include('layouts.navbar')
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    @include('layouts.sidebar')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
      <div class="content">
        @yield('content')
      </div>
     
    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
  </div>

  <!-- Right bar overlay-->
  <div class="rightbar-overlay"></div>

  <!-- Vendor js -->
  <script src="{{asset('assets/js2/vendor.min.js')}}"></script>

  <!-- Plugins js-->
  <script src="{{asset('assets/libs2/flatpickr/flatpickr.min.js')}}"></script>
  <script src="{{asset('assets/libs2/apexcharts/apexcharts.min.js')}}"></script>

  <!-- Dashboar 1 init js-->
  <script src="{{asset('assets/js2/pages/dashboard-1.init.js')}}"></script>

  <!-- App js-->
  <script src="{{asset('assets/js2/app.min.js')}}"></script>

  <script src="{{asset('js/1.js')}}"></script>
  <script src="{{asset('js/script.js')}}"></script>



  @yield('customJs')

  <script>
    setTimeout(() => {
   $("#alert-box").fadeOut('slow');
   }, 3000);
 
   
   </script>
</body>

</html>