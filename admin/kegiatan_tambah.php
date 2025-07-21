<?php 
include "header.php";
?>
<h4>Tambah kegiatan</h4>
<hr>
<div class="row">
	<div class="col-md-8">
		<!-- membuat formulir untuk menambahkan data,metode pengiriman data menggunakan post, enctype multipart-form data digunakan karna terdapat inputan file dalam formulir (Foto) -->
		<form method="post" enctype="multipart/form-data"> <!-- penting: enctype harus ditambahkan -->
	<div class="mb-3">
		<label class="form-label">Nama kegiatan</label>
		<input type="text" class="form-control" name="nama_kegiatan" required>
	</div>
	<div class="mb-3">
		<label class="form-label">Tanggal Acara</label>
		<input type="date" class="form-control" name="tanggal_acara" required>
	</div>
	<div class="mb-3">
		<label class="form-label">Lokasi Acara</label>
		<input type="text" class="form-control" name="lokasi_acara" required>
	</div>
	<div class="mb-3">
		<label class="form-label">Keterangan kegiatan</label>
		<textarea class="form-control" name="keterangan_kegiatan" required></textarea>
	</div>
	<div class="mb-3">
		<label class="form-label">Foto Galeri</label>
		<input type="file" class="form-control" name="foto_galeri" required>
	</div>
	<div class="mb-3">
		<button class="btn btn-primary" name="simpan">Simpan</button>
	</div>
</form>
	</div>
</div>
<?php 
//Jika user menekan tombol simpan maka php akan melakukan proses mendapatkan data yang di input pada formulir perintahnya (if(isset($_POST["simpan"])))
if (isset($_POST["simpan"])) 
{
	$nama = $_POST["nama_kegiatan"];
	$tanggal = $_POST["tanggal_acara"];
	$lokasi = $_POST["lokasi_acara"];
	$keterangan = $_POST["keterangan_kegiatan"];

	// proses upload foto
	$nama_file = $_FILES["foto_galeri"]["name"];
	$tmp_file = $_FILES["foto_galeri"]["tmp_name"];
	$path = "foto_galeri/".$nama_file;

	move_uploaded_file($tmp_file, $path);

	// Simpan ke tabel kegiatan (asumsi tetap kamu pakai)
	$koneksi->query("INSERT INTO kegiatan(nama_kegiatan, tanggal_acara, lokasi_acara, keterangan_kegiatan, foto_kegiatan) 
					VALUES('$nama', '$tanggal', '$lokasi', '$keterangan', '$nama_file')");

	// Simpan juga ke tabel galeri
	$koneksi->query("INSERT INTO galeri(judul, foto_galeri) 
					VALUES('$nama', '$nama_file')");

	echo "<script>alert('Berhasil menambahkan data dan foto galeri')</script>";
	echo "<script>location = 'kegiatan_tampil.php'</script>";
}

include "footer.php";
?>