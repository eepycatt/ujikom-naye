<?php 
include "header.php";

$ambil_kegiatan = $koneksi->query("SELECT * FROM kegiatan");
$kegiatan = array();
while ($tiap_kegiatan = $ambil_kegiatan->fetch_assoc()) {
    $kegiatan[] = $tiap_kegiatan;
}
?>

<style>
    .event-card {
        transition: all 0.3s ease;
        border: none;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        background-color: #fdfdfd;
        cursor: default;
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    }

    .see-detail-btn {
        background-color: #778DA9 !important;
        border-color: #778DA9 !important;
        color: white;
    }

    .see-detail-btn:hover {
        background-color: #60748d !important;
        border-color: #60748d !important;
    }

    .coming-soon {
        font-size: 13px;
        font-weight: bold;
        color: #007bff;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
</style>

<div class="container mt-5">
<h3 class="text-center my-5 fw-bold" data-aos="fade-right" style="letter-spacing: 1px;">EVENT MOTOCLUB</h3>
    <hr>
    <div class="row g-4">
        <?php foreach ($kegiatan as $value): ?>
            <div class="col-md-6 col-lg-4" data-aos="fade-up">
                <div class="card event-card p-4 h-100">
                    <h5 class="card-title mb-1"><?php echo $value["nama_kegiatan"]; ?></h5>
                    <p class="text-muted mb-1">
                        <?php 
                        if (!empty($value["tanggal_acara"])) {
                            echo date("d M Y", strtotime($value["tanggal_acara"]));
                        }
                        if (!empty($value["lokasi_acara"])) {
                            echo " - " . $value["lokasi_acara"];
                        }
                        ?>
                    </p>
                    <p class="text-muted"><?php echo substr(strip_tags($value["keterangan_kegiatan"]), 0, 100); ?>...</p>
                    <div class="coming-soon mb-2">Coming Soon</div>
                    <button type="button" class="btn see-detail-btn btn-sm" data-bs-toggle="modal" data-bs-target="#modal<?php echo $value['id_kegiatan']; ?>">
                        See Details
                    </button>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modal<?php echo $value['id_kegiatan']; ?>" tabindex="-1" aria-labelledby="modalLabel<?php echo $value['id_kegiatan']; ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel<?php echo $value['id_kegiatan']; ?>">
                                <?php echo $value["nama_kegiatan"]; ?>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Tanggal:</strong> <?php echo date("d M Y", strtotime($value["tanggal_acara"])); ?></p>
                            <p><strong>Lokasi:</strong> <?php echo $value["lokasi_acara"]; ?></p>
                            <p><strong>Deskripsi:</strong><br><?php echo nl2br($value["keterangan_kegiatan"]); ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<?php include "footer.php"; ?>
