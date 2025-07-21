<?php
include "header.php";

$ambil_berita = $koneksi->query("SELECT * FROM berita ORDER BY id_berita DESC LIMIT 3");
$berita = array();
while ($tiap_berita = $ambil_berita->fetch_assoc()) {
    $berita[] = $tiap_berita;
}

$ambil_kegiatan = $koneksi->query("SELECT * FROM kegiatan ORDER BY id_kegiatan DESC LIMIT 3");
$kegiatan = array();
while ($tiap_kegiatan = $ambil_kegiatan->fetch_assoc()) {
    $kegiatan[] = $tiap_kegiatan;
}

$ambil_galeri = $koneksi->query("SELECT * FROM galeri ORDER BY id_galeri DESC LIMIT 6");
$galeri = array();
while ($tiap_galeri = $ambil_galeri->fetch_assoc()) {
    $galeri[] = $tiap_galeri;
}
?>

<!-- HERO SECTION -->
<div class="position-relative text-white overflow-hidden" style="max-width: 100vw; overflow-x: hidden;">
    <img src="assets/file/1678780319_Intip-Keseruan-Pengguna-Yamaha-XSR-155-Dan-Para-Pecinta-Custom.jpg"
         style="width: 100vw; height: 100vh; object-fit: cover; filter: brightness(70%);">
    
    <div class="position-absolute top-50 start-50 translate-middle text-center">
        <!-- <img src="assets/images/logo.png" alt="Logo" style="max-width: 150px; margin-bottom: 20px;"> -->
        <h1 class="fw-bold mb-3" data-aos="fade-right" data-aos-duration="1000" data-aos-once="false">
            Selamat Datang di MotoClub Tangerang
        </h1>
        <a href="tentang_kami.php" class="btn btn-light fw-bold"
           data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200" data-aos-once="false">
            Lihat Tentang Kami
        </a>
    </div>
</div>

<!-- ARTIKEL -->
<section class="container my-5">
    <div class="text-center">
        <h3 class="mb-5 fw-bold" data-aos="fade-right">ARTIKEL MOTOCLUB</h3>
    </div>
    <div class="row">
        <?php foreach ($berita as $key => $value) : ?>
            <div class="col-md-4 mb-3" data-aos="fade-down" data-aos-duration="1000" data-aos-once="true">
                <a href="detail_berita.php?id=<?php echo $value["id_berita"]; ?>" class="text-decoration-none text-dark">
                    <div class="card py-2 px-2 kartu" style="height: 400px;">
                        <img src="assets/file/<?php echo $value["foto_berita"]; ?>" style="width: 100%; height: 300px;" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $value["nama_berita"]; ?></h5>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach ?>
    </div>
    <div class="text-center mt-3">
        <a href="semua_berita.php" class="btn fw-bold text-white" style="background-color:rgb(0, 8, 77);">ARTIKEL</a>
    </div>
</section>

<!-- EVENT -->
<div class="text-center mb-5">
    <h3 class="fw-bold" data-aos="fade-right">UNDANGAN EVENT MOTOCLUB</h3>
</div>
<div class="row justify-content-center mx-0">
    <?php foreach ($kegiatan as $kk => $vk) : ?>
        <div class="col-md-4 col-sm-6 col-12 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-duration="1000">
            <div class="card shadow-sm border-0 h-100 event-card p-4 w-100 text-center">
                <h5 class="card-title mb-2"><?php echo $vk["nama_kegiatan"]; ?></h5>
                <p class="text-muted mb-1"><strong>Tanggal:</strong> <?php echo date("d M Y", strtotime($vk["tanggal_acara"])); ?></p>
                <p class="text-muted mb-2"><strong>Lokasi:</strong> <?php echo $vk["lokasi_acara"]; ?></p>
                <p class="badge bg-primary mb-2">Coming Soon</p>
                <button type="button" class="btn btn-sm text-white" style="background-color:#778DA9;" data-bs-toggle="modal" data-bs-target="#modalUndangan<?php echo $vk['id_kegiatan']; ?>">
                    Lihat Detail
                </button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalUndangan<?php echo $vk['id_kegiatan']; ?>" tabindex="-1" aria-labelledby="modalLabelUndangan<?php echo $vk['id_kegiatan']; ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabelUndangan<?php echo $vk['id_kegiatan']; ?>">
                            <?php echo $vk["nama_kegiatan"]; ?>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Tanggal:</strong> <?php echo date("d M Y", strtotime($vk["tanggal_acara"])); ?></p>
                        <p><strong>Lokasi:</strong> <?php echo $vk["lokasi_acara"]; ?></p>
                        <p><strong>Deskripsi:</strong><br><?php echo nl2br($vk["keterangan_kegiatan"]); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- GALERI -->
<section class="mb-5 p-5 bg-light shadow">
    <div class="container">
        <h3 class="mb-5 text-center fw-bold" data-aos="fade-right">GALERI MOTOCLUB</h3>
        <div class="row g-4">
            <?php foreach ($galeri as $vg) : ?>
                <div class="col-md-4 col-6" data-aos="zoom-in">
                    <div class="galeri-card position-relative overflow-hidden rounded shadow-sm">
                        <img src="assets/file/<?php echo $vg["foto_galeri"]; ?>" class="img-fluid galeri-image" alt="Galeri">
                        <div class="galeri-caption position-absolute w-100 text-center text-white px-2">
                            <?php echo htmlspecialchars($vg["judul"]); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4">
            <a href="semua_galeri.php" class="btn fw-bold text-white" style="background-color:rgb(0, 8, 77);">SEMUA GALERI</a>
        </div>
    </div>
</section>

<?php include "footer.php"; ?>

<!-- AOS Animations -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    AOS.init({
      once: false,
      offset: 150,
      duration: 1200,
      easing: 'ease-out-back',
      delay: 200,
    });
  });
</script>

<!-- CSS Tambahan -->
<style>
    * {
        box-sizing: border-box;
    }

    body {
        overflow-x: hidden;
    }

    .event-card {
        border-radius: 16px;
        background-color: #f9f9f9;
        transition: all 0.3s ease;
        cursor: default;
    }

    .event-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08);
    }

    .galeri-card {
        height: 250px;
        position: relative;
        cursor: pointer;
        border-radius: 12px;
        overflow: hidden;
    }

    .galeri-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .galeri-card:hover .galeri-image {
        transform: scale(1.05);
    }

    .galeri-caption {
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
        padding: 10px;
        font-size: 15px;
        font-weight: 500;
        opacity: 0;
        transform: translateY(100%);
        transition: all 0.4s ease;
    }

    .galeri-card:hover .galeri-caption {
        opacity: 1;
        transform: translateY(0);
    }
</style>
