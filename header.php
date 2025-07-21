<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MotoClub Tangerang</title>
	<link rel="icon" href="assets/file/logoo.png">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
	<style type="text/css">
body {
	background-color: #E0E1DD;
	color: #1B263B;
	font-family: 'Poppins', sans-serif;
}	

p {
	font-size: 18px;
	color: #415A77;
}

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

.pengajar,
.pengurus {
	box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
	transition: box-shadow 0.3s ease;
}

.pengajar:hover,
.pengurus:hover {
	box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.galeri:hover {
	box-shadow: 0 8px 16px 0 #778DA9;
}

.navbar {
	background-color: #E0E1DD !important;
	box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

.nav-link {
	color: #1B263B !important;
	transition: color 0.3s ease;
	font-weight: 500;
}

.nav-link:hover {
	color: #415A77 !important;
}

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
	</style>
</head>

<body>
	<div class="sticky-top top-nav" style="background: #001f3f;">
		<nav class="navbar navbar-dark navbar-expand-lg shadow">
			<div class="container">
				<a href="index.php" class="navbar-brand">
					<img src="assets/file/logoo.png" width="100">
				</a>
				<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#lorem" aria-controls="lorem" aria-expanded="false" aria-label="toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="lorem">
					<ul class="navbar-nav ms-auto text-center">
						<li class="nav-item mx-2 kotak">
							<a href="tentang_kami.php" class="nav-link fw-bold">Tentang Kami</a>
						</li>
						<li class="nav-item mx-2 kotak">
							<a href="produk.php" class="nav-link fw-bold">Produk Kami</a>
						</li>
						<li class="nav-item mx-2 kotak">
							<a href="semua_kegiatan.php" class="nav-link fw-bold">Event</a>
						</li>
						<li class="nav-item mx-2 kotak">
							<a href="semua_berita.php" class="nav-link fw-bold">Artikel</a>
						</li>
						<li class="nav-item mx-2 kotak">
							<a href="semua_galeri.php" class="nav-link fw-bold">Galeri</a>
						</li>
						<li class="nav-item mx-2 kotak">
							<a href="klien_kami.php" class="nav-link fw-bold">Klien Kami</a>
						</li>
						<li class="nav-item mx-2 kotak">
							<a href="semua_member.php" class="nav-link fw-bold">Member</a>
						</li>
						<li class="nav-item mx-2 kotak">
							<a href="hubungi_kami.php" class="nav-link fw-bold">Contact</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<div class="min-vh-100">
