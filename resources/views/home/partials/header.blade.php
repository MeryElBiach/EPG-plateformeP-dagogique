<header>
  <div class="logo-container">
    <a href="{{ url('/') }}" class="logo">
      <img src="{{ asset('home/assets/images/epg.png') }}" alt="Logo LearnWise" class="logo-img">
    </a>
  </div>

  <!-- Barre de navigation -->
  <nav>
    <ul class="navbar">
      <li><a href="#home">Accueil</a></li>
      <li><a href="#courses">Cours</a></li>
      <li><a href="#testimonials">Témoignages</a></li>
      <li><a href="#about">À propos</a></li>
    </ul>
  </nav>

  <div class="header-button">
    <span class="sign">
      <a href="{{ route('login') }}">
        <span style="
            color:rgb(17, 4, 134);
            font-weight: bold;
            border: 2px solid rgb(17, 4, 134);
            padding: 6px 16px;
            border-radius: 5px;
            transition: 0.3s;
            display: inline-block;
        ">
          Se connecter
        </span>
      </a>
    </span>

    <a href="{{ route('register') }}">
      <button class="btn-primary">S'inscrire</button>
    </a>
    
    <div class="bx bx-menu" id="menu-icon" style="padding-left: 15px"></div>
  </div>
</header>
