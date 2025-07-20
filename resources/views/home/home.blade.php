@extends('layouts.app')

@section('content')
    <section class="intro-section container my-5">
      <div class="row align-items-center">
        <div class="col-md-6 intro-image order-md-1 order-2">
          <img src="{{ asset('images/home.jpg') }}" alt="Professionnels du monde animalier" class="img-fluid rounded shadow img-principale">
        </div>
        <div class="col-md-6 intro-text order-md-2 order-1">
          <h2>Kabook, le premier annuaire des professionnels du monde animalier</h2>
          <p>
            Kabook est une plateforme qui met en relation les professionnels du milieu animalier et les propriétaires d'animaux. C'est le meilleur moyen de trouver un professionnel de confiance près de chez vous.
          </p>
        </div>
      </div>
    </section>



                      <form action="{{ route('search')  }}" method="GET" class="container my-4">
          @csrf
          <div class="row g-2 align-items-end">

            <div class="col-md">
              <!-- <label for="job_categories" class="form-label">Praticien</label> -->
              <select name="job_categories[]" id="job_categories"  class="form-select" required>
              <option value="all" selected>Tous les praticiens</option>
                @foreach ($jobcategories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md">
              <!-- <label for="animal_categories" class="form-label">Animaux</label> -->
              <select name="animal_categories[]" id="animal_categories"  class="form-select" required>
              <option value="all" selected>Tous les animaux</option>
                @foreach ($animalcategories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>



            <div class="col-md">
              <!-- <label for="departments" class="form-label">Tous les départements</label> -->
              <select name="departments[]" id="departments" class="form-select" required>
              <option value="all" selected>Tous les départements</option>
                @foreach ($department as $dep)
                      <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-auto">
              <button type="submit" class="btn btn-primary btn-custom">Trouvez votre praticien</button>
            </div>

          </div>
        </form>



@endsection
