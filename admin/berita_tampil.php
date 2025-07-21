<?php 
include "header.php";
$ambil_berita = $koneksi -> query("SELECT * FROM berita");
$berita = array();
while ($tiap_berita = $ambil_berita -> fetch_assoc()) 
{
	$berita[] = $tiap_berita;
}
// echo "<pre>";
// print_r($berita);
// echo "</pre>";
?>
<h4>Data Berita</h4>
<hr>
<table class="table table-bordered table-hover" id="thetable">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Berita</th>
			<th>Keterangan Berita</th>
			<th nowrap="nowrap">Tanggal Update</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($berita as $key => $value): ?>
			<tr>
				<td><?php echo $key+1; ?></td>
				<td><?php echo $value["nama_berita"]; ?></td>
				<td><?php echo $value["keterangan_berita"]; ?></td>
				<td nowrap="nowrap"><?php echo date("d M Y",strtotime($value["tanggal_update"])) ?></td>
				<td>
					<img src="../assets/file/<?php echo $value["foto_berita"]; ?>" width="100">
				</td>
				<td nowrap="nowrap">
					<a href="berita_ubah.php?id=<?php echo $value["id_berita"]; ?>" title="Ubah" class="btn-sm btn btn-warning">
						<span class="bi bi-pencil-square text-white"></span>
					</a>
					<a href="berita_hapus.php?id=<?php echo $value["id_berita"]; ?>" onclick="return confirm('Apakah anda yakin?')" title="Hapus" class="btn-sm btn btn-danger">
						<span class="bi bi-trash"></span>
					</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<a href="berita_tambah.php" title="Tambah" class="btn btn-primary">
	Tambah
	<span class="bi bi-plus"></span>
</a>
<?php 
include "footer.php";
?>