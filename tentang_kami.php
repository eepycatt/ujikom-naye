<?php
include "header.php";

// Ambil data dari database
$data = $koneksi->query("SELECT * FROM tentang WHERE id = 1")->fetch_assoc();
?>

<div class="container">
	<div class="row my-5">
		<div class="col-md-8 offset-md-2" style="text-align: justify;" data-aos="fade-up">
			<img src="assets/file/logoo.png" style="width: 50%; margin-bottom: 20px;">

			<!-- Tentang Kami -->
			<h3 data-aos="fade-right" style="letter-spacing: 1px;">Tentang Kami</h3>
			<p><?php echo nl2br(htmlspecialchars($data['tentang_kami'])); ?></p>

			<!-- Visi -->
			<h3 data-aos="fade-right" style="letter-spacing: 1px; margin-top: 40px;">Visi</h3>
			<p><?php echo nl2br(htmlspecialchars($data['visi'])); ?></p>

			<!-- Misi -->
			<h3 data-aos="fade-right" style="letter-spacing: 1px; margin-top: 40px;">Misi</h3>
			<p><?php echo nl2br(htmlspecialchars($data['misi'])); ?></p>

			<b>TERIMA KASIH</b>
		</div>
	</div>
</div>

<?php
include "footer.php";
?>
