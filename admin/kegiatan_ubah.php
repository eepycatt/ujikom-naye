<?php 
include "header.php";
//mendapatkan id kegiatan dari parameter id dari url menggunakan $_GET
$id_kegiatan = $_GET["id"];

//ambil data kegiatan berdasarkan id kegiatan yang sudah di dapatkan dalam $id_kegiatan
$ambil_kegiatan = $koneksi -> query("SELECT * FROM kegiatan WHERE id_kegiatan = '$id_kegiatan'");

//ubah data ke dalam bentuk array menggunakan fetch_assoc()
$kegiatan = $ambil_kegiatan -> fetch_assoc();
?>
<h4>Ubah kegiatan</h4>
<hr>
<div class="row">
	<div class="col-md-8">
		<!-- Pada bagian formulir bisa  di copy dari tambah data karna tampilannya sama,hanya saja kita menambhakan attribute value untuk menampilkan data yang ingin di ubah di dalam tiap formulir nya -->
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
//jika user menekan tombol simpan maka php akan mendapatkan data yang di input di dalam formulir dan perintah2 berikut ini
if (isset($_POST["simpan"])) {
	$nama = $_POST["nama_kegiatan"];
	$tanggal = $_POST["tanggal_acara"];
	$lokasi = $_POST["lokasi_acara"];
	$keterangan = $_POST["keterangan_kegiatan"];

	$foto = $_FILES["foto_kegiatan"]["name"];
	$file = $_FILES["foto_kegiatan"]["tmp_name"];

	if (empty($foto)) {
		$koneksi->query("UPDATE kegiatan SET 
			nama_kegiatan = '$nama',
			tanggal_acara = '$tanggal',
			lokasi_acara = '$lokasi',
			keterangan_kegiatan = '$keterangan'
			WHERE id_kegiatan = '$id_kegiatan'");
	} else {
		move_uploaded_file($file, "../assets/file/$foto");

		// update data kegiatan + foto baru
		$koneksi->query("UPDATE kegiatan SET 
			nama_kegiatan = '$nama',
			tanggal_acara = '$tanggal',
			lokasi_acara = '$lokasi',
			keterangan_kegiatan = '$keterangan',
			foto_kegiatan = '$foto'
			WHERE id_kegiatan = '$id_kegiatan'");

		// cek apakah data galeri sudah ada untuk kegiatan ini
		$cek_galeri = $koneksi->query("SELECT * FROM galeri WHERE judul = '$nama'");
		if ($cek_galeri->num_rows > 0) {
			// update galeri jika sudah ada
			$koneksi->query("UPDATE galeri SET foto_galeri = '$foto' WHERE judul = '$nama'");
		} else {
			// atau insert baru jika belum ada
			$koneksi->query("INSERT INTO galeri (judul, foto_galeri) VALUES ('$nama', '$foto')");
		}
	}

	echo "<script>alert('Data berhasil diubah')</script>";
	echo "<script>location = 'kegiatan_tampil.php'</script>";
}

include "footer.php";
?>