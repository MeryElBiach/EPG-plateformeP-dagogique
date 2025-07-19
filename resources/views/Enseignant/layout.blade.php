<!DOCTYPE html>
<html lang="en">
  <head>
   <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Star Admin2</title>

<!-- plugins:css -->
<link rel="stylesheet" href="{{ asset('user/assets/vendors/feather/feather.css') }}">
<link rel="stylesheet" href="{{ asset('user/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('user/assets/vendors/ti-icons/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('user/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('user/assets/vendors/typicons/typicons.css') }}">
<link rel="stylesheet" href="{{ asset('user/assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
<link rel="stylesheet" href="{{ asset('user/assets/vendors/css/vendor.bundle.base.css') }}">
<link rel="stylesheet" href="{{ asset('user/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
<!-- endinject -->

<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('user/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('user/assets/js/select.dataTables.min.css') }}">
<!-- End plugin css for this page -->

<!-- inject:css -->
<link rel="stylesheet" href="{{ asset('user/assets/css/style.css') }}">
<!-- endinject -->
<link rel="shortcut icon" href="{{ asset('user/assets/images/favicon.png') }}">
  </head>
  <body class="with-welcome-text">
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
       @include('Enseignant.partials.nav')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
       @include('Enseignant.partials.sidebar')
        <!-- partial -->
      
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   <script src="{{ asset('user/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('user/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="{{ asset('user/assets/vendors/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('user/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{ asset('user/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('user/assets/js/template.js') }}"></script>
<script src="{{ asset('user/assets/js/settings.js') }}"></script>
<script src="{{ asset('user/assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('user/assets/js/todolist.js') }}"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="{{ asset('user/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
<script src="{{ asset('user/assets/js/dashboard.js') }}"></script>
{{-- <script src="{{ asset('user/assets/js/Chart.roundedBarCharts.js') }}"></script> --}}
<!-- End custom js for this page -->

  </body>
</html>