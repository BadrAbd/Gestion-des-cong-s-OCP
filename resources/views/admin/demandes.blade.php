@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Gestion des demandes d'intérim</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Service</th>
                                    <th>Date début</th>
                                    <th>Date fin</th>
                                    <th>Intérim</th>
                                    <th>Statut</th>
                                    <th>Date de création</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($demandes as $demande)
                                    <tr>
                                        <td>{{ $demande->id }}</td>
                                        <td>{{ $demande->nom }}</td>
                                        <td>{{ $demande->prenom }}</td>
                                        <td>{{ $demande->service }}</td>
                                        <td>{{ $demande->date_debut }}</td>
                                        <td>{{ $demande->date_fin }}</td>
                                        <td>{{ $demande->interim }}</td>
                                        <td>
                                            <span class="badge bg-{{ $demande->status === 'approved' ? 'success' : ($demande->status === 'rejected' ? 'danger' : 'warning') }}">
                                                {{ $demande->status === 'approved' ? 'Approuvé' : ($demande->status === 'rejected' ? 'Rejeté' : 'En attente') }}
                                            </span>
                                        </td>
                                        <td>{{ $demande->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#approveModal{{ $demande->id }}">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $demande->id }}">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                                <a href="{{ route('interim.pdf', $demande->id) }}" class="btn btn-sm btn-info">
                                                    <i class="fas fa-file-pdf"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal Approuver -->
                                    <div class="modal fade" id="approveModal{{ $demande->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Approuver la demande</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="{{ route('admin.demandes.update-status', $demande) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="hidden" name="status" value="approved">
                                                        <div class="mb-3">
                                                            <label for="comment" class="form-label">Commentaire (optionnel)</label>
                                                            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-success">Approuver</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Rejeter -->
                                    <div class="modal fade" id="rejectModal{{ $demande->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Rejeter la demande</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="{{ route('admin.demandes.update-status', $demande) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="hidden" name="status" value="rejected">
                                                        <div class="mb-3">
                                                            <label for="comment" class="form-label">Commentaire (obligatoire)</label>
                                                            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-danger">Rejeter</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 