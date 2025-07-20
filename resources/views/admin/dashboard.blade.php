@extends('layouts.app')



@section('content')
    <h1>Hello Admin : {{ $user->email }}</h1>
    <br>
        <h2>Nombre total de professionnels inscrits : {{ $count }}</h2>
        <br>

            <h3>Profils à valider</h3>
                @foreach($professional as $pro)
                    @if ($pro->is_validated === false)
                        <span>{{ $pro->created_at }}</span>
                        <br>
                            <a href="">{{ $pro->first_name }}</a>
                    @endif
                @endforeach



@endsection
