<?php 	
session_start();

if( isset($_SESSION["login"]) ) {
	header("location: index2.php");
	exit;
}

require 'functions.php';

if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");


	// cek username
	if( mysqli_num_rows($result) === 1 ) {

		// cek password 
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {

			// set session 
			$_SESSION["login"] = true;

			header("location: index2.php");
			exit;
		}
	}

	$error = true;
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- google font / font viga ~ sans-serif -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="css/Foto/favicon.png">

</head>

<title>Halaman Login</title>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
  <a class="navbar-brand" href="login.php">Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="registrasi.php">Registrasi</a>
      </li>
    </ul>
  </div>
 </div>
</nav>



<!-- Pembungkus Halaman login -->
<h1 class="judul">Halaman Login</h1>
<div class="kotak_login">

<?php if( isset($error) ) : ?>
	<center><p style="font-style: italic; color: red;">username atau password yang anda masukkan salah</p></center>
<?php 	endif; ?>

<form action="" method="post">
<label for="username">Username : </label>
<input type="text" name="username" id="username" placeholder="Username" class="form_login" autocomplete="off">
<label for="password">Password : </label>
<input type="password" name="password" id="password" placeholder="Password" class="form_login">
<button type="submit" name="login" class="tombol_login">Login!</button>
<div class="lupa">
<a href="forgot.php" class="lupa">Forgot Password?</a></div>
</form>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/script.js"></script>

</body>
</html>