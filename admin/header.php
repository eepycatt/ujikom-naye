<?php
include "../koneksi.php";
if (!isset($_SESSION)) session_start();

if (!isset($_SESSION["admin"])) {
	echo "<script>alert('anda harus login!')</script>";
	echo "<script>location = '../login.php'</script>";
	exit;
}

$id = $_SESSION['admin']['id_admin'];
$aa = $koneksi->query("SELECT * FROM admin WHERE id_admin = '$id'");
$admin = $aa->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrator</title>
	<link rel="icon" href="../assets/file/favicon.ico">
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="../assets/css/dashboard.css">
	<link rel="stylesheet" href="../assets/css/dataTables.bootstrap5.min.css">
	<style>
		/* GLOBAL */
body {
	background-color: #E0E1DD;
	color: #1B263B;
	font-family: 'Poppins', sans-serif;
}

p {
	font-size: 18px;
	color: #415A77;
}

/* CARD */
.card {
	border-radius: 12px;
	box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
	transition: transform 0.3s ease;
}

.card:hover {
	transform: translateY(-5px);
}

.kartu:hover,
.berita:hover,
.samping:hover {
	background-color: #415A77;
	color: #E0E1DD;
}

/* Galeri */
.galeri:hover {
	box-shadow: 0 8px 16px 0 #778DA9;
}

/* NAVBAR */
.navbar {
	background-color: #E0E1DD !important;
}

.navbar .nav-link,
.navbar .navbar-brand {
	color: #1B263B !important;
	transition: color 0.3s ease;
}

.navbar .nav-link:hover {
	color: #778DA9 !important;
}

/* CTA Button */
.kotak1 .nav-link {
	background-color: #778DA9;
	color: #FFFFFF !important;
	padding: 8px 16px;
	border-radius: 8px;
	font-weight: bold;
	transition: background-color 0.3s ease, transform 0.2s ease;
}

.kotak1 .nav-link:hover {
	background-color: #415A77;
	transform: scale(1.05);
	text-decoration: none;
}

/* SIDEBAR */
.sidebar {
	background-color: #E0E1DD !important;
	border-right: 1px solid #ccc;
}

.sidebar .nav-link {
	color: #1B263B !important;
	transition: background-color 0.3s, color 0.3s;
	font-weight: 500;
	border-radius: 8px;
	margin: 4px 8px;
	padding: 10px 12px;
}

.sidebar .nav-link:hover {
	background-color: #778DA9 !important;
	color: #fff !important;
	text-decoration: none;
}

.sidebar .nav-link.active {
	background-color: #415A77 !important;
	color: #fff !important;
}

.sidebar .container h6 {
	font-weight: 600;
	color: #1B263B;
}

	</style>
</head>
<body>
	<header class="navbar navbar-dark bg-dark sticky-top flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Admin</a>
		<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<ul class="navbar-nav px-3 ms-auto">
			<li class="nav-item text-nowrap">
				<a class="nav-link" href="logout.php">
					<i class="bi bi-box-arrow-right"></i> Sign Out
				</a>
			</li>
		</ul>
	</header>

	<div class="container-fluid">
		<div class="row">
			<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-white sidebar collapse position-fixed top-0 bottom-0 pt-5">
				<div class="position-sticky">
					<a href="profil_admin.php" class="text-decoration-none">
						<div class="container text-center pt-3">
							<span class="bi bi-person-circle display-5 text-dark"></span>
							<h6 class="pt-2 text-dark"><?php echo $admin["nama_admin"]; ?></h6>
						</div>
					</a>
					<hr>
					<ul class="nav flex-column">
	<li class="nav-item">
		<a class="nav-link text-dark" href="index.php">
			<i class="bi bi-house-door"></i> Beranda
		</a>
	</li>
	<li class="nav-item">
	<li class="nav-item">
		<a class="nav-link text-dark" href="profil_admin.php">
			<i class="bi bi-person-circle"></i> Profil
		</a>
	</li>
		<a class="nav-link text-dark" href="tentang_tampil.php">
			<i class="bi bi-info-circle"></i> Tentang
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link text-dark" href="produk_tampil.php">
			<i class="bi bi-bag-fill"></i> Produk
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link text-dark" href="berita_tampil.php">
			<i class="bi bi-journal-bookmark-fill"></i> Artikel
		</a>
	</li>
		<li class="nav-item">
		<a class="nav-link text-dark" href="kegiatan_tampil.php">
			<i class="bi bi-clipboard"></i> Event
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link text-dark" href="galleri_tampil.php">
			<i class="bi bi-card-image"></i> Galleri
		</a>
	</li>
	<li class="nav-item">
	<a class="nav-link text-dark" href="member_tampil.php">
		<i class="bi bi-people-fill"></i> Member
	</a>
</li>

</ul>

				</div>
			</nav>

			<main class="col-md-9 ms-sm-auto col-lg-10 offset-md-3 offset-lg-2 px-md-4 py-4">
