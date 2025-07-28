<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('Admin/assets/admin/images/favicon.ico')); ?>">
    <link href="<?php echo e(asset('Admin/assets/admin/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('Admin/assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('Admin/assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('Admin/assets/admin/css/bootstrap.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('Admin/assets/admin/css/icons.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('Admin/assets/admin/css/app.min.css')); ?>" rel="stylesheet" />
     <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    < <!-- Favicon & CSS librairies existantes -->
    <link href="<?php echo e(asset('Admin/assets/admin/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('Admin/assets/admin/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('Admin/assets/admin/css/app.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
      <?php echo $__env->yieldPushContent('styles'); ?>
    </head>

    <body data-topbar="dark">
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <?php echo $__env->make("Etudiant.partials.nav", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <!-- ========== Left Sidebar Start ========== -->
            <?php echo $__env->make('Etudiant.partials.Leftsidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <?php echo $__env->yieldContent('content'); ?>
                <!-- End Page-content -->
               
                <?php echo $__env->make('Etudiant.partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
         <?php echo $__env->make('Etudiant.partials.Rightsidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
         <script src="<?php echo e(asset('Admin/assets/admin/libs/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('Admin/assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('Admin/assets/admin/libs/metismenu/metisMenu.min.js')); ?>"></script>
    <script src="<?php echo e(asset('Admin/assets/admin/libs/simplebar/simplebar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('Admin/assets/admin/libs/node-waves/waves.min.js')); ?>"></script>
    <script src="<?php echo e(asset('Admin/assets/admin/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('Admin/assets/admin/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('Admin/assets/admin/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js')); ?>"></script>
    <script src="<?php echo e(asset('Admin/assets/admin/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('Admin/assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('Admin/assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('Admin/assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('Admin/assets/admin/js/pages/dashboard.init.js')); ?>"></script>
    <script src="<?php echo e(asset('Admin/assets/admin/js/app.js')); ?>"></script>
      <?php echo $__env->yieldPushContent('scripts'); ?>
    </body>

</html><?php /**PATH C:\xampp\htdocs\PROJECTS\GestionCour\resources\views/Etudiant/layout.blade.php ENDPATH**/ ?>