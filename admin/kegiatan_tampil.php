<?php 
include "header.php";

// Ambil data kegiatan dari database
$ambil_kegiatan = $koneksi->query("SELECT * FROM kegiatan");

// Cek apakah query berhasil
if (!$ambil_kegiatan) {
    die("Query Error: " . $koneksi->error);
}

// Ubah hasil query ke array
$kegiatan = array();
while ($tiap_kegiatan = $ambil_kegiatan->fetch_assoc()) {
    $kegiatan[] = $tiap_kegiatan;
}
?>

<h4>Data Event / Undangan</h4>
<hr>

<table class="table table-bordered table-hover" id="thetable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kegiatan</th>
            <th>Tanggal Acara</th>
            <th>Lokasi Acara</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kegiatan as $key => $value): ?>
        <tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value["nama_kegiatan"]; ?></td>
            <td><?php echo date("d-m-Y", strtotime($value["tanggal_acara"])); ?></td>
            <td><?php echo $value["lokasi_acara"]; ?></td>
            <td><?php echo $value["keterangan_kegiatan"]; ?></td>
            <td nowrap="nowrap">
                <a href="kegiatan_ubah.php?id=<?php echo $value["id_kegiatan"]; ?>" title="Ubah" class="btn-sm btn btn-warning">
                    <span class="bi bi-pencil-square text-white"></span>
                </a>
                <a href="kegiatan_hapus.php?id=<?php echo $value["id_kegiatan"]; ?>" onclick="return confirm('Apakah anda yakin?')" title="Hapus" class="btn-sm btn btn-danger">
                    <span class="bi bi-trash"></span>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="kegiatan_tambah.php" title="Tambah" class="btn btn-primary">
    Tambah
    <span class="bi bi-plus"></span>
</a>

<?php 
include "footer.php";
?>
