@extends('layouts.app')

@section('content')

       <!-- Section formulaire -->
       <section class="d-flex justify-content-center align-items-center vh-100">
          <div class="container border py-5 px-5 bloclogin rounded-5" style="max-width: 500px;">
            <div class="title pb-4 text-start">
              <h1 class="fs-3">Inscrivez-vous à Kabook</h1>
              <h6 class="text-muted">Créez un compte professionnel gratuitement en quelques étapes ou <a href="{{ route('login') }}" style="color: #fe8b84; text-decoration: underline;">connectez-vous</a></h6>
            </div>

            <form id="myForm" action="{{ route('DoRegister') }}" method="POST">
            @csrf
              <div class="mb-3 text-start">
                <label for="email" class="form-label">Adresse mail</label>
                <input type="text" class="form-control" id="email" name="email" required />
                <div id="error_email" class="error"></div>
              </div>

              <div class="mb-3 text-start">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required />
                <div id="error_password_hash" class="error"></div>
              </div>

              <div class="mb-3 text-start">
                <label for="password" class="form-label">Confirmation du mot de passe</label>
                <input type="password" class="form-control" id="password" name="password_confirmation"required />
                <div id="error_password_hash" class="error"></div>
              </div>

              <div class="mb-3 text-start">
                <p class="small mb-2 cond">En créant un compte, vous acceptez nos conditions générales d'utilisation.</p>
                <br>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="no_emails" name="no_emails" value="1" />
                  <label for="no_emails" class="form-check-label">
                    Je ne souhaite pas recevoir d’e-mails de la part de Kabook.
                    En ne cochant pas la case, j’accepte d’être inscrit par défaut.
                  </label>
                </div>
              </div>

              <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-4 btn-custom ">S'inscrire</button>
              </div>
            </form>
          </div>
        </section>
        <section class="text-center">
      <h6 class="rights"> ©2025 Intuit Inc. Tous droits réservés. Kabook® est une marque déposée de Kabook Group, Préférences en matière de cookies, Confidentialité et Conditions générales</h6>
    </section>
        <style>
      .error {
        color: #fe8b84;
        font-size: 0.875rem; /* un peu plus petit que le texte normal */
        margin-top: 0.25rem; /* petit espace au-dessus */
        padding-left: 0.5rem; /* léger décalage pour l'alignement */
        font-style: italic;
      }

      .cond {
        font-size:0.7rem;
        font-style: italic;
      }

      .form-check-label{
        font-size:0.8rem;
      }
        </style>



@endsection
