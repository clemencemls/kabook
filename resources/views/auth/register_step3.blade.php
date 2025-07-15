@extends('layouts.app')

@section('content')

    <!-- Section formulaire -->
    <section class="d-flex justify-content-center align-items-center vh-100">
      <div class="container border py-5 px-5 bloclogin rounded-5" style="max-width: 500px;">
        <div class="title pb-4 text-start">
          <h1 class="fs-3">Création de votre profil professionnel en 4 étapes</h1>
          <br>
          <h6 class="text-muted">Étape 3 - Localisation</h6>
        </div>

        <form id="myForm" action="{{ route('DoregisterStep3') }}" method="POST">
          @csrf

          <div class="mb-3 text-start">
            <label class="form-label d-block">Est-ce que vous vous déplacez chez vos clients ? *</label>
          <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="is_mobile" id="mobile_yes" value="1" required>
              <label class="form-check-label" for="mobile_yes">Oui</label>
            </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="is_mobile" id="mobile_no" value="0">
              <label class="form-check-label" for="mobile_no">Non</label>
            </div>


          <div class="mb-3 text-start">
            <label for="job_categories" class="form-label">Veuillez saisir votre département. Si vous êtes mobiles, selectionner tous ceux dans lequel vous vous déplacez. *</label>
            <select name="departments[]" id="departments" multiple class="form-select" required>
              @foreach ($departments as $dep)
                <option value="{{ $dep->id }}">{{ $dep->name }}</option>
              @endforeach
            </select>
          </div>


          <div class="mb-3 text-start">
            <label for="city" class="form-label">Dans quelle ville habitez-vous ? *</label>
            <input type="text" class="form-control" id="city" name="city" required/>
            <div id="error_city" class="error"></div>
          </div>

          <div class="mb-3 text-start">
            <label for="postal_code" class="form-label">Veuillez saisir le code postal. *</label>
            <input type="text" class="form-control" id="postal_code" name="postal_code" required />
            <div id="error_postal_code" class="error"></div>
          </div>

          <div class="mb-3 text-start">
            <label for="address" class="form-label">À quelle adresse exercez-vous votre activité (facultatif) ?</label>
            <input type="text" class="form-control" id="address" name="address" />
            <div id="error_address" class="error"></div>
          </div>


            <!--
            <label for="departments">Si oui, sélectionnez les départements dans lesquels vous vous déplacez :</label>
            <select multiple name="departements" id="departments">
              <option>Ile de France</option>
              <option>Yvelines</option>
            </select>
            -->
            <p>* Champs obligatoires</p>

          <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary px-4 btn-custom">Valider l'inscription</button>
          </div>
        </form>
      </div>
    </section>
    <br>
    <br>

    <section class="text-center">
      <h6 class="rights">
        ©2025 Intuit Inc. Tous droits réservés. Kabook® est une marque déposée de Kabook Group,
        Préférences en matière de cookies, Confidentialité et Conditions générales
      </h6>
    </section>

                                <!-- Pour le formulaire -->
                                <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            new Choices('#departments', {
                                removeItemButton: true, // Ajoute un petit bouton × à côté de chaque élément sélectionné
                                placeholderValue: 'Sélectionnez un ou plusieurs départements',//Affiche un texte gris quand rien n'est encore sélectionné.
                                searchEnabled: true, //Active une petite barre de recherche dans le champ
                                shouldSort: false // pas de tri par ordre alphabetique
                            });


                        });
                    </script>
@endsection
