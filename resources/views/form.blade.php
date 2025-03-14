@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Formulaire d'Intérim</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('interim.store') }}" method="POST" id="interim-form">
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

                        <div class="mb-4">
                            <label for="signature" class="block mb-2">Signature</label>
                            <div id="signature-pad" class="border border-gray-300 rounded p-2" style="height: 150px; width: 100%;">
                                <canvas id="signature-canvas" style="width: 100%; height: 100%;"></canvas>
                            </div>
                            <div class="mt-2 flex space-x-2">
                                <button type="button" id="clear-signature" class="px-3 py-1 bg-gray-200 rounded text-sm">Effacer</button>
                                <input type="hidden" id="signature-data" name="signature" required>
                            </div>
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

<!-- Include the signature_pad library -->
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

<script>
    
    document.addEventListener('DOMContentLoaded', function () {
        var canvas = document.getElementById('signature-canvas');
        var signaturePad = new SignaturePad(canvas);

        document.getElementById('clear-signature').addEventListener('click', function () {
            signaturePad.clear();
        });
        document.getElementById('interim-form').addEventListener('submit', function (e) {
            // Get the date values
            var dateDebut = document.getElementById('date_debut').value;
            var dateFin = document.getElementById('date_fin').value;

            // Check if the end date is greater than the start date
            if (new Date(dateFin) <= new Date(dateDebut)) {
                alert('La date de fin doit être supérieure à la date de début.');
                e.preventDefault(); // Prevent form submission
                return;
            }

            // Check if the signature is empty
            if (signaturePad.isEmpty()) {
                alert('Veuillez fournir une signature.');
                e.preventDefault();
            } else {
                var dataURL = signaturePad.toDataURL();
                document.getElementById('signature-data').value = dataURL;
            }
        });

        document.getElementById('interim-form').addEventListener('submit', function (e) {
            if (signaturePad.isEmpty()) {
                alert('Veuillez fournir une signature.');
                e.preventDefault();
            } else {
                var dataURL = signaturePad.toDataURL();
                document.getElementById('signature-data').value = dataURL;
            }
        });
    });
</script>
@endsection
