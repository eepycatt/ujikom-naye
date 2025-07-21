<?php
session_start();
include "header.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'assets/PHPMailer/Exception.php';
require 'assets/PHPMailer/PHPMailer.php';
require 'assets/PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars(trim($_POST["nama"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $telepon = htmlspecialchars(trim($_POST["telepon"]));
    $alamat = htmlspecialchars(trim($_POST["alamat"]));
    $produk = htmlspecialchars(trim($_POST["produk"]));
    // $kurir = htmlspecialchars(trim($_POST["kurir"]));
    $metode = htmlspecialchars(trim($_POST["metode_pembayaran"]));

    if (empty($nama) || empty($email) || empty($telepon) || empty($alamat) || empty($produk) || empty($metode)) {
        $_SESSION["pesan_error"] = "Semua field wajib diisi!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["pesan_error"] = "Format email tidak valid!";
    } else {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'naylaelatussaadah@gmail.com';
            $mail->Password   = 'ommchzttcptvnvgz';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom($email, $nama);
            $mail->addAddress('naylaelatussaadah@gmail.com');
            $mail->Subject = "Pemesanan Produk dari Website";
            $mail->Body    =
                "Nama: $nama\n" .
                "Email: $email\n" .
                "No Telepon: $telepon\n" .
                "Alamat Pengiriman: $alamat\n\n" .
                "Produk Dipesan:\n$produk\n\n" .
                // "Kurir: $kurir\n" .
                "Metode Pembayaran: $metode";

            $mail->send();
            $_SESSION["pesan_sukses"] = "Pemesanan berhasil dikirim!";
        } catch (Exception $e) {
            $_SESSION["pesan_error"] = "Gagal mengirim pesan. Error: {$mail->ErrorInfo}";
        }
    }

    header("Location: contact.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pemesanan Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
        }

        form {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        form label {
            font-weight: bold;
        }

        form input,
        form textarea,
        form select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        form button {
            background-color: rgb(0, 8, 77);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            background-color: rgb(0, 15, 100);
        }
    </style>
</head>
<body>

<div style="text-align: center; margin-top: 30px;">
    <img src="assets/file/logo_motoclub.jpg" style="width: 100%; max-width: 300px; margin-bottom: 20px;" alt="Logo MotoClub">
    <h2>Pemesanan Produk</h2>

    <?php
        if (isset($_SESSION["pesan_sukses"])) {
            echo '<p style="color: green;">' . $_SESSION["pesan_sukses"] . '</p>';
            unset($_SESSION["pesan_sukses"]);
        } elseif (isset($_SESSION["pesan_error"])) {
            echo '<p style="color: red;">' . $_SESSION["pesan_error"] . '</p>';
            unset($_SESSION["pesan_error"]);
        }
    ?>
</div>

<form action="contact.php" method="POST">
    <label>Nama:</label>
    <input type="text" name="nama" placeholder="Masukkan nama" required>

    <label>Email:</label>
    <input type="email" name="email" placeholder="Masukkan email" required>

    <label>No Telepon:</label>
    <input type="text" name="telepon" placeholder="Masukkan nomor telepon aktif" required>

    <label>Alamat Pengiriman:</label>
    <textarea name="alamat" rows="3" placeholder="Nama jalan, kota, kode pos, dll" required></textarea>

    <label>Produk yang Dipesan:</label>
    <textarea name="produk" rows="4" placeholder="Tulis produk yang ingin dipesan, jumlah, warna, ukuran, dll..." required></textarea>

    <!-- <label>Kurir Pengiriman:</label>
    <select name="kurir" required>
        <option value="" disabled selected>Pilih kurir pengiriman</option>
        <option value="JNE">JNE</option>
        <option value="SiCepat">SiCepat</option>
        <option value="J&T">J&T</option>
        <option value="COD">COD</option>
    </select> -->

    <label>Metode Pembayaran:</label>
    <select name="metode_pembayaran" required>
        <option value="" disabled selected>Pilih metode pembayaran</option>
        <option value="QRIS">QRIS</option>
        <option value="BCA">Transfer BCA</option>
        <option value="BRI">Transfer BRI</option>
        <option value="Dana">Dana</option>
        <option value="OVO">OVO</option>
        <option value="Gopay">Gopay</option>
    </select>

    <button type="submit">Kirim Pesanan</button>
</form>

<?php include "footer.php"; ?>
</body>
</html>
