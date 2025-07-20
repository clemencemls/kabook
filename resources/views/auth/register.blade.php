@extends('layouts.app')

@section('content')

                       <!-- Section formulaire -->
                       <section class="d-flex justify-content-center align-items-center vh-100">
      <div class="container bloclogin border rounded-5 py-5 px-5" style="max-width: 500px;">

        <div class="title text-start pb-4">
          <h1 class="fs-3">Inscrivez-vous à Kabook</h1>
          <p class="text-muted mb-0">
            Créez un compte professionnel gratuitement en quelques étapes ou
            <a href="{{ route('login') }}" style="color: #fe8b84; text-decoration: underline;">connectez-vous</a>
          </p>
        </div>

        <form id="myForm" action="{{ route('DoRegister') }}" method="POST">
          @csrf

          <div class="mb-3 text-start">
            <label for="email" class="form-label">Adresse mail</label>
            <input type="text" class="form-control" id="email" name="email" required />
          </div>

          <div class="mb-3 text-start">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required />
          </div>

          <div class="mb-3 text-start">
            <label for="password_confirmation" class="form-label">Confirmation du mot de passe</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required />
          </div>
          @if ($errors->has('email'))
            <div class="error">{{ $errors->first('email') }}</div>
        @endif

          <div class="mb-3 text-start">
            <p class="small mb-2 cond">
              En créant un compte, vous acceptez nos conditions générales d'utilisation.
            </p>
          </div>
          <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary px-4 btn-custom">S'inscrire</button>
          </div>
        </form>
      </div>
    </section>

    <section class="text-center mt-3">
      <p class="rights text-muted">
        ©2025 Intuit Inc. Tous droits réservés. Kabook® est une marque déposée de Kabook Group.
        Préférences en matière de cookies, Confidentialité et Conditions générales.
      </p>
    </section>
@endsection
