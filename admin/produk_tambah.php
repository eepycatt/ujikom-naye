<?php 
include "header.php";
?>

<h4>Tambah Produk</h4>
<hr>
<div class="row">
	<div class="col-md-8">
		<!-- Formulir tambah produk -->
		<form method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label class="form-label">Nama Produk</label>
				<input type="text" class="form-control" name="nama_produk" required>
			</div>
			<div class="mb-3">
				<label class="form-label">Harga Produk</label>
				<input type="number" class="form-control" name="harga_produk" required>
			</div>
			<div class="mb-3">
				<label class="form-label">Deskripsi Produk</label>
				<textarea class="form-control" name="deskripsi_produk" required></textarea>
			</div>
			<div class="mb-3">
				<label class="form-label">Metode Pembayaran</label>
				<input type="text" class="form-control" name="metode_pembayaran" required>
			</div>
			<div class="mb-3">
				<label class="form-label">Marketplace</label>
				<input type="url" class="form-control" name="link_produk" placeholder="Link produkmu" required>
			</div>
			<div class="mb-3">
				<label class="form-label">Gambar Produk</label>
				<input type="file" class="form-control" name="gambar_produk" accept="image/*" required>
			</div>
			<div class="mb-3">
				<button class="btn btn-primary" name="simpan">Simpan</button>
			</div>
		</form>
	</div>
</div>

<?php 
if (isset($_POST["simpan"])) {
	$nama_produk = mysqli_real_escape_string($koneksi, $_POST["nama_produk"]);
	$harga_produk = mysqli_real_escape_string($koneksi, $_POST["harga_produk"]);
	$deskripsi_produk = mysqli_real_escape_string($koneksi, $_POST["deskripsi_produk"]);
	$metode_pembayaran = mysqli_real_escape_string($koneksi, $_POST["metode_pembayaran"]);
	$link_produk = mysqli_real_escape_string($koneksi, $_POST["link_produk"]);

	$gambar = $_FILES["gambar_produk"]["name"];
	$file_tmp = $_FILES["gambar_produk"]["tmp_name"];

	// Penamaan file agar unik
	$waktu = date("YmdHis");
	$nama_file_baru = $waktu . '_' . $gambar;

	// Simpan ke database
	$koneksi->query("INSERT INTO produk (nama_produk, harga_produk, gambar_produk, deskripsi_produk, metode_pembayaran, link_produk) 
		VALUES ('$nama_produk', '$harga_produk', '$nama_file_baru', '$deskripsi_produk', '$metode_pembayaran', '$link_produk')");

	// Upload gambar ke folder uploads
	move_uploaded_file($file_tmp, "../uploads/$nama_file_baru");

	echo "<script>alert('Berhasil menambahkan produk');</script>";
	echo "<script>location = 'produk_tampil.php';</script>";
}

include "footer.php";
?>
