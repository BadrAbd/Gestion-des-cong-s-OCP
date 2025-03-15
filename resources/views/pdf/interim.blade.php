<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande d'Intérim</title>
    <style>
        body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  background-color: white;
  color: black;
  font-size: 14px;
}

.document {
  max-width: 21cm; /* A4 width */
  margin: 0 auto;
  padding: 0.7cm;
  position: relative;
  background-color: white;
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  width: 100%;
  margin-bottom: 90px;
}

.company-info {
  flex: 1;
}

.logo-container {
  text-align: right;
}

.logo {
  width: 40px; /* Reduced size */
  height: auto;
  display: inline-block;
  margin-left: 60px; 
  margin-top: 1px;
}

.company-name {
  color:rgb(33, 62, 101); /* Brown color for the company name */
  font-size: 16px;
  margin: 0;
  font-weight: normal;
}

.date-creation {
  text-align: right;
  margin-top: 60px;
  margin-bottom: 55px;
}

.reference {
  text-align: left;
  margin-bottom: 55px;
}

.all-services {
  text-align: center;
  margin-bottom: 60px;
}

.subject {
  margin-bottom: 55px;
}

.subject-title {
  font-weight: bold;
  display: inline;
}

.subject-content {
  display: inline;
  margin-left: 5px;
}

.main-content {
  text-align: center;
  margin-bottom: 55px;
  line-height: 1.2;
}

.signature-section {
  margin-top: 120px; /* Increased from 55px to 120px to move it down */
  margin-bottom: 50px;
}

.signature-section h2 {
  font-size: 14px;
  margin-bottom: 15px;
}

.signature-image {
  max-width: 150px;
  max-height: 70px;
  border-bottom: 1px solid #333;
  padding-bottom: 5px;
}

.director {
  text-align: right;
  margin-top: 110px;
}

/* Set OCP logo color */
.green-text {
  color: #4CAF50; /* Green color for OCP */
}

@media print {
  body {
    padding: 0;
  }
  
  .document {
    box-shadow: none;
  }
}
    </style>
</head>
<body>
  <div class="document">
    <!-- Header with Logo and Company Name -->
    <div class="header">
      <img src="OCP Group.png" alt="OCP Logo" class="logo">
      <h3 class="company-name">Jorf Fertilizers Company 1</h3>
    </div>

    <!-- Date of creation (right aligned) -->
    <div class="date-creation">
      Jorf Lasfar, le {{ $demande->created_at->format('d/m/Y') }}
    </div>

    <!-- Reference ("left aligned) -->
    <div class="reference">
      JFC1-{{ $demande->id }}
    </div>

    <!-- All services (center aligned) -->
    <div class="all-services">
      <u>Tous les services</u>
    </div>

    <!-- Subject line with bold "OBJET :" -->
    <div class="subject">
      <div class="subject-title">OBJET :</div>
      <div class="subject-content">Intérim de M. {{ $demande->prenom }} {{ $demande->nom }}</div>
    </div>

    <!-- Main content (center aligned) -->
    <div class="main-content">
      L'interim de M. {{ $demande->prenom }} {{ $demande->nom }}, sera assuré du {{ $demande->date_debut->format('d/m/Y') }} au {{ $demande->date_fin->format('d/m/Y') }}<br>
      inclus, par M. {{ $demande->interim }}
    </div>

    <!-- Signature section -->
    <div class="signature-section">
        <h2>Signature</h2>
        @if($signatureImage)
            <img class="signature-image" src="data:image/png;base64,{{ $signatureImage }}" alt="Signature">
        @else
            <p>Signature non disponible</p>
        @endif
    </div>

    <div class="director">Directeur général de JFC1</div>
  </div>
</body>
</html>