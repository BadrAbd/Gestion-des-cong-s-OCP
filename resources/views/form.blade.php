@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Formulaire d'Intérim</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('interim.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>

                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" required>
                        </div>

                        <div class="mb-3">
                            <label for="service" class="form-label">Service</label>
                            <select class="form-select" id="service" name="service" required>
                                <option value="">Sélectionnez un service</option>
                                <option value="rh">Ressources Humaines</option>
                                <option value="informatique">Informatique</option>
                                <option value="comptabilite">Comptabilité</option>
                                <option value="marketing">Marketing</option>
                                <option value="production">Production</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="date_debut" class="form-label">Date début</label>
                            <input type="date" class="form-control" id="date_debut" name="date_debut" required>
                        </div>

                        <div class="mb-3">
                            <label for="date_fin" class="form-label">Date fin</label>
                            <input type="date" class="form-control" id="date_fin" name="date_fin" required>
                        </div>

                        <div class="mb-3">
                            <label for="interim" class="form-label">Intérim</label>
                            <input type="text" class="form-control" id="interim" name="interim" required>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection