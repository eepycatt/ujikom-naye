<?php 
include "header.php";
include "../koneksi.php";

// Ambil data member
$ambil_member = $koneksi->query("SELECT * FROM member");
$member = array();

while ($tiap = $ambil_member->fetch_assoc()) {
    $member[] = $tiap;
}
?>

<h4>Data Member</h4>
<hr>
<table class="table table-bordered table-hover" id="thetable">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($member as $key => $value): ?>
            <tr>
                <td><?= $key + 1; ?></td>
                <td><?= htmlspecialchars($value["nama"]); ?></td>
                <td><?= htmlspecialchars($value["deskripsi"]); ?></td>
                <td>
                    <img src="../uploads/<?= $value["foto"]; ?>" width="100">
                </td>
                <td nowrap="nowrap">
                    <a href="member_ubah.php?id=<?= $value["id"]; ?>" title="Ubah" class="btn-sm btn btn-warning">
                        <span class="bi bi-pencil-square text-white"></span>
                    </a>
                    <a href="member_hapus.php?id=<?= $value["id"]; ?>" onclick="return confirm('Yakin ingin menghapus member ini?')" title="Hapus" class="btn-sm btn btn-danger">
                        <span class="bi bi-trash"></span>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<a href="member_tambah.php" title="Tambah" class="btn btn-primary">
    Tambah
    <span class="bi bi-plus"></span>
</a>

<?php 
include "footer.php";
?>
