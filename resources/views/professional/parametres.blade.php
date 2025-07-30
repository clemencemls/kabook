@extends('layouts.app')

@section('content')

    <section>
      <h1 class="mb-4">Gestion de mon compte</h1>

      <form action="{{ route('professional.destroy') }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ?');">
        @csrf
        @method('DELETE')
        <button type="submit" aria-label="Supprimer mon compte utilisateur" class="btn btn-primary btn-custom btn2">
          Supprimer mon compte
        </button>
      </form>
    </section>

@endsection
