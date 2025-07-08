@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tableau de bord administrateur') }}</div>

                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-users"></i> Gestion des utilisateurs
                        </a>
                        <a href="{{ route('admin.demandes') }}" class="list-group-item list-group-item-action">
                            <i class="fas fa-calendar-alt"></i> Gestion des demandes de congés
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 