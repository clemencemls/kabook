@extends('layouts.app')

@section('content')

    <section>
                                        <!-- <h1> Bonjour, {{ $professional->first_name }}! - Votre profil</h1>
                                        @if(Auth::user()->professional->is_mobile) -->
                                            <div class="alert alert-info rounded">
                                                Votre profil est en cours de vérification par notre équipe.<br>
                                                Nous étudions chaque profil avec attention afin de nous assurer qu'ils respectent nos conditions d'utilisation ainsi que nos valeurs.<br>
                                                Cette opération prend généralement moins de 48h.
                                            </div>
                                        @endif
                                        <br>
                                        @if(session('success'))
                                            <h1>{{session('success')}}</h1>
                                        @endif


                    <div class="d-flex align-items-center gap-2">
                  <!-- Bloc image + infos -->
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="me-4">
                      <div class="profile-upload">
                        <label for="profile-picture" class="upload-zone">
                          <span>
                            Glisser déposer votre<br>
                            image de profil ou<br>
                            <strong>Parcourir</strong>
                          </span>
                          <input type="file" id="profile-picture" hidden>
                        </label>
                      </div>
                    </div>

                    <div>
                      <!-- Nom entreprise + bouton édition -->
                      <div class="d-flex align-items-center mb-2">
                        <h2 class="mb-0 me-2">{{ $professional->company_name }}</h2>
                        <a href="{{ route('edit-infos', $professional->id) }}" title="Modifier">
                          <i class="bi bi-pencil-square icone-modifier"></i>
                        </a>
                      </div>

                      <!-- Nom complet -->
                      <p class="mb-2"><strong>{{ $professional->first_name }} {{ $professional->last_name }}</strong></p>

                      <!-- Métiers -->
                      <div class="mb-2 d-flex flex-wrap gap-2">
                        @foreach($professional->jobCategories as $category)
                              <span class="badge rounded-pill text-bg-info px-3">{{ $category->name }}</span>
                        @endforeach
                      </div>

                      <!-- Animaux -->
                      <div class="mb-2 d-flex flex-wrap gap-2">
                        @foreach($professional->AnimalCategories as $category)
                              <span class="badge rounded-pill text-bg-secondary">{{ $category->name }}</span>
                        @endforeach
                      </div>

                      <!-- Mobile info -->
                      <div>
                        @if($professional->is_mobile)
                              <span class="badge text-bg-dark">Se déplace</span>
                        @else
                              <span class="badge text-bg-secondary">Ne se déplace pas</span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <!-- Bloc social à droite -->
                  <div class="d-flex flex-column align-items-center">
                    <div class="social-links mb-2">
                      <a href="#" target="_blank" class="text-dark"><i class="bi bi-globe fs-4"></i></a>
                      <a href="#" target="_blank" class="text-dark"><i class="bi bi-facebook fs-4"></i></a>
                      <a href="#" target="_blank" class="text-dark"><i class="bi bi-instagram fs-4"></i></a>
                    </div>
                    <a href="{{ route('edit-reseaux', $professional->id) }}" title="Modifier">
                      <i class="bi bi-pencil-square icone-modifier"></i>
                    </a>
                  </div>
                </div>
                              </section>
                              <div class="section-infos d-flex justify-content-between flex-wrap gap-4 mt-5">
              <!-- Bloc 1 : Informations générales -->
              <div class="info-box p-4 shadow rounded flex-grow-1">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h3 class="mb-0">Informations générales</h3>
                  <a href="{{ route('edit-general', $professional->id) }}" title="Modifier">
                    <i class="bi bi-pencil-square icone-modifier"></i>
                  </a>
                </div>
                <p><strong>Adresse :</strong> {{ $professional->adress }} {{ $professional->postal_code }} {{ $professional->city }}</p>
                <p><strong>Téléphone :</strong> {{ $professional->phone }}</p>
                <p><strong>SIRET :</strong> {{ $professional->siret }}</p>
              </div>

              <!-- Bloc 2 : Mobilité et tarifs -->
              <div class="info-box p-4 shadow rounded flex-grow-1">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h3 class="mb-0">Zone d'intervention & tarifs</h3>
                  <a href="{{ route('edit-general', $professional->id) }}" title="Modifier">
                    <i class="bi bi-pencil-square icone-modifier"></i>
                  </a>
                </div>

                @if ($professional->is_mobile)
                      <p>Je me déplace dans les départements suivants :</p>
                      <div class="d-flex flex-wrap gap-2 mb-2">
                        @foreach($professional->departments as $department)
                              <span class="badge bg-light text-dark border">{{ $department->code }}</span>
                        @endforeach
                      </div>
                @else
                      <p>Je me situe dans le département :</p>
                      <div class="d-flex flex-wrap gap-2 mb-2">
                        @foreach($professional->departments as $department)
                              <span class="badge bg-light text-dark border">{{ $department->code }}</span>
                        @endforeach
                      </div>
                @endif

                <p><strong>Tarif :</strong> {{ $professional->price }}</p>
              </div>
            </div>

            <div class="section-texte d-flex flex-column gap-4 mt-5">
          <!-- Bloc Description -->
          <div class="info-box p-4 shadow rounded">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h3 class="mb-0">Description</h3>
              <a href="{{ route('edit-text', $professional->id) }}" title="Modifier">
                <i class="bi bi-pencil-square icone-modifier"></i>
              </a>
            </div>
            <p>{{ $professional->description }}</p>
          </div>

          <!-- Bloc Formation -->
          <div class="info-box p-4 shadow rounded">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h3 class="mb-0">Formation</h3>
              <a href="{{ route('edit-text', $professional->id) }}" title="Modifier">
                <i class="bi bi-pencil-square icone-modifier"></i>
              </a>
            </div>
            <p>{{ $professional->education_background }}</p>
          </div>

          <!-- Bloc Parcours -->
          <div class="info-box p-4 shadow rounded">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h3 class="mb-0">Parcours</h3>
              <a href="{{ route('edit-text', $professional->id) }}" title="Modifier">
                <i class="bi bi-pencil-square icone-modifier"></i>
              </a>
            </div>
            <p>{{ $professional->experience_background }}</p>
          </div>
        </div>


@endsection
