<?php 
include "header.php";

// Mengambil data dari tabel produk
$ambil_produk = $koneksi->query("SELECT * FROM produk");

// Menyimpan data dalam array
$produk = array();
while ($tiap_produk = $ambil_produk->fetch_assoc()) {
    $produk[] = $tiap_produk;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Daftar Produk</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<style>
		body {
			background-color: #e5e7e6;
		}

		h3 {
			color: #1B263B;
			font-weight: bold;
		}

		.card {
			border: none;
			border-radius: 16px;
			box-shadow: 0 6px 12px rgba(0, 0, 0, 0.08);
			transition: transform 0.2s ease, box-shadow 0.2s ease;
			background-color: white;
		}

		.card:hover {
			transform: translateY(-5px);
			box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
		}

		.card-title {
			color: #1B263B;
			font-size: 1.1rem;
			font-weight: 600;
		}

		.card-text {
			color: #415A77;
			font-size: 0.95rem;
		}

		.badge.bg-success {
			background-color: #4CAF50 !important;
			font-size: 0.85rem;
			padding: 6px 12px;
			border-radius: 8px;
		}

		.custom-detail-btn {
			background-color: #5584B6 !important;
			border-color: #5584B6 !important;
			color: white;
			font-weight: 500;
		}

		.custom-detail-btn:hover {
			background-color: #659BD4 !important;
			border-color: #4D76A1 !important;
		}

		.modal-content {
			border-radius: 16px;
		}

		.modal-header {
			background-color: #E0EAF3;
			border-bottom: 1px solid #ccc;
		}

		.modal-title {
			color: #1B263B;
		}

		.btn-warning {
			background-color: #F5B041;
			border-color: #F39C12;
			color: white;
			font-weight: 500;
		}

		.btn-warning:hover {
			background-color: #F39C12;
			border-color: #D68910;
		}
	</style>
</head>
<body>
<div class="container">
	<h3 class="text-center my-5" data-aos="fade-right" style="letter-spacing: 1px;">DAFTAR PRODUK</h3>
	<div class="row">
		<?php foreach ($produk as $p): ?>
			<div class="col-md-3 mb-4">
				<div class="card h-100">
					<img src="uploads/<?php echo $p['gambar_produk']; ?>" class="card-img-top" alt="..." style="height:200px; object-fit:cover;">
					<div class="card-body">
						<h5 class="card-title"><?php echo $p['nama_produk']; ?></h5>
						<p class="card-text text-muted">Rp <?php echo number_format($p['harga_produk']); ?></p>
						<p class="card-text"><?php echo substr($p['deskripsi_produk'], 0, 50); ?>...</p>
						<span class="badge bg-success"><?php echo $p['metode_pembayaran']; ?></span>
						<button type="button" class="btn btn-primary custom-detail-btn mt-2" data-bs-toggle="modal" data-bs-target="#detailModal<?php echo $p['produk_id']; ?>">See Details</button>
					</div>
				</div>
			</div>

<!-- Modal -->
<div class="modal fade" id="detailModal<?php echo $p['produk_id']; ?>" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel"><?php echo $p['nama_produk']; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="uploads/<?php echo $p['gambar_produk']; ?>" alt="<?php echo $p['nama_produk']; ?>" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h4>Harga: Rp <?php echo number_format($p['harga_produk']); ?></h4>
                        <p><strong>Deskripsi:</strong> <?php echo $p['deskripsi_produk']; ?></p>
                        <p><strong>Metode Pembayaran:</strong> <?php echo $p['metode_pembayaran']; ?></p>

                        <!-- Tombol aksi -->
                        <div class="d-flex gap-2 mt-3">
                            <?php if (!empty($p['link_produk'])): ?>
                                <a href="<?php echo $p['link_produk']; ?>" class="btn btn-warning fw-bold" target="_blank">
                                    Beli di Marketplace
                                </a>
                            <?php endif; ?>
                            <a href="contact.php" class="btn btn-success fw-bold">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
		<?php endforeach; ?>
	</div>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
include "footer.php";
?>
