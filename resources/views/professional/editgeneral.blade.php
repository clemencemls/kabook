@extends('layouts.app')

@section('content')


    <form id="myForm" action="{{ route('update.general') }}" method="POST">
                          @csrf
                          @method('PUT')
                          <h1>Modifier les informations :</h1>
                          <br>


                          <div class="mb-3 text-start">
                    <label for="address" class="form-label">Votre adresse</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $professional->address }}"/>
                  </div>

                  <div class="mb-3 text-start">
                <label for="departments" class="form-label">Votre département (et ceux dans lequel vous vous déplacez si vous êtes mobiles) </label>
                <select name="departments[]" id="departments" multiple class="form-select" required>
                  @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                @if ($professional->departments->contains($department->id)) selected @endif>
                      {{ $department->name }}
                            </option>
                  @endforeach
                </select>
              </div>


                  <div class="mb-3 text-start">
                    <label for="city" class="form-label">Votre ville</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ $professional->city }}" required/>
                  </div>

                  <div class="mb-3 text-start">
                    <label for="postal_code" class="form-label">Votre code postal</label>
                    <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ $professional->postal_code }}" required/>
                  </div>

                      <div class="mb-3 text-start">
                    <label for="phone" class="form-label">Votre numéro de téléphone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $professional->phone }}" required/>
                  </div>

                  <div class="mb-3 text-start">
                    <label for="siret" class="form-label">Votre SIRET</label>
                    <input type="text" class="form-control" id="siret" name="siret" value="{{ $professional->siret }}" />
                  </div>



                  <div class="text-center mt-4">
                  <a href="{{ route('monprofil') }}" class="btn btn-primary px-4 btn-custom">Retour</a>
                <button type="submit" class="btn btn-primary px-4 btn-custom">Enregistrer</button>
                </form>
              </div>
                              <!-- Pour le formulaire -->
                              <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                new Choices('#departments', {
                                    removeItemButton: true, // Ajoute un petit bouton × à côté de chaque élément sélectionné
                                    placeholderValue: 'Sélectionnez un ou plusieurs départements ',//Affiche un texte gris quand rien n'est encore sélectionné.
                                    searchEnabled: true, //Active une petite barre de recherche dans le champ
                                    shouldSort: false // pas de tri par ordre alphabetique
                                });
                            });
                        </script>


@endsection
