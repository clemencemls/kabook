@extends('layouts.app')

@section('content')


    <div class="left-border"></div>
        <section class="d-flex justify-content-center align-items-center vh-100">
      <div class="container w-25 border py-5 px-5 bloclogin text-center rounded-5">
        <div class="title pb-5">
          <h2 class="fw-bold">Connexion</h2>
          <h6 class="text-muted">
      Vous avez besoin d’un compte ?
      <a href="{{ route('register') }}" style="color: #fe8b84; text-decoration: underline;">Créer un compte</a>
    </h6>


        </div>

          <form id="myForm" action="{{ route('DoLogin') }}" method="POST" class="login">
          @csrf
          <div class="mb-3 text-start">
                <label for="email" class="form-label">Adresse e-mail</label>
                <input type="text" class="form-control" id="email" name="email" required autofocus/>
              </div>

              <div class="mb-3 text-start">
                <label for="password_hash" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required/>
                @error('email')
                    <div>{{ $message }}</div>
                @enderror
              </div>

          <br />
          <button type="submit" class="btn btn-success btn-custom">
           Connexion
          </button>
        </form>
      </div>
    </section>

    <section class="text-center">
      <h6 class="rights"> ©2025 Intuit Inc. Tous droits réservés. Kabook® est une marque déposée de Kabook Group, Préférences en matière de cookies, Confidentialité et Conditions générales</h6>
    </section>


@endsection
