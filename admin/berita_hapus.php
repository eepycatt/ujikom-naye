<?php 
include "../koneksi.php";
$id_berita = $_GET["id"];

$koneksi -> query("DELETE FROM berita WHERE id_berita = '$id_berita'");

echo "<script>alert('Berhasil menghapus data')</script>";
echo "<script>location = 'berita_tampil.php'</script>";

?>