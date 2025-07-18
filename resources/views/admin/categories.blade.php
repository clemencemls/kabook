@extends('layouts.app')

@section('content')

    <div class="table-responsive">
                    <table class="table table-hover align-middle shadow-sm rounded">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jobcategories as $jobcat)
                                <tr>
                                    <td>

                                           <i class="bi bi-tag me-1"></i> {{ $cat->name }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                           class="btn btn-outline-primary btn-sm me-2">
                                           <i class="bi bi-pencil-square"></i> Modifier
                                        </a>

                                        <!-- Supprimer -->
                                        <form action="" method="POST"
                                              class="d-inline-block"
                                              onsubmit="return confirm('Voulez-vous vraiment supprimer cette catégorie ?');">
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
