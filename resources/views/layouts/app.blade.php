<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Kabook')</title>

    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Choices -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"
    />
    <!-- CSS -->
    @vite('resources/css/custom.css')
  </head>

  <body class="color">
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid px-4">
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="{{ asset('images/paw.png') }}"alt="Kabook" height="20" />
        </a>

        @auth
            @if (auth()->user()->role === 'admin')
                <div class="ms-auto d-flex align-items-center gap-3">
                        <div class="dropdown">
                          <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                          >
                            Mon compte
                          </a>
                          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Mon dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('categories') }}">Les catégories</a></li>
                            <li><a class="dropdown-item" href="">Paramètres</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Déconnexion</a></li>
                          </ul>
                        </div>
                        <a href="{{ route('home') }}" class="btn btn-primary btn-custom btn2">Trouver un pro</a>
                      </div>
              @else
                  <div class="ms-auto d-flex align-items-center gap-3">
                    <div class="dropdown">
                      <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        Mon compte
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('monprofil') }}">Mon profil</a></li>
                        <li><a class="dropdown-item" href="{{ route('parametre') }}">Paramètres</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Déconnexion</a></li>
                      </ul>
                    </div>
                    <a href="{{ route('home') }}" class="btn btn-primary btn-custom btn2">Trouver un pro</a>
                  </div>
              @endif
        @else
              <div class="ms-auto d-flex align-items-center gap-3">
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-login btn1">Se connecter</a>
                <a href="{{ route('register') }}" class="btn btn-primary btn-custom btn2">S'inscrire</a>
              </div>
        @endauth
      </div>
    </nav>

    <div class="container mt-5 pt-5">
      @yield('content')
    </div>

    <!-- Choices -->
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
