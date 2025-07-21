<?php 
include "header.php";

$id_produk = $_GET["id"];
$ambil_produk = $koneksi->query("SELECT * FROM produk WHERE produk_id = '$id_produk'");
$produk = $ambil_produk->fetch_assoc();
?>

<h4>Ubah Produk</h4>
<hr>
<div class="row">
	<div class="col-md-8">
		<form method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label class="form-label">Nama Produk</label>
				<input type="text" class="form-control" name="nama_produk" value="<?php echo $produk['nama_produk']; ?>" required>
			</div>
			<div class="mb-3">
				<label class="form-label">Harga Produk</label>
				<input type="number" class="form-control" name="harga_produk" value="<?php echo $produk['harga_produk']; ?>" required>
			</div>
			<div class="mb-3">
				<label class="form-label">Deskripsi Produk</label>
				<textarea class="form-control" name="deskripsi_produk" required><?php echo $produk['deskripsi_produk']; ?></textarea>
			</div>
			<div class="mb-3">
				<label class="form-label">Metode Pembayaran</label>
				<input type="text" class="form-control" name="metode_pembayaran" value="<?php echo $produk['metode_pembayaran']; ?>" required>
			</div>
			<div class="mb-3">
				<label class="form-label">Link Produk (Shopee, Tokopedia, dll)</label>
				<input type="url" class="form-control" name="link_produk" value="<?php echo $produk['link_produk']; ?>">
			</div>
			<div class="mb-3">
				<label class="form-label">Gambar Produk</label><br>
				<img src="../uploads/<?php echo $produk['gambar_produk']; ?>" width="100" class="mb-2 rounded">
				<input type="file" class="form-control" name="gambar_produk">
			</div>
			<div class="mb-3">
				<button class="btn btn-primary" name="simpan">Simpan</button>
			</div>
		</form>
	</div>
</div>

<?php 
if (isset($_POST["simpan"])) {
	$nama_produk = $_POST["nama_produk"];
	$harga_produk = $_POST["harga_produk"];
	$deskripsi_produk = $_POST["deskripsi_produk"];
	$metode_pembayaran = $_POST["metode_pembayaran"];
	$link_produk = $_POST["link_produk"];

	$gambar = $_FILES["gambar_produk"]["name"];
	$file_tmp = $_FILES["gambar_produk"]["tmp_name"];

	if (empty($file_tmp)) {
		$koneksi->query("UPDATE produk SET 
			nama_produk = '$nama_produk',
			harga_produk = '$harga_produk',
			deskripsi_produk = '$deskripsi_produk',
			metode_pembayaran = '$metode_pembayaran',
			link_produk = '$link_produk'
			WHERE produk_id = '$id_produk'");
	} else {
		$koneksi->query("UPDATE produk SET 
			nama_produk = '$nama_produk',
			harga_produk = '$harga_produk',
			gambar_produk = '$gambar',
			deskripsi_produk = '$deskripsi_produk',
			metode_pembayaran = '$metode_pembayaran',
			link_produk = '$link_produk'
			WHERE produk_id = '$id_produk'");

		move_uploaded_file($file_tmp, "../uploads/$gambar");
	}

	echo "<script>alert('Data berhasil diubah')</script>";
	echo "<script>location = 'produk_tampil.php'</script>";
}

include "footer.php";
?>
