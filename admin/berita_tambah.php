<?php 
include "header.php";
?>
<h4>Tambah berita</h4>
<hr>
<div class="row">
	<div class="col-md-8">
		<form method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label class="form-label">Nama berita</label>
				<input type="text" class="form-control" name="nama_berita">
			</div>
			<div class="mb-3">
				<label class="form-label">Keterangan berita</label>
				<textarea class="form-control" name="keterangan_berita"></textarea>
			</div>
			<div class="mb-3">
				<label class="form-label">Foto</label>
				<input type="file" class="form-control" name="foto_berita">
			</div>
			<div class="mb-3">
				<label class="form-label">Tanggal update</label>
				<input type="date" class="form-control" name="tanggal_berita">
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
	$nama = $_POST["nama_berita"];
	$keterangan = $_POST["keterangan_berita"];
	$tanggal = $_POST["tanggal_berita"];
	$foto = $_FILES["foto_berita"] ["name"];
	$file = $_FILES["foto_berita"] ["tmp_name"];
	$waktu = date("YmdHis");
	$upload = $waktu.$foto;

	$koneksi -> query("INSERT INTO berita(nama_berita,keterangan_berita,foto_berita,tanggal_update) VALUES('$nama','$keterangan','$upload','$tanggal')");

	move_uploaded_file($file, "../assets/file/$upload");

	echo "<script>alert('Berhasil menambahkan data')</script>";
	echo "<script>location = 'berita_tampil.php'</script>";
}
include "footer.php";
?>