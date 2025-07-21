<?php 
include "header.php";
$id = $_GET["id"];
$ambil_kegiatan = $koneksi -> query("SELECT * FROM kegiatan WHERE id_kegiatan = '$id'");
$kegiatan = $ambil_kegiatan->fetch_assoc();

$ambil_berita1 = $koneksi -> query("SELECT * FROM berita ORDER BY id_berita DESC LIMIT 4");
$berita1 = array();
while ($tiap_berita1 = $ambil_berita1->fetch_assoc()) {
	$berita1[] = $tiap_berita1;
}
?>

<style>
	/* ✨ Efek hover sidebar berita */
	.sidebar-berita-item {
		transition: background-color 0.3s ease;
		border-radius: 8px;
		padding: 5px;
	}

	.sidebar-berita-item:hover {
		background-color: #f0f0f0;
	}

	.sidebar-berita-item img {
		transition: transform 0.3s ease;
	}

	.sidebar-berita-item:hover img {
		transform: scale(1.05);
	}

	.sidebar-berita-item h6 {
		transition: color 0.3s ease;
	}

	.sidebar-berita-item:hover h6 {
		color: #0d6efd;
	}
</style>

<div class="container">
	<h3 class="mt-5" data-aos="fade-right"><?php echo $kegiatan["nama_kegiatan"]; ?></h3>
	<div class="row">
		<div class="col-md-8" data-aos="fade-up">
			<img src="assets/file/<?php echo $kegiatan["foto_kegiatan"]; ?>" style="width: 100%;">
			<p class="mt-5" style="text-align: justify;">
				<?php echo $kegiatan["keterangan_kegiatan"]; ?>	
			</p>
		</div>
		<div class="col-md-4" data-aos="fade-left">
			<div class="card px-3 py-2">
				<h5 class="text-center mt-2 fw-bold">Berita terbaru</h5>
				<hr>
				<div class="row mb-3">
					<?php foreach ($berita1 as $value): ?>
						<a href="detail_berita.php?id=<?php echo $value["id_berita"] ?>" class="text-decoration-none text-dark">
							<div class="d-flex mb-3 sidebar-berita-item">
								<img src="assets/file/<?php echo $value["foto_berita"]; ?>" 
									style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px; margin-right: 10px;">
								<div>
									<h6 class="mb-1" style="font-size: 14px;"><?php echo $value["nama_berita"]; ?></h6>
									<span class="small text-muted"><?php echo date("d M Y", strtotime($value["tanggal_update"])); ?></span>
								</div>
							</div>
						</a>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div> 
</div>

<?php 
include "footer.php";
?>
