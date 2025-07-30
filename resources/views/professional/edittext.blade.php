@extends('layouts.app')

@section('content')

    <form id="myForm" action="{{ route('update.text') }}" method="POST">
        @csrf
        @method('PUT')
        <h1>Modifier mes descriptions :</h1>
        <br>

        <div class="mb-3 text-start">
            <label for="description" class="form-label">Votre description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $professional->description }}" required>
        </div>

        <div class="mb-3 text-start">
            <label for="experience_background" class="form-label">Votre parcours</label>
            <input type="text" class="form-control" id="experience_background" name="experience_background" value="{{ $professional->experience_background }}">
        </div>

        <div class="mb-3 text-start">
            <label for="education_background" class="form-label">Vos formations</label>
            <input type="text" class="form-control" id="education_background" name="education_background" value="{{ $professional->education_background }}">
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('monprofil') }}" class="btn btn-primary px-4 btn-custom">Retour</a>
            <button type="submit" class="btn btn-primary px-4 btn-custom">Enregistrer</button>
        </div>

    </form>

@endsection

