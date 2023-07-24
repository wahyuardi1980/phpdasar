<?php 

session_start();

if( !isset($_SESSION["login"]) ) {
	header("location: login.php");
	exit;
}

require 'functions.php';

$jumlahDataPerhalaman = 3;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman =  ceil($jumlahData / $jumlahDataPerhalaman);
$pageAktif = ( isset($_GET["page"]) ) ? $_GET["page"] : 1;
$awalData = ( $jumlahDataPerhalaman * $pageAktif ) - $jumlahDataPerhalaman;

$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerhalaman");

// tombol cari ditekan 
if ( isset($_POST["cari"]) ) {
	$mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
<link rel="stylesheet" href="css/style.css">
<!-- google font / font viga ~ sans-serif -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">


<title>Halaman Devoloper</title>
<link rel="shortcut icon" href="css/Foto/favicon.png">

</head>
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
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
 </div>
</nav>


<h1 class="judul">Daftar Table</h1>
<div class="tambah">
	<a class="btn btn-primary" href="tambah.php" role="button">Tambah Data Mahasiswa</a>
	<!-- <a href="tambah.php">Tambah Data Siswa</a> -->
</div>

<div class="keyword">
<form action="" method="post">
	<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Pencarian..." autocomplete="off">
	<button type="submit" name="cari" class="tombol">Cari</button>
</form>
</div>

<!-- pagination -->
<?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
	<a href=""><?= $i; ?></a>
<?php endfor; ?>

<!-- Table data -->
<center>
<div class="table-list">
	<table class="table table-bordered table-striped">
		<thead class="thead-dark">
	<tr>
		<th scope="col">No.</th>
		<th scope="col">Aksi</th>
		<th scope="col">Gambar</th>
		<th scope="col">Nim</th>
		<th scope="col">Nama</th>
		<th scope="col">Email</th>
		<th scope="col">Jurusan</th>
	</tr>
	</thead>


	<?php $i = 1; ?>
	<?php foreach( $mahasiswa as $row ) : ?>
		<tbody>
	<tr>
		<td><?= $i; ?></td>
		<td class="ubah_hapus">
			<a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
			<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin');">Hapus</a>
		</td>

		<td><img src="img/<?php echo $row["gambar"]; ?>" width="50"></td>
		<td><?= $row["nim"]; ?></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["jurusan"]; ?></td>

	</tr>
	</tbody>
<?php $i++; ?>
<?php endforeach; ?>
</table>
</div>
</center>


  <!-- footer -->
  <footer>
    <!-- <div class="container">
      <div class="row">
        <div class="col-lg info">
          <h3>INFOR<span>MASI</span></h3><br>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Services</a></li>
          </ul>
        </div>
        <div class="col-lg priv">
          <h3>PRIVACY <span>POLICY</span></h3><br>
          <ul>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Term Of Use</a></li>
          </ul>
        </div>
        <div class="col-lg alamat">
          <h3>ALA<span>MAT</span></h3><br>
          <p>Jl. Beringin Pasar 7 No. 27 <br>Tembung Medan <br><br><span>Telp. 0852-9777-7422</span><br><span>Telp. 0821-6128-6408</span> <br><br>Email. cctvlabmedan@gmail.com</p>
        </div>
        <div class="col-lg maps">
          <h3>MA<span>PS</span></h3><br>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248.87398700288068!2d98.74876811468044!3d3.5911917000000058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031336fc07a8a0b%3A0x6e2ac216a3e2dc10!2sCCTVlab!5e0!3m2!1sid!2sid!4v1654147381993!5m2!1sid!2sid" width="300" height="300" frameborder="300" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
      </div>
    </div> -->
    <hr class="garis2">
    <div class="container">
      <div class="footer-bottom">&copy; 2023 - 2024 CCTV LAB MEDAN All Created By 💕 Wahyu Ardiansyah</div>
    </div>
  </footer>
  <!-- Akhir Footer -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<!-- <script type="text/javascript" src="js/script.js"></script> -->

</body>
</html>