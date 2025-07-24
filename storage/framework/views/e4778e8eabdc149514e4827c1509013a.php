<div class="vertical-menu sidebar">
  <div data-simplebar class="h-100">

    <!-- User details -->
    <div class="user-profile text-center mt-3">
      <img src="<?php echo e(asset('Admin/assets/admin/images/users/PhotoAdmin.jpg')); ?>"
           alt="Avatar Admin" class="avatar-md rounded-circle mx-auto d-block">
      <div class="mt-3">
        <h4 class="font-size-16 mb-1">Lazrak Alae</h4>
        <span class="text-muted">
          <i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
          Online
        </span>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <div id="sidebar-menu">
      <ul class="metismenu list-unstyled" id="side-menu">

        <!-- Menu principal -->
        <li class="menu-title">Menu principal</li>
        <li>
          <a href="#" class="waves-effect">
            <i class="ri-dashboard-line icon-dashboard"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <!-- Gestion académique -->
        <li class="menu-title">Gestion académique</li>
        <li>
          <a href="<?php echo e(route('admin.formations.index')); ?>" class="waves-effect">
            <i class="ri-graduation-cap-line icon-formations"></i>
            <span>Formations</span>
          </a>
        </li>
        <li>
          <a href="<?php echo e(route('admin.modules.index')); ?>" class="waves-effect">
            <i class="ri-book-2-line icon-modules"></i>
            <span>Modules</span>
          </a>
        </li>
        <li>
          <a href="#" class="waves-effect">
            <i class="ri-folder-2-line icon-supports"></i>
            <span>Supports</span>
          </a>
        </li>

        <!-- Utilisateurs -->
        <li class="menu-title">Utilisateurs</li>
        <li>
          <a href="javascript:void(0);" class="has-arrow waves-effect">
            <i class="ri-user-3-line icon-users"></i>
            <span>Utilisateurs</span>
          </a>
          <ul class="sub-menu" aria-expanded="false">
            <li>
              <a href="#">
                <i class="ri-user-follow-line text-primary"></i>
                <span>Étudiants</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="ri-user-star-line text-success"></i>
                <span>Enseignants</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- Interaction -->
        <li class="menu-title">Interaction</li>
        <li>
          <a href="#" class="waves-effect">
            <i class="ri-chat-3-line icon-comments"></i>
            <span>Commentaires</span>
          </a>
        </li>
        <li>
          <a href="#" class="waves-effect">
            <i class="ri-bar-chart-line icon-stats"></i>
            <span>Statistiques</span>
          </a>
        </li>

      </ul>
    </div>
    <!-- end sidebar-menu -->

  </div>
</div>
<?php /**PATH C:\xampp\htdocs\PROJECTS\GestionCour\resources\views/Admin/partials/Leftsidebar.blade.php ENDPATH**/ ?>