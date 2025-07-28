<div class="vertical-menu sidebar">
  <div data-simplebar class="h-100">

    <!-- User details -->
    <div class="user-profile text-center mt-3">
      <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->prenom }} {{ Auth::user()->nom }}"
           class="avatar-md rounded-circle mx-auto d-block">
      <div class="mt-3">
        <h4 class="font-size-16 mb-1">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</h4>
        <span class="text-muted">
          <i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
          Online
        </span>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <div id="sidebar-menu">
      <ul class="metismenu list-unstyled" id="side-menu">

        <!-- Navigation -->
        <li class="menu-title">Navigation</li>

        <li>
          <a href="{{ route('etudiant.dashboard') }}" class="waves-effect">
            <i class="ri-home-4-line icon-dashboard"></i>
            <span>Accueil</span>
          </a>
        </li>

        <li>
          <a href="{{ route('etudiant.modules.index') }}" class="waves-effect">
            <i class="ri-book-2-line icon-modules"></i>
            <span>Modules</span>
          </a>
        </li>

        <li>
          <a href="{{ route('etudiant.supports.index') }}" class="waves-effect">
            <i class="ri-folder-2-line icon-supports"></i>
            <span>Ressources</span>
          </a>
        </li>

        <li>
          <a href="{{ route('etudiant.favoris.index') }}" class="waves-effect">
            <i class="ri-heart-line icon-favorites"></i>
            <span>Mes favoris</span>
          </a>
        </li>

        <!-- Mon espace -->
        <li class="menu-title">Mon espace</li>

        <li>
          <a href="{{ route('etudiant.compte.show') }} " class="waves-effect">
            <i class="ri-user-line icon-account"></i>
            <span>Mon compte</span>
          </a>
        </li>

<li>
  <form method="POST" action="#">
    @csrf
    <button type="submit" class="waves-effect border-0 bg-transparent text-start w-100 px-3 py-2 d-flex align-items-center">
      <i class="ri-shut-down-line me-2 text-danger"></i>
      <span class="text-danger">Se déconnecter</span>
    </button>
  </form>
</li>


      </ul>
    </div>
    <!-- end sidebar-menu -->

  </div>
</div>
