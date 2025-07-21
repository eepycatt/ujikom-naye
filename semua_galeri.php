<?php 
include "header.php";
$ambil_galeri = $koneksi->query("SELECT * FROM galeri");
$galeri = [];
while ($tiap_galeri = $ambil_galeri->fetch_assoc()) {
	$galeri[] = $tiap_galeri;
}
?>

<!-- STYLE -->
<style>
.galeri-grid {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
	gap: 20px;
}
.galeri-card {
	position: relative;
	border-radius: 15px;
	overflow: hidden;
	box-shadow: 0 8px 20px rgba(0,0,0,0.08);
	transition: transform 0.3s ease;
	cursor: pointer;
}
.galeri-card:hover {
	transform: translateY(-5px);
}
.galeri-card img {
	width: 100%;
	height: 250px;
	object-fit: cover;
	display: block;
	transition: transform 0.4s ease;
}
.galeri-card:hover img {
	transform: scale(1.05);
}
.galeri-caption {
	position: absolute;
	bottom: 0;
	width: 100%;
	background: rgba(0, 0, 0, 0.6);
	color: #fff;
	text-align: center;
	padding: 10px;
	font-weight: 500;
	font-size: 15px;
	opacity: 0;
	transform: translateY(100%);
	transition: all 0.4s ease;
}
.galeri-card:hover .galeri-caption {
	opacity: 1;
	transform: translateY(0);
}

/* Lightbox Modal */
.lightbox {
	display: none;
	position: fixed;
	z-index: 9999;
	top: 0;
	left: 0;
	width: 100vw;
	height: 100vh;
	background-color: rgba(0,0,0,0.95);
	align-items: center;
	justify-content: center;
	flex-direction: column;
	overflow: hidden;
}

.lightbox-img {
	max-width: 90%;
	max-height: 80vh;
	object-fit: contain;
	border-radius: 10px;
	box-shadow: 0 10px 30px rgba(0,0,0,0.4);
	transition: transform 0.3s ease;
}

.lightbox-caption {
	color: #fff;
	margin-top: 15px;
	font-size: 18px;
	font-weight: 500;
	text-align: center;
	max-width: 80%;
}

.lightbox-close {
	position: absolute;
	top: 20px;
	right: 30px;
	color: #fff;
	font-size: 40px;
	cursor: pointer;
	z-index: 10001;
}

.lightbox-nav {
	position: absolute;
	top: 50%;
	transform: translateY(-50%);
	font-size: 50px;
	color: #fff;
	cursor: pointer;
	padding: 10px 20px;
	z-index: 10000;
	user-select: none;
}
.lightbox-nav.left { left: 20px; }
.lightbox-nav.right { right: 20px; }
.lightbox-nav:hover { color: #aaa; }
</style>

<!-- CONTENT -->
<div class="container my-5">
<h3 class="text-center my-5 fw-bold" data-aos="fade-right" style="letter-spacing: 1px;">GALERI</h3>
	<div class="galeri-grid">
		<?php foreach ($galeri as $index => $value): ?>
			<div class="galeri-card" data-index="<?php echo $index; ?>" data-aos="zoom-in">
				<img src="assets/file/<?php echo $value["foto_galeri"]; ?>" alt="Foto Galeri">
				<div class="galeri-caption"><?php echo htmlspecialchars($value["judul"]); ?></div>
			</div>
		<?php endforeach ?>
	</div>
</div>

<!-- LIGHTBOX MODAL -->
<div class="lightbox" id="lightbox">
	<span class="lightbox-close" onclick="closeLightbox()">&times;</span>
	<img class="lightbox-img" id="lightbox-img" src="" alt="">
	<div class="lightbox-caption" id="lightbox-caption"></div>
	<div class="lightbox-nav left" onclick="navigate(-1)">&#10094;</div>
	<div class="lightbox-nav right" onclick="navigate(1)">&#10095;</div>
</div>

<!-- SCRIPT -->
<script>
	const galeriData = <?php echo json_encode($galeri); ?>;
	let currentIdx = 0;

	document.querySelectorAll('.galeri-card').forEach((card, index) => {
		card.addEventListener('click', () => {
			openLightbox(index);
		});
	});

	function openLightbox(index) {
		currentIdx = index;
		const lightbox = document.getElementById('lightbox');
		const img = document.getElementById('lightbox-img');
		const caption = document.getElementById('lightbox-caption');
		img.src = "assets/file/" + galeriData[index].foto_galeri;
		caption.textContent = galeriData[index].judul;
		lightbox.style.display = "flex";
	}

	function closeLightbox() {
		document.getElementById('lightbox').style.display = "none";
	}

	function navigate(dir) {
		currentIdx += dir;
		if (currentIdx < 0) currentIdx = galeriData.length - 1;
		if (currentIdx >= galeriData.length) currentIdx = 0;
		openLightbox(currentIdx);
	}

	window.addEventListener('keydown', function(e) {
		if (e.key === "Escape") closeLightbox();
		if (e.key === "ArrowLeft") navigate(-1);
		if (e.key === "ArrowRight") navigate(1);
	});
</script>

<?php include "footer.php"; ?>
