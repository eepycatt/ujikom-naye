<?php 
include "header.php";
?>
<div class="min-vh-100">
	<h2>Profile Admin</h2>
	<hr>
	<div class="row">
		<div class="col-md-8">
			<form method="post" enctype="multipart/form-data">
				<div class="mb-3">
					<label class="form-label">Username</label>
					<input type="text" class="form-control " name="username_admin" value="<?php echo $admin["username_admin"]; ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Password</label>
					<input type="password" class="form-control " name="password_admin" value="<?php echo $admin["password_admin"] ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Nama</label>
					<input type="text" class="form-control " name="nama_admin" value="<?php echo $admin["nama_admin"] ?>">
				</div>
				<div class="mb-3">
					<button class="btn btn-primary" name="simpan">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>


<?php 

if (isset($_POST['simpan']))
{
	$username = $_POST["username_admin"];
	$password = $_POST["password_admin"];
	$nama = $_POST["nama_admin"];
	

	$koneksi -> query("UPDATE admin set
		username_admin = '$username',
		password_admin = '$password',
		nama_admin = '$nama' WHERE id_admin = '$id'");
	
	echo "<script>alert('Data berhasil diubah')</script>";
	echo "<script>location = 'profil_admin.php'</script>";
}
include "footer.php";
?>


</body>
</html>