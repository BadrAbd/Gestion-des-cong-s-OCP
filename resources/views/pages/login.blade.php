@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-4">
                        <a href="{{ url('/') }}" class="logo d-flex align-items-center w-auto">
                            <img src="{{ asset('assets/img/OCP Group.png') }}" alt="">
                            <span class="d-none d-lg-block">OCP Group</span>
                        </a>
                    </div>

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Connectez-vous à votre compte</h5>
                            </div>

                            <form class="row g-3 needs-validation" action="{{ route('login') }}" method="POST" novalidate>
                                @csrf
                                
                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">Nom d'utilisateur</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" 
                                               id="yourUsername" value="{{ old('username') }}" required>
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Mot de passe</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                                           id="yourPassword" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" 
                                               value="true" id="rememberMe" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="rememberMe">Souviens-toi de moi</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Se connecter</button>
                                </div>

                                <div class="col-12">
                                    <p class="small mb-0">Vous n'avez pas de compte?<a href="{{ route('register') }}">  Créer un compte</a></p>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="credits">
                        Designed by Badr Abdelkhaleq & Achraf El Ayoubi
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection