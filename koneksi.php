<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//skrip koneksi digunakan untuk menyambungkan skrip / aplikasi ke database agar aplikasi dapat terhubung dan mengakses data yang ada di dalam database tsb
$koneksi = new mysqli("localhost","root","","aplikasi_uts");
?>