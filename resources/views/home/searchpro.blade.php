@extends('layouts.app')

@section('content')


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



            <h1>Résultat : {{ $count }}</h1>

        <div class="cards-container">
          @foreach($professionals as $pro)
            <a href="{{ route('monprofil.pro', $pro->id) }}" class="profil-card">
              <div class="profil-image">
                @if ($pro->profile_picture)
                      <img src="{{ asset('storage/' . $pro->profile_picture) }}" alt="Photo de {{ $pro->first_name }}">
                @else
                      <div class="empty-photo"></div>
                @endif
              </div>
              <h5>{{ $pro->company_name }}</h5>
              <p>{{ $pro->first_name }} {{ $pro->last_name }}</p>
              <div class="metiers">
                @foreach($pro->jobCategories as $category)
                      <span>{{ $category->name }}</span>
                @endforeach
              </div>
              <p class="departement">{{ $pro->departments->first()->code ?? '' }}</p>
            </a>
          @endforeach
        </div>

        <div class="pagination-wrapper">
        {{ $professionals->appends(request()->query())->links() }}
    </div>


@endsection
