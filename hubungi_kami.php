<?php
session_start();
include "header.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'assets/PHPMailer/Exception.php';
require 'assets/PHPMailer/PHPMailer.php';
require 'assets/PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama     = htmlspecialchars(trim($_POST["nama"]));
    $email    = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $telepon  = htmlspecialchars(trim($_POST["telepon"]));
    $pesan    = htmlspecialchars(trim($_POST["pesan"]));

    if (empty($nama) || empty($email) || empty($telepon) || empty($pesan)) {
        $_SESSION["pesan_error"] = "Semua field wajib diisi!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["pesan_error"] = "Format email tidak valid!";
    } else {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'naylaelatussaadah@gmail.com'; // Ganti dengan email pengirim
            $mail->Password   = 'ommchzttcptvnvgz';             // App password Gmail
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom($email, $nama);
            $mail->addAddress('naylaelatussaadah@gmail.com'); // Tujuan
            $mail->Subject = "Pesan dari Formulir Hubungi Kami";
            $mail->Body    =
                "Nama: $nama\n" .
                "Email: $email\n" .
                "No Telepon: $telepon\n\n" .
                "Pesan:\n$pesan";

            $mail->send();
            $_SESSION["pesan_sukses"] = "Pesan berhasil dikirim!";
        } catch (Exception $e) {
            $_SESSION["pesan_error"] = "Gagal mengirim pesan. Error: {$mail->ErrorInfo}";
        }
    }

    header("Location: hubungi_kami.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hubungi Kami</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }

        .form-wrapper {
            max-width: 600px;
            margin: 80px auto;
            padding: 30px 40px;
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e5e5;
        }

        .form-wrapper h3 {
            text-align: center;
            color: #0b3d91;
            font-size: 26px;
            margin-bottom: 30px;
            font-weight: 700;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            border-radius: 10px;
            border: 1px solid #ccc;
            background-color: #f8f9fa;
            transition: 0.3s;
            margin-bottom: 20px;
        }

        input:focus,
        textarea:focus {
            border-color: #0b3d91;
            background-color: #fff;
            outline: none;
            box-shadow: 0 0 5px rgba(11, 61, 145, 0.2);
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            background-color: #0b3d91;
            color: white;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            background-color: #092c6d;
            transform: translateY(-1px);
        }

        .alert {
            padding: 12px;
            border-radius: 10px;
            text-align: center;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #eafaf1;
            color: #2e7d32;
            border: 1px solid #a5d6a7;
        }

        .alert-danger {
            background-color: #fdecea;
            color: #c0392b;
            border: 1px solid #f5c6cb;
        }

        @media (max-width: 768px) {
            .form-wrapper {
                margin: 50px 20px;
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-wrapper">
        <div class="text-center">
            <img src="assets/file/logoo.png" alt="Logo" style="max-width: 150px; margin-bottom: 20px;">
        </div>
        <h3>Hubungi Kami</h3>

        <?php if (isset($_SESSION["pesan_sukses"])): ?>
            <div class="alert alert-success"><?php echo $_SESSION["pesan_sukses"]; unset($_SESSION["pesan_sukses"]); ?></div>
        <?php elseif (isset($_SESSION["pesan_error"])): ?>
            <div class="alert alert-danger"><?php echo $_SESSION["pesan_error"]; unset($_SESSION["pesan_error"]); ?></div>
        <?php endif; ?>

        <form method="POST" action="hubungi_kami.php">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" required placeholder="Masukkan nama lengkap Anda">

            <label>Email:</label>
            <input type="email" name="email" class="form-control" required placeholder="contoh@email.com">

            <label>No Telepon:</label>
            <input type="text" name="telepon" class="form-control" required placeholder="08xxxxxxxxxx">

            <label>Keterangan / Pesan:</label>
            <textarea name="pesan" rows="5" class="form-control" required placeholder="Tulis pesan atau pertanyaan Anda di sini..."></textarea>

            <button type="submit" class="btn w-100 mt-3">Kirim Pesan</button>
        </form>
    </div>
</div>

<?php include "footer.php"; ?>
</body>
</html>
