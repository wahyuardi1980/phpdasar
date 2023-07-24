<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("location: login.php");
	exit;
}

require 'functions.php';

// ambil data di url
$id = $_GET["id"];

// query data mahasiswa berdasarkan id 
$mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
// cek apakah data berhasil diubah atau tidak
if( ubah($_POST) > 0 ) {
	echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href = 'index2.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal diubah!');
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

<title>Ubah Data Siswa</title>

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

	<h1 class="judul">Ubah data siswa</h1>

	<div class="kotak_login">
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mahasiswa["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $mahasiswa["gambar"]; ?>">
		
						
				<label for="nim">NIM : </label>
				<input class="form_login" type="text" name="nim" id="nim" value="<?= $mahasiswa["nim"]; ?>">
		
				<label for="nama">Nama : </label>
				<input class="form_login" autocomplete="off" type="text" name="nama" id="nama" value="<?= $mahasiswa["nama"]; ?>">
			
				<label for="email">Email : </label>
				<input class="form_login" autocomplete="off" type="text" name="email" id="email" value="<?= $mahasiswa["email"]; ?>">
	
				<label for="jurusan">Jurusan : </label>
				<input class="form_login" autocomplete="off" type="text" name="jurusan" id="jurusan" value="<?= $mahasiswa["jurusan"]; ?>">
			
				<label for="gambar">Gambar <br></label>
				<img src="img/<?= $mahasiswa['gambar']; ?>" width="100">
				<input type="file" name="gambar" id="gambar">
		
				<button type="submit" name="submit" class="tombol">Ubah Data!</button>
		</ul>
	</form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>