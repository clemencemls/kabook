@extends('layouts.app')

@section('content')
                                <h1>Les catégories de professions</h1>

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

                                                                           <i class="bi bi-tag me-1"></i> {{ $jobcat->name }}
                                                                        </a>
                                                                    </td>
                                                                    <td class="text-center">
                                                                    <a href="{{ route('editjobcat', $jobcat->id) }}"
                                                                           class="btn btn-outline-primary btn-sm me-2">
                                                                           <i class="bi bi-pencil-square"></i> Modifier
                                                                        </a>



                                                                        <!-- Supprimer -->
                                                                        <form action="{{ route('job.destroy', $jobcat->id) }}" method="POST"
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

                                                <form action="{{ route('job.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="titre" class="form-label">Nom de la profession</label>
                    <input required type="text" id="titre" class="form-control" name="name" placeholder="Nom profession">
                </div>

                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>

                        <br>
                        <br>
                        <br>
                                    <h1>Les catégories d'animaux</h1>

                            <div class="table-responsive">
                                            <table class="table table-hover align-middle shadow-sm rounded">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th scope="col">Nom</th>
                                                        <th scope="col" class="text-center">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($animalcategories as $animalcat)
                                                        <tr>
                                                            <td>

                                                                   <i class="bi bi-tag me-1"></i> {{ $animalcat->name }}
                                                                </a>
                                                            </td>
                                                            <td class="text-center">
                                                            <a href="{{ route('editanimalcat', $animalcat->id) }}"
                                                                   class="btn btn-outline-primary btn-sm me-2">
                                                                   <i class="bi bi-pencil-square"></i> Modifier
                                                                </a>

                                                                <!-- Supprimer -->
                                                                <form action="{{ route('animal.destroy', $animalcat->id) }}" method="POST"
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

                                        <form action="{{ route('animal.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="titre" class="form-label">Nom de la catégorie d'animaux</label>
                <input required type="text" id="titre" class="form-control" name="name" placeholder="Nom catégorie animal">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>


                            <br>
                        <br>
                        <br>

                            <h1>Les départements</h1>

                            <div class="table-responsive">
                    <table class="table table-hover align-middle shadow-sm rounded">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Code</th> <!-- Nouvelle colonne -->
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departments as $dep)
                                <tr>
                                    <td>
                                        <i class="bi bi-tag me-1"></i> {{ $dep->name }}
                                    </td>
                                    <td>
                                        {{ $dep->code }} <!-- Affichage du code -->
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('editdepartment', $dep->id) }}" class="btn btn-outline-primary btn-sm me-2">
                                            <i class="bi bi-pencil-square"></i> Modifier
                                        </a>

                                        <!-- Supprimer -->
                                        <form action="{{ route('department.destroy', $dep->id) }}" method="POST"
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




        <div class="mb-3">
            <label for="name" class="form-label">Département</label>
            <input required type="text" id="name" class="form-control mb-2" name="name" placeholder="Ex : Gironde">

            <label for="code" class="form-label">Code</label>
            <input required type="text" id="code" class="form-control" name="code" placeholder="Ex : 33">
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>



@endsection
