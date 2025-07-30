@extends('layouts.app')

@section('content')

      <form id="myForm" action="{{ route('update.infos') }}" method="POST">
        @csrf
        @method('PUT')

        <h1>Modifier mes informations générales :</h1>
        <br>

        <!-- Nom de l'entreprise -->
        <div class="mb-3 text-start">
          <label for="company_name" class="form-label">Le nom de votre entreprise</label>
          <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $professional->company_name }}" required />
        </div>

        <!-- Nom -->
        <div class="mb-3 text-start">
          <label for="lastname" class="form-label">Votre nom</label>
          <input type="text" class="form-control" id="lastname" name="last_name" value="{{ $professional->last_name }}" required />
        </div>

        <!-- Prénom -->
        <div class="mb-3 text-start">
          <label for="firstname" class="form-label">Votre prénom</label>
          <input type="text" class="form-control" id="firstname" name="first_name" value="{{ $professional->first_name }}" required />
        </div>

        <!-- Activités -->
        <div class="mb-3 text-start">
          <label for="job_categories" class="form-label">Votre ou vos activités</label>
          <select name="job_categories[]" id="job_categories" multiple class="form-select" required>
            @foreach ($jobcategories as $category)
                  <option value="{{ $category->id }}"
                    @if ($professional->jobCategories->contains($category->id)) selected @endif>
                    {{ $category->name }}
                  </option>
            @endforeach
          </select>
        </div>

        <!-- Animaux pris en charge -->
        <div class="mb-3 text-start">
          <label for="animal_categories" class="form-label">Les animaux que vous prenez en charge</label>
          <select name="animal_categories[]" id="animal_categories" multiple class="form-select" required>
            @foreach ($animalcategories as $category)
                  <option value="{{ $category->id }}"
                    @if ($professional->animalCategories->contains($category->id)) selected @endif>
                    {{ $category->name }}
                  </option>
            @endforeach
          </select>
        </div>

        <!-- Mobilité -->
        <div class="mb-3 text-start">
          <label class="form-label d-block">Est-ce que vous vous déplacez chez vos clients ?</label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="is_mobile" id="mobile_yes" value="1" {{ $professional->is_mobile == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="mobile_yes">Oui</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="is_mobile" id="mobile_no" value="0" {{ $professional->is_mobile == 0 ? 'checked' : '' }}>
            <label class="form-check-label" for="mobile_no">Non</label>
          </div>
        </div>

        <!-- Boutons -->
        <div class="text-center mt-4">
          <a href="{{ route('monprofil') }}" class="btn btn-primary px-4 btn-custom">Retour</a>
          <button type="submit" class="btn btn-primary px-4 btn-custom">Enregistrer</button>
        </div>
      </form>

      <!-- Script Choices.js -->
      <script>
        document.addEventListener('DOMContentLoaded', function () {
          new Choices('#job_categories', {
            removeItemButton: true,
            placeholderValue: 'Sélectionnez une ou plusieurs activités',
            searchEnabled: true,
            shouldSort: false
          });

          new Choices('#animal_categories', {
            removeItemButton: true,
            placeholderValue: 'Sélectionnez une ou plusieurs espèces',
            searchEnabled: true,
            shouldSort: false
          });
        });
      </script>

@endsection
