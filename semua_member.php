<?php 
include "header.php";

// Mengambil data dari tabel member
$ambil_member = $koneksi->query("SELECT * FROM member");

// Menyimpan data dalam array
$member = array();
while ($tiap_member = $ambil_member->fetch_assoc()) {
    $member[] = $tiap_member;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Anggota Kami</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <style>
        body {
            background-color: #f4f6f5;
        }

        h3 {
            color: #1B263B;
            font-weight: bold;
        }

        .member-card {
            text-align: center;
            padding: 20px;
            margin-bottom: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
        }

        .member-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .member-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 4px solid #dee2e6;
            transition: transform 0.3s ease;
        }

        .member-card:hover .member-img {
            transform: scale(1.05);
        }

        .member-name {
            font-weight: bold;
            font-size: 1.1rem;
        }

        .member-desc {
            color: #4a4a4a;
            font-size: 0.95rem;
        }

        .see-detail {
            color: #007bff;
            cursor: pointer;
            font-size: 0.9rem;
            margin-top: 10px;
            display: inline-block;
            transition: color 0.2s ease;
        }

        .see-detail:hover {
            color: #0056b3;
        }

        .detail-text {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease, opacity 0.3s ease;
            font-size: 0.9rem;
            color: #444;
            opacity: 0;
        }

        .detail-text.show {
            max-height: 500px;
            opacity: 1;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h3 class="text-center my-5">ANGGOTA KAMI</h3>
    <div class="row justify-content-center">
        <?php 
        $delay = 0;
        foreach ($member as $m): 
        ?>
            <div class="col-md-4 col-lg-3">
                <div class="member-card" style="animation-delay: <?= $delay ?>s;">
                    <img src="uploads/<?php echo $m['foto']; ?>" class="member-img" alt="<?php echo $m['nama']; ?>">
                    <div class="member-name"><?php echo $m['nama']; ?></div>
                    <span class="see-detail" onclick="toggleDetail(this)">See Detail</span>
                    <div class="detail-text">
                        <?php echo nl2br($m['deskripsi']); ?>
                    </div>
                </div>
            </div>
        <?php 
        $delay += 0.1;
        endforeach; 
        ?>
    </div>
</div>

<script>
function toggleDetail(element) {
    const detail = element.nextElementSibling;
    if (detail.classList.contains("show")) {
        detail.classList.remove("show");
        element.textContent = "See Detail";
    } else {
        detail.classList.add("show");
        element.textContent = "Hide Detail";
    }
}
</script>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include "footer.php"; ?>
