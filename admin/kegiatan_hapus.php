<?php 
include "../koneksi.php";
//mendapatkan id kegiatan dari parameter id dari url
$id_kegiatan = $_GET["id"];
//membuat query hapus berdasarkan id kegiatan yang sudah di dapatkan dalam $id_kegiatan
$koneksi -> query("DELETE FROM kegiatan WHERE id_kegiatan = '$id_kegiatan'");

//menampilkan alert seperti dibawah ini
echo "<script>alert('Berhasil menghapus data')</script>";
//kembali ke halaman kegiatan tampil seperti di bawah ini
echo "<script>location = 'kegiatan_tampil.php'</script>";

?>