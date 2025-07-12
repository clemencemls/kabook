@extends('layouts.app')

@section('content')


    <section class="d-flex justify-content-center align-items-center vh-100">
      <div class="container border py-5 px-5 bloclogin rounded-5" style="max-width: 500px;">
        <div class="title pb-4 text-start">
          <h1 class="fs-3">Création de votre profil professionnel en 4 étapes</h1>
          <br>
          <h6 class="text-muted">Etape 1 - Informations générales</h6>
          <h6 class="text-muted">Vous pourrez modifier toutes ces informations ultérieurement.</h6>
        </div>

        <form id="myForm" action="{{ route('DoregisterStep1') }}" method="POST">
          @csrf

          <div class="mb-3 text-start">
            <label for="lastname" class="form-label">Quel est votre nom ?</label>
            <input type="text" class="form-control" id="lastname" name="last_name" required />
            <div id="error_email" class="error"></div>
          </div>

          <div class="mb-3 text-start">
            <label for="firstname" class="form-label">Quel est votre prénom ?</label>
            <input type="text" class="form-control" id="firstname" name="first_name" required />
            <div id="error_password_hash" class="error"></div>
          </div>

          <div class="mb-3 text-start">
            <label for="phone" class="form-label">À quel numéro de téléphone peut-on vous joindre ?</label>
            <input type="tel" class="form-control" id="phone" name="phone" required />
          </div>

          <div class="mb-3 text-start">
            <label for="job_categories" class="form-label">Quelles sont vos activités ?</label>
            <select name="job_categories[]" id="job_categories" multiple class="form-select" required>
              @foreach ($jobcategories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-3 text-start">
            <label for="animal_categories" class="form-label">Quels animaux prenez-vous en charge ?</label>
            <select name="animal_categories[]" id="animal_categories" multiple class="form-select" required>
              @foreach ($animalcategories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>

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

                            <!-- Pour le formulaire -->
                            <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            new Choices('#job_categories', {
                                removeItemButton: true, // Ajoute un petit bouton × à côté de chaque élément sélectionné
                                placeholderValue: 'Sélectionnez une ou plusieurs activités',//Affiche un texte gris quand rien n'est encore sélectionné.
                                searchEnabled: true, //Active une petite barre de recherche dans le champ
                                shouldSort: false // pas de tri par ordre alphabetique
                            });

                            new Choices('#animal_categories', {
                    removeItemButton: true,
                    placeholderValue: 'Sélectionnez une ou plusieurs espèces',
                    searchEnabled: true,
                    shouldSort: false
                });
                        });
                    </script>

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
