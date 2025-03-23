@extends('layouts.guest')

@section('title', 'Register')

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
                                <h5 class="card-title text-center pb-0 fs-4">Créer un compte</h5>
                            </div>

                            <form class="row g-3 needs-validation" action="{{ route('register') }}" method="POST" novalidate>
                                @csrf
                                <div class="col-12">
                                    <label for="yourName" class="form-label">Nom</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="yourName" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                
                                 <div class="col-12">
                                    <label for="yourPrenom" class="form-label">Prenom</label>
                                    <div class="input-group has-validation">
                                         
                                        <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror" id="yourPrenom" required>
                                        @error('prenom')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> 

       

                                <div class="col-12">
                                    <label for="yourEmail" class="form-label">Votre Email</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="yourEmail" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> 

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Mot de passe</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="yourPassword" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" required>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input @error('terms') is-invalid @enderror" name="terms" type="checkbox" value="" id="acceptTerms" required>
                                        <label class="form-check-label" for="acceptTerms">Je suis d'accord et j'accepte les <a href="#">termes et conditions</a></label>
                                        @error('terms')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> -->

                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Créer un compte</button>
                                </div>

                                <div class="col-12">
                                    <p class="small mb-0">Vous avez déjà un compte? <a href="{{ route('login') }}">Se connecter</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
