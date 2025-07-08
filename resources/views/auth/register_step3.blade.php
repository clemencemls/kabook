@extends('layouts.app')

@section('content')

       <!-- Section formulaire -->
       <section class="d-flex justify-content-center align-items-center vh-100">
          <div class="container border py-5 px-5 bloclogin rounded-5" style="max-width: 500px;">
            <div class="title pb-4 text-start">
              <h1 class="fs-3">Création de votre profil professionnel en 4 étapes</h1>
              <br>
              <h6 class="text-muted"> Etape 2 - Informations générales</h6>
            </div>

            <form id="myForm" action="{{ route('DoRegister') }}" method="POST">
            @csrf
              <div class="mb-3 text-start">
                <label for="email" class="form-label">Quel est le nom public de votre structure?</label>
                <input type="text" class="form-control" id="email" name="email" required />
                <div id="error_email" class="error"></div>
              </div>

              <div class="mb-3 text-start">
                <label for="password" class="form-label">Quel est votre numéro de SIRET ?</label>
                <input type="password" class="form-control" id="password" name="password" required />
                <div id="error_password_hash" class="error"></div>
              </div>


              <div class="mb-3 text-start">
                <label for="password" class="form-label"> Décrivez votre activité, vos services en quelques mots.</label>
                <input type="password" class="form-control" id="password" name="password" required />
                <div id="error_password_hash" class="error"></div>
              </div>

              <div class="mb-3 text-start">
                <label for="password" class="form-label"> A quelle adresse exercez-vous votre activité (facultatif) ?</label>
                <input type="password" class="form-control" id="password" name="password"/>
                <div id="error_password_hash" class="error"></div>
              </div>

              <div class="mb-3 text-start">
                <label for="password" class="form-label"> Dans quelle ville vous vous situez ?</label>
                <input type="password" class="form-control" id="password" name="password"/>
                <div id="error_password_hash" class="error"></div>
              </div>

              <div class="mb-3 text-start">
                <label for="password" class="form-label">Veuillez saisir le code postal</label>
                <input type="password" class="form-control" id="password" name="password"/>
                <div id="error_password_hash" class="error"></div>
              </div>

              <div class="mb-3 text-start">

    <label class="form-label d-block">Proposez-vous vos services à distance ?</label>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="is_mobile" id="" value="1">
        <label class="form-check-label" for="mobile_yes">Oui</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="is_mobile" id="" value="0">
        <label class="form-check-label" for="mobile_no">Non</label>
    </div>

    <label for="departments">Si oui, sélectionnez les départements dans lesquels vous vous déplacez :</label>
    <select multiple name="departements" id="dwarfs">
      <option>Ile de France</option>
      <option>Yvelines</option>
    </select>

              <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-4 btn-custom ">Suivant</button>
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
