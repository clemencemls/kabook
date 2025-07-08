<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Kabook')</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    @vite('resources/css/custom.css')
  </head>
  <!-- utilisation de choices pour les formulaires -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

  <body class="color">
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid px-4">
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="" alt="Kabook" height="" />
        </a>
        <div class="ms-auto">
          <a href="{{ route('login') }}" class="btn btn-outline-primary btn-login btn1">Se connecter</a>
          <a href="{{ route('register') }}" class="btn btn-primary btn-custom btn2">S'inscrire</a>
        </div>
      </div>
    </nav>
    <div class="container mt-4">
        <br>
        <br>
        <br>
  @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
