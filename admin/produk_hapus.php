<?php 
include "../koneksi.php";

// mendapatkan id produk dari parameter URL
$id_produk = $_GET["id"];

// membuat query hapus berdasarkan id produk
$koneksi->query("DELETE FROM produk WHERE produk_id = '$id_produk'");

// menampilkan alert dan kembali ke halaman produk_tampil
echo "<script>alert('Berhasil menghapus data')</script>";
echo "<script>location = 'produk_tampil.php'</script>";
?>
