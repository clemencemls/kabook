@extends('layouts.app')

@section('content')

        <h1>Liste des utilisateurs</h1>

    <br>
    @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle shadow-sm rounded">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Nom</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($professionals as $pro)
                        <tr>
                            <td>{{ $pro->id }}</td>
                            <td>{{ $pro->first_name }}</td>
                            <td>{{ $pro->last_name }}</td>
                            <td class="text-center">
                                <!-- Supprimer -->
                                <form action="{{ route('users.destroy', $pro->id) }}" method="POST"
                                      class="d-inline-block"
                                      onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash3"></i> Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

@endsection
