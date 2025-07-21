<?php 
include "header.php";
$id_galeri = $_GET["id"];
$ambil_galeri = $koneksi->query("SELECT * FROM galeri WHERE id_galeri = '$id_galeri'");
$galeri = $ambil_galeri->fetch_assoc();
?>
<h4>Ubah galeri</h4>
<hr>
<div class="row">
	<div class="col-md-8">
		<form method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label class="form-label">Judul Foto</label>
				<input type="text" class="form-control" name="judul" value="<?php echo $galeri['judul']; ?>" required>
			</div>
			<div class="mb-3">
				<label class="form-label">Foto</label>
				<img src="../assets/file/<?php echo $galeri["foto_galeri"]; ?>" width="100" class="rounded mb-1">
				<input type="file" class="form-control" name="foto_galeri">
			</div>
			<div class="mb-3">
				<button class="btn btn-primary" name="simpan">Simpan</button>
			</div>
		</form>
	</div>
</div>

<?php 
if (isset($_POST["simpan"])) 
{
	$judul = $_POST["judul"];
	$foto = $_FILES["foto_galeri"]["name"];
	$file = $_FILES["foto_galeri"]["tmp_name"];

	if (!empty($foto)) {
		$waktu = date("YmdHis");
		$upload = $waktu . $foto;
		move_uploaded_file($file, "../assets/file/$upload");

		$koneksi->query("UPDATE galeri SET judul = '$judul', foto_galeri = '$upload' WHERE id_galeri = '$id_galeri'");
	} else {
		$koneksi->query("UPDATE galeri SET judul = '$judul' WHERE id_galeri = '$id_galeri'");
	}

	echo "<script>alert('Data berhasil diubah')</script>";
	echo "<script>location = 'galleri_tampil.php'</script>";
}
include "footer.php";
?>
