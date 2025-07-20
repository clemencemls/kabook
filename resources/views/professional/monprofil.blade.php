@extends('layouts.app')

@section('content')
                        <section>
                                    <h1> Bonjour, {{ $professional->first_name }}! - Votre profil</h1>
                                    @if(Auth::user()->professional->is_mobile)
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


                                    <div class="container my-4">
                    <div class="card p-4 shadow-sm">
                        <div class="row align-items-center">
                            <!-- Photo de profil -->
                            <div class="col-md-3 text-center mb-3 mb-md-0">
                                <label for="profile-image-input" class="d-block">
                                    <img id="profile-image-preview"
                                         src="{{ asset('images/default-avatar.png') }}"
                                         alt="Photo de profil"
                                         class="rounded-circle img-fluid"
                                         style="width: 150px; height: 150px; object-fit: cover; background-color: #e0e0e0; cursor: pointer;">
                                </label>
                                <input type="file" id="profile-image-input" accept="image/*" hidden>
                            </div>

                            <!-- Infos -->
                            <div class="col-md-9">
                                <h5 class="mb-3">{{ $professional->company_name }}</h5>

                                <p><strong> {{ $professional->first_name }} {{ $professional->last_name }} </p>



                                <p>
                                    @foreach($professional->jobCategories as $category)
                                        <span class="badge rounded-pill text-bg-success me-1">{{ $category->name }}</span>
                                    @endforeach
                                </p>

                                <p>
                                    @foreach($professional->AnimalCategories as $category)
                                        <span class="badge text-bg-dark me-1">{{ $category->name }}</span>
                                    @endforeach
                                    <br>
                                    @if($professional->is_mobile == true)
                                        <span class="badge text-bg-dark me-1">Se déplace</span>
                                    @else
                                        <span class="badge text-bg-dark me-1">Ne se déplace pas</span>
                                    @endif
                                    <a href="{{ route('edit-infos', $professional->id) }}">Modifier les infos</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <h3> Informations générales</h3>
                <p><strong>Adresse :</strong> {{ $professional->adress }} {{ $professional->postal_code }} {{ $professional->city }}</p>
                <p><strong>Téléphone :</strong> {{ $professional->phone }}</p>
                <p><strong>Siret :</strong> {{ $professional->siret }}</p>
                <br>
                @if ($professional->is_mobile == true)
                    <span>Je me déplace dans les départements suivants :</span>
                    @foreach($professional->departments as $department)
                        <span>{{ $department->code }}</span>
                    @endforeach
                @else
                    <span>Je me situe dans le departement :</span>
                        @foreach($professional->departments as $department)
                            <span>{{ $department->code }}</span>
                        @endforeach

                @endif
                <p><strong>Tarif :</strong> {{ $professional->price }}</p>
                <a href="{{ route('edit-general', $professional->id) }}">Modifier les infos</a>




                            <h3>Site web & reseaux sociaux</h3>
                            <a href="{{ route('edit-reseaux', $professional->id) }}">Modifier les infos</a>



                            <h3>Description</h3>
                            <p> {{ $professional->description }}</p>
                            <h3>Formation</h3>
                            <p> {{ $professional->education_background }}</p>
                            <h3>Parcours</h3>
                            <p> {{ $professional->experience_background }}</p>
                            <a href="{{ route('edit-text', $professional->id) }}">Modifier les infos</a>

                            </section>


            <div>
                <div>
                                <label for="profile-image-input" class="d-block">
                                    <img id="profile-image-preview"
                                         src="{{ asset('images/default-avatar.png') }}"
                                         alt="Photo de profil"
                                         class="rounded-circle img-fluid"
                                         style="width: 150px; height: 150px; object-fit: cover; background-color: #e0e0e0; cursor: pointer;">
                                </label>
                                <input type="file" id="profile-image-input" accept="image/*" hidden>
                </div>
                <div>
                <p class="mb-3">{{ $professional->company_name }}</p>
        <p><strong> {{ $professional->first_name }} {{ $professional->last_name }} </p>
        <p>
            @foreach($professional->jobCategories as $category)
                <span class="badge rounded-pill text-bg-success me-1">{{ $category->name }}</span>
            @endforeach
        </p>
        <p>
            @foreach($professional->AnimalCategories as $category)
                <span class="badge text-bg-dark me-1">{{ $category->name }}</span>
            @endforeach
            <br>
            @if($professional->is_mobile == true)
                <span class="badge text-bg-dark me-1">Se déplace</span>
            @else
                <span class="badge text-bg-dark me-1">Ne se déplace pas</span>
            @endif
                </div>
                <div>
                <i class="bi bi-globe"></i>
                <i class="bi bi-facebook"></i>
    <i class="bi bi-instagram"></i>
                </div>
            </div>


@endsection
