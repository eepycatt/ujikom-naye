<?php 
include "header.php";
$ambil_galeri = $koneksi->query("SELECT * FROM galeri");
$galeri = array();
while ($tiap_galeri = $ambil_galeri->fetch_assoc()) {
	$galeri[] = $tiap_galeri;
}
?>
<h4>Data galeri</h4>
<hr>
<table class="table table-bordered table-hover" id="thetable">
	<thead>
		<tr>
			<th>No</th>
			<th>Judul</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($galeri as $key => $value): ?>
			<tr>
				<td><?php echo $key + 1; ?></td>
				<td><?php echo $value["judul"]; ?></td>
				<td>
					<img src="../assets/file/<?php echo $value["foto_galeri"]; ?>" width="100" class="rounded mb-1">
				</td>
				<td>
					<a href="galleri_ubah.php?id=<?php echo $value["id_galeri"]; ?>" class="btn btn-warning" title="Ubah">
						<span class="bi bi-pencil-square text-white"></span>
					</a>
					<a href="galleri_hapus.php?id=<?php echo $value["id_galeri"]; ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger" title="Hapus">
						<span class="bi bi-trash text-white"></span>
					</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<a href="galleri_tambah.php" class="btn btn-primary" title="Tambah">
	Tambah
	<span class="bi bi-plus"></span>
</a>
<?php 
include "footer.php";
?>
