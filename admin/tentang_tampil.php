<?php 
include "header.php";

// Ambil data dari tabel tentang (pastikan id = 1 selalu ada)
$data = $koneksi->query("SELECT * FROM tentang WHERE id = 1")->fetch_assoc();
?>

<h4>Ubah Tentang Kami & Visi Misi</h4>
<hr>

<?php if ($data): ?>
<form method="post">
    <div class="mb-3">
        <label for="tentang_kami" class="form-label">Tentang Kami</label>
        <textarea name="tentang_kami" id="tentang_kami" class="form-control" style="height: 150px; resize: none;"><?php echo htmlspecialchars($data['tentang_kami']); ?></textarea>
    </div>
    <div class="mb-3">
        <label for="visi" class="form-label">Visi</label>
        <textarea name="visi" id="visi" class="form-control" style="height: 100px; resize: none;"><?php echo htmlspecialchars($data['visi']); ?></textarea>
    </div>
    <div class="mb-3">
        <label for="misi" class="form-label">Misi</label>
        <textarea name="misi" id="misi" class="form-control" style="height: 120px; resize: none;"><?php echo htmlspecialchars($data['misi']); ?></textarea>
    </div>
    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
</form>
<?php else: ?>
    <div class="alert alert-warning">Data tidak ditemukan.</div>
<?php endif; ?>

<?php 
if (isset($_POST['simpan'])) {
    $tentang_kami = $_POST['tentang_kami'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];

    $koneksi->query("UPDATE tentang SET 
        tentang_kami = '$tentang_kami',
        visi = '$visi',
        misi = '$misi'
        WHERE id = 1");

    echo "<script>alert('Data berhasil disimpan!'); location='tentang_tampil.php';</script>";
}

include "footer.php";
?>
