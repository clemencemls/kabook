@extends('layouts.app')

@section('content')

            <h1>Gestion de mon compte</h1>
    <br>
            <form action="{{ route('professional.destroy')}}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary btn-custom btn2">Supprimer mon compte</button>
        </form>



@endsection
