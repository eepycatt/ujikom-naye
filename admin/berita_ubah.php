<?php 
include "header.php";
$id_berita = $_GET["id"];
$ambil_berita = $koneksi -> query("SELECT * FROM berita WHERE id_berita = '$id_berita'");
$berita = $ambil_berita->fetch_assoc();
?>
<h4>Ubah berita</h4>
<hr>
<div class="row">
	<div class="col-md-8">
		<form method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label class="form-label">Nama berita</label>
				<input type="text" class="form-control" name="nama_berita" value="<?php echo $berita["nama_berita"] ?>">
			</div>
			<div class="mb-3">
				<label class="form-label">Keterangan berita</label>
				<textarea class="form-control" name="keterangan_berita"><?php echo $berita["keterangan_berita"] ?></textarea>
			</div>
			<div class="mb-3">
				<label class="form-label">Foto</label>
				<img src="../assets/file/<?php echo $berita["foto_berita"]; ?>" class="mb-1 rounded" width="100">
				<input type="file" class="form-control" name="foto_berita">
			</div>
			<div class="mb-3">
				<label class="form-label">Tanggal update</label>
				<input type="date" class="form-control" name="tanggal_berita" value="<?php echo $berita["tanggal_update"] ?>">
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

	if (empty($file)) 
	{
		$koneksi -> query("UPDATE berita SET 
			nama_berita = '$nama',
			keterangan_berita = '$keterangan',
			tanggal_update = '$tanggal' WHERE id_berita = '$id_berita'");
	}

	else
	{
		$koneksi -> query("UPDATE berita SET 
			nama_berita = '$nama',
			keterangan_berita = '$keterangan',
			foto_berita = '$upload',
			tanggal_update = '$tanggal' WHERE id_berita = '$id_berita'");

		move_uploaded_file($file, "../assets/file/$upload");
	}

	echo "<script>alert('Data berhasil diubah')</script>";
	echo "<script>location = 'berita_tampil.php'</script>";

}
include "footer.php";
?>