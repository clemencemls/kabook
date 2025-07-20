@extends('layouts.app')

@section('content')

    <h1>Modifier catégorie d'animal:</h1>
          <form class="row g-3" action="{{route('updateanimalcat', $animalcategorie->id)}}" method="POST">
            @csrf
            @method('PUT')
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
          <div class="col-auto">
            <label for="name" class="">Nom:</label>
            <input type="text"  class="form-control" name="name" id="name" value="{{$animalcategorie->name}}">
          </div>
          <div >
            <button type="submit" class="btn btn-primary mb-3">Modifier</button>
          </div>
        </form>


@endsection
