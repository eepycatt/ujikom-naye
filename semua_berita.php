	<?php 
	include "header.php";
	$ambil_berita = $koneksi -> query("SELECT * FROM berita");
	$berita = array();
	while ($tiap_berita = $ambil_berita->fetch_assoc())
	{
		$berita[] = $tiap_berita;
	}
	?>
	<div class="container">
	<h3 class="text-center my-5 fw-bold" data-aos="fade-right" style="letter-spacing: 1px;">ARTIKEL</h3>
		<hr>
		<?php foreach ($berita as $key => $value): ?>
			<div class="row">
				<a href="detail_berita.php?id=<?php echo $value["id_berita"]; ?>" class="text-decoration-none text-dark">
					<div class="card mb-3 p-3 berita" data-aos="fade-down">
						<div class="row g-0">
							<div class="col-md-4">
								<img src="assets/file/<?php echo $value["foto_berita"]; ?>" class="img-fluid " style="width: 100%; height: 250px;">
							</div>
							<div class="col-md-8">
								<div class="card-body">
									<h5 class="card-title"><?php echo $value["nama_berita"]; ?></h5>
									<span class="card-text"><small>Diunggah pada tanggal <?php echo date("d M Y",strtotime($value["tanggal_update"])); ?></small></span>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		<?php endforeach ?>
	</div>
	<?php 
	include "footer.php";
	?>