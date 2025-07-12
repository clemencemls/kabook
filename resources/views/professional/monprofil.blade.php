@extends('layouts.app')

@section('content')
            <section>
                        <h1> Bonjour, {{ Auth::user()->professional->first_name }}! - Votre profil</h1>
                        @if(Auth::user()->professional->is_mobile)
                            <div class="alert alert-info rounded">
                                Votre profil est en cours de vérification par notre équipe.<br>
                                Nous étudions chaque profil avec attention afin de nous assurer qu'ils respectent nos conditions d'utilisation ainsi que nos valeurs.<br>
                                Cette opération prend généralement moins de 48h.
                            </div>
                        @endif
                        <br>


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
                        @endif
                        <a href="{{ route('edit-infos', $professional->id) }}">Modifier les infos</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <p><strong>Téléphone :</strong> {{ $professional->phone }}</p>



                <h3>Site web & reseaux sociaux</h3>


                <h3>Description</h3>
                <p> {{ Auth::user()->professional->description }}</p>
                <h3>Formation</h3>
                <p> {{ Auth::user()->professional->education_background }}</p>
                <h3>Parcours</h3>
                <p> {{ Auth::user()->professional->experience_background }}</p>

                </section>


@endsection
