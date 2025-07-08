@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">Demandes de Congés</h2>
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
                                    <th>Employé</th>
                                    <th>Service</th>
                                    <th>Date de début</th>
                                    <th>Date de fin</th>
                                    <th>Type de congé</th>
                                    <th>Statut</th>
                                    @if(auth()->user()->is_admin)
                                        <th>Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($demandes as $demande)
                                    <tr>
                                        <td>{{ $demande->user->nom }} {{ $demande->user->prenom }}</td>
                                        <td>{{ $demande->user->service->nom }}</td>
                                        <td>{{ $demande->date_debut->format('d/m/Y') }}</td>
                                        <td>{{ $demande->date_fin->format('d/m/Y') }}</td>
                                        <td>{{ $demande->type_conge }}</td>
                                        <td>
                                            <span class="badge bg-{{ $demande->status === 'approved' ? 'success' : ($demande->status === 'rejected' ? 'danger' : 'warning') }}">
                                                {{ $demande->status === 'approved' ? 'Approuvé' : ($demande->status === 'rejected' ? 'Rejeté' : 'En attente') }}
                                            </span>
                                        </td>
                                        @if(auth()->user()->is_admin && $demande->status === 'pending')
                                            <td>
                                                <form action="{{ route('demande-conges.update-status', $demande) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" name="status" value="approved" class="btn btn-success btn-sm">
                                                        <i class="fas fa-check"></i> Approuver
                                                    </button>
                                                    <button type="submit" name="status" value="rejected" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-times"></i> Rejeter
                                                    </button>
                                                </form>
                                            </td>
                                        @endif
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