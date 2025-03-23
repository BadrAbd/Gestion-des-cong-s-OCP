@extends('layouts.app')

@section('content')
<div class="pagetitle">
  <h1>Contact</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Contact</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section contact">
  <div class="row gy-4">
    <div class="col-xl-12">
      <div class="row">
        <div class="col-lg-6">
          <div class="info-box card" style="min-height: 195px">
            <i class="bi bi-geo-alt"></i>
            <h3>Address</h3>
            <p>OCP S.A Jorf Lasfar,<br>El Jadida, Maroc</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="info-box card" style="min-height: 195px">
            <i class="bi bi-telephone"></i>
            <h3>Appelez-nous</h3>
            <p>+212 5 23 38 99 00</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="info-box card" style="min-height: 195px">
            <i class="bi bi-envelope"></i>
            <h3>Envoyez-nous un Email</h3>
            <p>contact@ocpgroup.ma</p>
          </div>
        </div>
        <div class="col-lg-6" >
          <div class="info-box card" style="min-height: 195px">
            <i class="bi bi-clock"></i>
            <h3>Horaires d'ouverture</h3>
            <p>Lundi - Vendredi<br>9:00 - 17:00</p>
          </div>
        </div>
      </div>
    </div>

    {{-- <div class="col-xl-6">
      <div class="card p-4">
        <form action="forms/contact.php" method="post" class="php-email-form">
          <div class="row gy-4">
            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Votre nom complet" required>
            </div>
            <div class="col-md-6">
              <input type="email" class="form-control" name="email" placeholder="Votre Email" required>
            </div>
            <div class="col-md-12">
              <input type="text" class="form-control" name="subject" placeholder="Sujet" required>
            </div>
            <div class="col-md-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
            </div>
             <div class="col-md-12 text-center">
              <div class="loading">Chargement</div>
              <div class="error-message"></div>
              <div class="sent-message">Votre message a été envoyé. Merci!</div>
              <button type="submit">Envoyer le message</button>
            </div> 
          </div>
        </form>
      </div>
    </div> --}}
  </div>
</section>
@endsection