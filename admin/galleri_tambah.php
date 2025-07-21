<?php 
include "header.php";
?>
<h4>Tambah galeri</h4>
<hr>
<div class="row">
	<div class="col-md-8">
		<form method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label class="form-label">Judul Foto</label>
				<input type="text" class="form-control" name="judul" required>
			</div>
			<div class="mb-3">
				<label class="form-label">Foto</label>
				<input type="file" class="form-control" name="foto_galeri" required>
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
	$waktu = date("YmdHis");
	$upload = $waktu . $foto;

	move_uploaded_file($file, "../assets/file/$upload");

	$koneksi->query("INSERT INTO galeri(judul, foto_galeri) VALUES('$judul', '$upload')");

	echo "<script>alert('Berhasil menambahkan data')</script>";
	echo "<script>location = 'galleri_tampil.php'</script>";
}
include "footer.php";
?>