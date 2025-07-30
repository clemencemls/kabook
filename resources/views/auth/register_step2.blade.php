@extends('layouts.app')

@section('content')

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
            <label for="company_name" class="form-label">Quel est le nom public de votre structure? *</label>
            <input type="text" class="form-control" id="company_name" name="company_name" required>
          </div>

          <div class="mb-3 text-start">
            <label for="siret" class="form-label">Quel est votre numéro de SIRET ?</label>
            <input type="text" class="form-control" id="siret" name="siret">
          </div>

          <div class="mb-3 text-start">
            <label for="description" class="form-label"> Décrivez votre activité et vos services en quelques mots. *</label>
            <input type="text" class="form-control" id="description" name="description" required>
          </div>

          <div class="mb-3 text-start">
            <label for="education_background" class="form-label"> Décrivez vos formations.</label>
            <input type="text" class="form-control" id="education_background" name="education_background">
          </div>

          <div class="mb-3 text-start">
            <label for="experience_background" class="form-label"> Décrivez votre parcours.</label>
            <input type="text" class="form-control" id="experience_background" name="experience_background">
          </div>

          <p>* Champs obligatoires</p>

          <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary px-4 btn-custom">Suivant</button>
          </div>
        </form>
      </div>
    </section>

    <section class="text-center">
      <h6 class="rights">
        ©2025 Intuit Inc. Tous droits réservés. Kabook® est une marque déposée de Kabook Group, Préférences en matière de cookies, Confidentialité et Conditions générales
      </h6>
    </section>

@endsection
