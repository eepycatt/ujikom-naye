<?php 
include "header.php";

// Ambil data produk
$ambil_produk = $koneksi->query("SELECT * FROM produk");
$produk = array();

while ($tiap_produk = $ambil_produk->fetch_assoc()) {
    $produk[] = $tiap_produk;
}
?>

<h4>Data Produk</h4>
<hr>
<table class="table table-bordered table-hover" id="thetable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
            <th>Deskripsi</th>
            <th>Metode Pembayaran</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produk as $key => $value): ?>
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td>
                    <?php if (!empty($value["link_produk"])): ?>
                        <a href="<?= $value["link_produk"]; ?>" target="_blank" style="text-decoration: none;">
                            <?= htmlspecialchars($value["nama_produk"]); ?>
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    <?php else: ?>
                        <?= htmlspecialchars($value["nama_produk"]); ?>
                    <?php endif; ?>
                </td>
                <td>Rp <?= number_format($value["harga_produk"], 0, ',', '.'); ?></td>
                <td><?= htmlspecialchars($value["deskripsi_produk"]); ?></td>
                <td><?= htmlspecialchars($value["metode_pembayaran"]); ?></td>
                <td>
                    <img src="../uploads/<?= $value["gambar_produk"]; ?>" width="100">
                </td>
                <td nowrap="nowrap">
                    <a href="produk_ubah.php?id=<?= $value["produk_id"]; ?>" title="Ubah" class="btn-sm btn btn-warning">
                        <span class="bi bi-pencil-square text-white"></span>
                    </a>
                    <a href="produk_hapus.php?id=<?= $value["produk_id"]; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus produk ini?')" title="Hapus" class="btn-sm btn btn-danger">
                        <span class="bi bi-trash"></span>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<a href="produk_tambah.php" title="Tambah" class="btn btn-primary">
    Tambah
    <span class="bi bi-plus"></span>
</a>

<?php 
include "footer.php";
?>
