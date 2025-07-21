<?php 
include "../koneksi.php";
$id_galeri = $_GET["id"];

$koneksi -> query("DELETE FROM galeri WHERE id_galeri = '$id_galeri'");

echo "<script>alert('Berhasil menghapus data')</script>";
echo "<script>location = 'galleri_tampil.php'</script>";

 ?>