<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('Admin/assets/admin/images/favicon.ico') }}">
    <link href="{{ asset('Admin/assets/admin/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('Admin/assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('Admin/assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('Admin/assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('Admin/assets/admin/css/icons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('Admin/assets/admin/css/app.min.css') }}" rel="stylesheet" />
     <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    < <!-- Favicon & CSS librairies existantes -->
    <link href="{{ asset('Admin/assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Admin/assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('Admin/assets/admin/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
      @stack('styles')
    </head>

    <body data-topbar="dark">
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            @include("Etudiant.partials.nav")

            <!-- ========== Left Sidebar Start ========== -->
            @include('Etudiant.partials.Leftsidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                @yield('content')
                <!-- End Page-content -->
               
                @include('Etudiant.partials.footer')
                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
         @include('Etudiant.partials.Rightsidebar')
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
         <script src="{{ asset('Admin/assets/admin/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/admin/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/admin/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/admin/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/admin/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/admin/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/admin/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>
    <script src="{{ asset('Admin/assets/admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('Admin/assets/admin/js/pages/dashboard.init.js') }}"></script>
    <script src="{{ asset('Admin/assets/admin/js/app.js') }}"></script>
      @stack('scripts')
    </body>

</html>