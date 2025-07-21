<?php 
include "../koneksi.php";

// Ambil id dari URL
$id = $_GET["id"];

// Ambil data member untuk hapus foto dari folder
$data = $koneksi->query("SELECT foto FROM member WHERE id = '$id'")->fetch_assoc();
$nama_foto = $data["foto"];

// Hapus dari database
$koneksi->query("DELETE FROM member WHERE id = '$id'");

// Hapus file dari folder jika ada
if (file_exists("../uploads/$nama_foto")) {
    unlink("../uploads/$nama_foto");
}

// Alert & redirect
echo "<script>alert('Berhasil menghapus member');</script>";
echo "<script>location = 'member_tampil.php';</script>";
?>
