@extends('layouts.app')

@section('content')

    <form id="myForm" action="{{ route('update.reseaux') }}" method="POST">
        @csrf
        @method('PUT')

        <h1>Modifier les liens de mes réseaux :</h1>

        <div class="mb-3 text-start">
            <label for="website" class="form-label">Votre site internet</label>
            <input
                type="url"
                class="form-control"
                id="website"
                name="website"
                value="{{ $professional->website }}"
                placeholder="https://monsite.com"
            />
        </div>

        <div class="mb-3 text-start">
            <label for="instagram" class="form-label">Votre Instagram</label>
            <input
                type="url"
                class="form-control"
                id="instagram"
                name="instagram"
                value="{{ $professional->instagram }}"
                placeholder="https://instagram.com/votreprofil"
            />
        </div>

        <div class="mb-3 text-start">
            <label for="facebook" class="form-label">Votre Facebook</label>
            <input
                type="url"
                class="form-control"
                id="facebook"
                name="facebook"
                value="{{ $professional->facebook }}"
                placeholder="https://facebook.com/votreprofil"
            />
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('monprofil') }}" class="btn btn-primary px-4 btn-custom">Retour</a>
            <button type="submit" class="btn btn-primary px-4 btn-custom">Enregistrer</button>
        </div>
    </form>

@endsection


