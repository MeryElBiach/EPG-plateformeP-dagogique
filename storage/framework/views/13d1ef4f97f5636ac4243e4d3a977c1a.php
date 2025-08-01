<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title d-flex align-items-center px-3 py-4">
            <h5 class="m-0 me-2">Settings</h5>

            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
        </div>

        <!-- Settings -->
        <hr class="mt-0" />
        <h6 class="text-center mb-0">Choose Layouts</h6>

        <div class="p-4">
            <!-- Layout 1 -->
            <div class="mb-2">
                <img src="<?php echo e(asset('Admin/assets/admin/images/layouts/layout-1.jpg')); ?>" class="img-fluid img-thumbnail" alt="layout-1">
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                <label class="form-check-label" for="light-mode-switch">Light Mode</label>
            </div>

            <!-- Layout 2 -->
            <div class="mb-2">
                <img src="<?php echo e(asset('Admin/assets/admin/images/layouts/layout-2.jpg')); ?>" class="img-fluid img-thumbnail" alt="layout-2">
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch"
                       data-bsStyle="<?php echo e(asset('Admin/assets/admin/css/bootstrap-dark.min.css')); ?>"
                       data-appStyle="<?php echo e(asset('Admin/assets/admin/css/app-dark.min.css')); ?>">
                <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
            </div>

            <!-- Layout 3 -->
            <div class="mb-2">
                <img src="<?php echo e(asset('Admin/assets/admin/images/layouts/layout-3.jpg')); ?>" class="img-fluid img-thumbnail" alt="layout-3">
            </div>
            <div class="form-check form-switch mb-5">
                <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch"
                       data-appStyle="<?php echo e(asset('Admin/assets/admin/css/app-rtl.min.css')); ?>">
                <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
            </div>
        </div>
    </div> <!-- end slimscroll-menu-->
</div>
<?php /**PATH C:\xampp\htdocs\PROJECTS\GestionCour\resources\views/Admin/partials/Rightsidebar.blade.php ENDPATH**/ ?>