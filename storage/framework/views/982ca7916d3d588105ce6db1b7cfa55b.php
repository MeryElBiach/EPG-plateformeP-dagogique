<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex align-items-center">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="logo logo-light d-flex align-items-center">
                    <img src="<?php echo e(asset('home/assets/images/epg.png')); ?>" alt="logo" height="32">
                    <span class="ms-2 fw-bold text-white">EPG Admin</span>
                </a>
            </div>

            <!-- Sidebar toggle button -->
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

            <!-- Search -->
            <form class="app-search d-none d-lg-block ms-3">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Rechercher...">
                    <span class="ri-search-line"></span>
                </div>
            </form>
        </div>

        <div class="d-flex align-items-center">
            <!-- Notifications -->
            <div class="dropdown d-inline-block me-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ri-notification-3-line"></i>
                    <span class="noti-dot"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg p-0">
                    <div class="p-3">
                        <h6 class="mb-0">Notifications</h6>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="#" class="text-reset notification-item">
                            <div class="d-flex align-items-start">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="ri-file-line"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Nouveau support ajouté</h6>
                                    <small class="text-muted">Il y a 10 minutes</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- User dropdown -->
            <div class="dropdown user-dropdown">
                <button type="button" class="btn header-item waves-effect d-flex align-items-center"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?php echo e(asset('Admin/assets/admin/images/users/PhotoAdmin.jpg')); ?>" alt="Avatar">
                    <span class="d-none d-xl-inline-block ms-2">Admin</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block ms-1"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#"><i class="ri-user-line me-1"></i> Profil</a>
                    <a class="dropdown-item" href="#"><i class="ri-settings-2-line me-1"></i> Paramètres</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="ri-shut-down-line me-1 text-danger"></i> Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<?php /**PATH C:\xampp\htdocs\PROJECTS\GestionCour\resources\views/Admin/partials/header.blade.php ENDPATH**/ ?>