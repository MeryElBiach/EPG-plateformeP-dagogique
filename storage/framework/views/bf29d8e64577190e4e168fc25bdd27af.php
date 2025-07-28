
<header id="page-topbar"
        style="background: linear-gradient(to right, #0b2367ff, #2f6df3ff, #fa6f0bff);">
    <div class="navbar-header">
        <div class="d-flex align-items-center">

            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href=""
                   class="logo logo-light d-flex align-items-center">
                    <img src="<?php echo e(asset('home/assets/images/epg.png')); ?>"
                         alt="logo" height="32">
                    <span class="ms-2 fw-bold text-white">
                    </span>
                </a>
            </div>

            <!-- Sidebar toggle button -->
            <button type="button"
                    class="btn btn-sm px-3 font-size-24 header-item waves-effect text-white"
                    id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

            <!-- Search (affiché sur lg et +) -->
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
                <button type="button"
                        class="btn header-item noti-icon waves-effect text-white position-relative"
                        id="page-header-notifications-dropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ri-notification-3-line"></i>
                    <span class="noti-dot bg-danger"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg p-0">
                    <div class="p-3 border-bottom">
                        <h6 class="mb-0">Notifications</h6>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        
                        <a href="#" class="text-reset notification-item d-flex align-items-start px-3 py-2">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title bg-success rounded-circle font-size-16">
                                    <i class="ri-file-line"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">Nouveau support ajouté</h6>
                                <small class="text-muted">Il y a 10 minutes</small>
                            </div>
                        </a>
                        
                    </div>
                </div>
            </div>

            <!-- User dropdown -->
            <div class="dropdown user-dropdown">
                <button type="button"
                        class="btn header-item waves-effect d-flex align-items-center text-white"
                        id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                         src="<?php echo e(asset('storage/' . Auth::user()->avatar)); ?>"
                         alt="Avatar" height="32">
                    <span class="d-none d-xl-inline-block ms-2">
                        <?php echo e(Auth::user()->prenom); ?> <?php echo e(Auth::user()->nom); ?>

                    </span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block ms-1"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="">
                        <i class="ri-user-line me-1"></i> Profil
                    </a>
                    <a class="dropdown-item" href="">
                        <i class="ri-settings-2-line me-1"></i> Paramètres
                    </a>
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
<?php /**PATH C:\xampp\htdocs\PROJECTS\GestionCour\resources\views/Etudiant/partials/nav.blade.php ENDPATH**/ ?>