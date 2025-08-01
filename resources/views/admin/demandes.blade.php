@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">Gestion des Demandes</h2>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date de création</th>
                                    <th>Statut</th>
                                    <th>Commentaire Admin</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($demandes as $demande)
                                    <tr>
                                        <td>{{ $demande->id }}</td>
                                        <td>{{ $demande->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <span class="badge bg-{{ $demande->status === 'approved' ? 'success' : ($demande->status === 'rejected' ? 'danger' : 'warning') }}">
                                                {{ $demande->status === 'approved' ? 'Approuvé' : ($demande->status === 'rejected' ? 'Rejeté' : 'En attente') }}
                                            </span>
                                        </td>
                                        <td>{{ $demande->admin_comment ?? 'Aucun commentaire' }}</td>
                                        <td>
                                            @if($demande->status === 'pending')
                                                <form action="{{ route('admin.demandes.update-status', $demande) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <div class="input-group">
                                                        <input type="text" name="comment" class="form-control form-control-sm" placeholder="Commentaire (optionnel)">
                                                        <button type="submit" name="status" value="approved" class="btn btn-success btn-sm">
                                                            <i class="fas fa-check"></i> Approuver
                                                        </button>
                                                        <button type="submit" name="status" value="rejected" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-times"></i> Rejeter
                                                        </button>
                                                    </div>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
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