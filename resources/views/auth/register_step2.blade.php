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

            <form id="myForm" action="{{ route('DoregisterStep2') }}" method="POST">
            @csrf
              <div class="mb-3 text-start">
                <label for="company_name" class="form-label">Quel est le nom public de votre structure?</label>
                <input type="text" class="form-control" id="company_name" name="company_name" required />
                <div id="error_company_name" class="error"></div>
              </div>

              <div class="mb-3 text-start">
                <label for="siret" class="form-label">Quel est votre numéro de SIRET ?</label>
                <input type="siret" class="form-control" id="siret" name="siret"/>
                <div id="error_siret" class="error"></div>
              </div>


              <div class="mb-3 text-start">
                <label for="description" class="form-label"> Décrivez votre activité et vos services en quelques mots.</label>
                <input type="description" class="form-control" id="description" name="description" required />
                <div id="error_description" class="error"></div>
              </div>

              <div class="mb-3 text-start">
                <label for="education_background" class="form-label"> Décrivez vos formations.</label>
                <input type="text" class="form-control" id="education_background" name="education_background"/>
                <div id="error_education_background" class="error"></di>
              </div>

              <div class="mb-3 text-start">
                <label for="experience_background" class="form-label"> Décrivez votre parcours.</label>
                <input type="text" class="form-control" id="experience_background" name="experience_background"/>
                <div id="error_experience_background" class="error"></div>
              </div>

              <div class="mb-3 text-start">

              <div class="text-center mt-4">
              <button action={{ route('register.step1') }}type="submit" class="btn btn-primary px-4 btn-custom ">Précedent</button>
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
