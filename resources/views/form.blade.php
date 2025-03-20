@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            @if(session('demande_id'))
                <div class="mt-2">
                    <a href="{{ route('interim.pdf', ['id' => session('demande_id')]) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-download"></i> Télécharger le PDF
                    </a>
                </div>
            @endif
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
                            <label for="signature" class="form-label">Signature</label>
                            <div id="signature-pad" class="border rounded p-2" style="height: 200px; width: 100%; background-color: #fff; position: relative;">
                                <canvas id="signature-canvas" style="width: 100%; height: 100%; touch-action: none;"></canvas>
                                <div class="signature-line" style="position: absolute; bottom: 20px; left: 0; right: 0; border-bottom: 1px dashed #ccc;"></div>
                                <div class="signature-guide" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #ddd; font-size: 14px; pointer-events: none;">
                                    Signez ici
                                </div>
                            </div>
                            <div class="mt-2 d-flex justify-content-between align-items-center">
                                <button type="button" id="clear-signature" class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-eraser"></i> Effacer
                                </button>
                                <small class="text-muted">Signez dans la zone ci-dessus</small>
                            </div>
                            <input type="hidden" id="signature-data" name="signature" required>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary me-2">Enregistrer</button>  
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
    const canvas = document.getElementById('signature-canvas');
    const signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgb(255, 255, 255)',
        penColor: 'rgb(0, 0, 0)',
        velocityFilterWeight: 0.7,
        minWidth: 0.5,
        maxWidth: 2.5,
        throttle: 16,
        minDistance: 5,
        onBegin: function() {
            document.querySelector('.signature-guide').style.display = 'none';
        },
        onEnd: function() {
            if (this.isEmpty()) {
                document.querySelector('.signature-guide').style.display = 'block';
            }
        }
    });

    // Ajuster la taille du canvas
    function resizeCanvas() {
        const ratio = Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
        signaturePad.clear();
    }

    window.addEventListener("resize", resizeCanvas);
    resizeCanvas();

    // Effacer la signature
    document.getElementById('clear-signature').addEventListener('click', function () {
        signaturePad.clear();
        document.querySelector('.signature-guide').style.display = 'block';
    });

    // Validation du formulaire
    document.getElementById('interim-form').addEventListener('submit', function (e) {
        const dateDebut = document.getElementById('date_debut').value;
        const dateFin = document.getElementById('date_fin').value;

        if (new Date(dateFin) <= new Date(dateDebut)) {
            alert('La date de fin doit être supérieure à la date de début.');
            e.preventDefault();
            return;
        }

        if (signaturePad.isEmpty()) {
            alert('Veuillez fournir une signature.');
            e.preventDefault();
            return;
        }

        const dataURL = signaturePad.toDataURL('image/png');
        document.getElementById('signature-data').value = dataURL;
    });
});
</script>

<style>
#signature-pad {
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    background-color: #fff;
}

#signature-pad:focus-within {
    box-shadow: 0 0 8px rgba(0,0,0,0.2);
    border-color: #80bdff;
}

#signature-canvas {
    cursor: crosshair;
    touch-action: none;
}

.signature-line {
    pointer-events: none;
}

.signature-guide {
    transition: opacity 0.3s ease;
}

#signature-pad:hover .signature-guide {
    opacity: 0.7;
}

.btn-outline-secondary {
    transition: all 0.2s ease;
}

.btn-outline-secondary:hover {
    background-color: #f8f9fa;
}
</style>
@endsection
