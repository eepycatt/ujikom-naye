<?php 
include "header.php";
?>

<h4>Tambah Member</h4>
<hr>
<div class="row">
	<div class="col-md-8">
		<form method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label class="form-label">Nama</label>
				<input type="text" class="form-control" name="nama" required>
			</div>
			<div class="mb-3">
				<label class="form-label">Deskripsi</label>
				<textarea class="form-control" name="deskripsi" required></textarea>
			</div>
			<div class="mb-3">
				<label class="form-label">Foto</label>
				<input type="file" class="form-control" name="foto" accept="image/*" required>
			</div>
			<div class="mb-3">
				<button class="btn btn-primary" name="simpan">Simpan</button>
			</div>
		</form>
	</div>
</div>

<?php 
if (isset($_POST["simpan"])) {
	include "koneksi.php";

	$nama = mysqli_real_escape_string($koneksi, $_POST["nama"]);
	$deskripsi = mysqli_real_escape_string($koneksi, $_POST["deskripsi"]);

	$foto = $_FILES["foto"]["name"];
	$file_tmp = $_FILES["foto"]["tmp_name"];

	// Nama file unik
	$nama_file_baru = date("YmdHis") . '_' . $foto;

	// Simpan ke database
	$koneksi->query("INSERT INTO member (nama, deskripsi, foto) VALUES ('$nama', '$deskripsi', '$nama_file_baru')");

	// Pindahkan file
	move_uploaded_file($file_tmp, "../uploads/$nama_file_baru");

	echo "<script>alert('Member berhasil ditambahkan');</script>";
	echo "<script>location='member_tampil.php';</script>";
}

include "footer.php";
?>
