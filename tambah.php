<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("location: login.php");
	exit;
}
require 'functions.php';



// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
// cek keberhasilan di tambahkan atau tidak
if( tambah($_POST) > 0 ) {
	echo "
		<script>
			alert('data berhasil ditambahakan!');
			document.location.href = 'index2.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal ditambahakan!');
			document.location.href = 'index2.php';
		</script>
	";
}


}
?>
<!DOCTYPE html>
<html>
<head>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- google font / font viga ~ sans-serif -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="css/Foto/favicon.png">
</head>

<title>Tambah Data Siswa</title>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
  <a class="navbar-brand" href="index2.php">Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index2.php">Home</a>
      </li>
    </ul>
  </div>
 </div>
</nav>

<h1 class="judul">Tambah data siswa</h1><
	<div class="kotak_login">
	<form action="" method="post" enctype="multipart/form-data">
		
				<label for="nim">NIM : </label>
				<input autocomplete="off" class="form_login" type="text" name="nim" id="nim" required placeholder="NIM">
			
				<label for="nama">Nama : </label>
				<input autocomplete="off" class="form_login" type="text" name="nama" id="nama" required placeholder="NAMA">
			
				<label for="email">Email</label>
				<input autocomplete="off" class="form_login" type="text" name="email" id="email" required placeholder="EMAIL">
	
				<label for="jurusan">Jurusan</label>
				<input autocomplete="off" class="form_login" type="text" name="jurusan" id="jurusan" required placeholder="JURUSAN">
			
				<label for="gambar">Gambar</label>
				<input type="file" name="gambar" id="gambar" required>
				<button type="submit" name="submit" class="tombol">Add Data! </button>
	</form>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>