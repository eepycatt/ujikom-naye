<?php 
include "header.php";
if (!isset($_SESSION)) session_start();
?>

<style>
	body {
		background-color: #E0E1DD;
		font-family: 'Poppins', sans-serif;
		color: #1B263B;
	}

	label {
		color: #1B263B;
	}

	.form-control {
		border-radius: 8px;
	}

	.btn-primary {
		background-color: #1B263B;
		border: none;
		transition: background-color 0.3s ease, transform 0.2s ease;
	}

	.btn-primary:hover {
		background-color: #415A77;
		transform: scale(1.05);
	}

	.shadow {
		box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
	}
</style>

<div class="container">
	<div class="mt-5 row justify-content-center">
		<div class="col-10 col-sm-8 col-md-6 col-lg-4 mt-5">
			<form method="post" class="mt-5 bg-white p-4 rounded shadow">
				<div class="text-center mb-3">
					<img src="assets/file/logoo.png" width="100" alt="Logo MotoClub">
				</div>
				<div class="mb-3">
					<label class="form-label fw-bold">Username</label>
					<input type="text" class="form-control" name="login_username" placeholder="Masukkan username" required>
				</div>
				<div class="mb-3">
					<label class="form-label fw-bold">Password</label>
					<input type="password" class="form-control" name="login_password" placeholder="Masukkan password" required>
				</div>
				<div class="mb-3 text-center">
					<button class="btn btn-primary w-100 fw-bold" name="login">Masuk</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 
if (isset($_POST['login'])) {
	$username = $_POST['login_username'];
	$password = $_POST['login_password'];

	$cek = $koneksi->query("SELECT * FROM admin WHERE username_admin = '$username' AND password_admin = '$password'");
	$hitung = $cek->num_rows;

	if ($hitung == 1) {
		$_SESSION['admin'] = $cek->fetch_assoc();
		echo "<script>alert('Login berhasil !')</script>";
		echo "<script>location = 'admin/'</script>";
	} else {
		echo "<script>alert('Username atau password salah!')</script>";
		echo "<script>location = 'login.php'</script>";
	}
}
include "footer.php";
?>
