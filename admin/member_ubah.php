<?php
include "header.php";
include "../koneksi.php";

// Ambil ID member
$id = $_GET["id"];

// Ambil data member berdasarkan ID
$data = $koneksi->query("SELECT * FROM member WHERE id = '$id'")->fetch_assoc();
?>

<h4>Ubah Member</h4>
<hr>
<div class="row">
	<div class="col-md-8">
		<form method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label class="form-label">Nama</label>
				<input type="text" class="form-control" name="nama" value="<?= $data['nama']; ?>" required>
			</div>
			<div class="mb-3">
				<label class="form-label">Deskripsi</label>
				<textarea class="form-control" name="deskripsi" required><?= $data['deskripsi']; ?></textarea>
			</div>
			<div class="mb-3">
				<label class="form-label">Foto Lama</label><br>
				<img src="../uploads/<?= $data['foto']; ?>" width="150">
			</div>
			<div class="mb-3">
				<label class="form-label">Ganti Foto (opsional)</label>
				<input type="file" class="form-control" name="foto" accept="image/*">
			</div>
			<div class="mb-3">
				<button class="btn btn-primary" name="simpan">Simpan Perubahan</button>
			</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST["simpan"])) {
	$nama = mysqli_real_escape_string($koneksi, $_POST["nama"]);
	$deskripsi = mysqli_real_escape_string($koneksi, $_POST["deskripsi"]);

	// Jika user upload gambar baru
	if ($_FILES["foto"]["name"]) {
		// Hapus foto lama
		$foto_lama = $data['foto'];
		if (file_exists("../uploads/$foto_lama")) {
			unlink("../uploads/$foto_lama");
		}

		// Simpan foto baru
		$foto_baru = date("YmdHis") . "_" . $_FILES["foto"]["name"];
		$tmp = $_FILES["foto"]["tmp_name"];
		move_uploaded_file($tmp, "../uploads/$foto_baru");

		// Update data dengan foto baru
		$koneksi->query("UPDATE member SET nama='$nama', deskripsi='$deskripsi', foto='$foto_baru' WHERE id='$id'");
	} else {
		// Update tanpa ganti foto
		$koneksi->query("UPDATE member SET nama='$nama', deskripsi='$deskripsi' WHERE id='$id'");
	}

	echo "<script>alert('Data berhasil diubah');</script>";
	echo "<script>location = 'member_tampil.php';</script>";
}
?>

<?php include "footer.php"; ?>
