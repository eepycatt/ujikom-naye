<?php include "header.php"; ?>

<style>
    .klien-section {
        max-width: 1200px;
        margin: 0 auto;
        padding: 60px 20px;
    }

    .klien-section h4 {
        text-align: center;
        margin-bottom: 40px;
        font-size: 2rem;
        font-weight: 700;
        color: #1B263B;
        animation: fadeSlideDown 0.8s ease-out forwards;
    }

    .klien-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .klien-list li {
        background-color: #fff;
        padding: 20px;
        border-radius: 16px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 130px;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeUp 0.6s ease forwards;
    }

    .klien-list li:nth-child(1) { animation-delay: 0.1s; }
    .klien-list li:nth-child(2) { animation-delay: 0.2s; }
    .klien-list li:nth-child(3) { animation-delay: 0.3s; }
    .klien-list li:nth-child(4) { animation-delay: 0.4s; }
    .klien-list li:nth-child(5) { animation-delay: 0.5s; }
    .klien-list li:nth-child(6) { animation-delay: 0.6s; }
    .klien-list li:nth-child(7) { animation-delay: 0.7s; }
    .klien-list li:nth-child(8) { animation-delay: 0.8s; }
    .klien-list li:nth-child(9) { animation-delay: 0.9s; }

    .klien-list li:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
    }

    .klien-list img {
        max-height: 80px;
        max-width: 120px;
        object-fit: contain;
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeSlideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 576px) {
        .klien-section {
            padding: 40px 15px;
        }

        .klien-section h4 {
            font-size: 1.5rem;
            margin-bottom: 30px;
        }

        .klien-list li {
            height: 100px;
            padding: 15px;
        }

        .klien-list img {
            max-height: 60px;
        }
    }
</style>

<div class="klien-section">
    <h4>DAFTAR KLIEN</h4>
    <ul class="klien-list">
        <li><img src="assets/file/image_honda.png" alt="Honda"></li>
        <li><img src="assets/file/image_suzuki.png" alt="Suzuki"></li>
        <li><img src="assets/file/image_yamaha.png" alt="Yamaha"></li>
        <li><img src="assets/file/kawasaki.png" alt="Kawasaki"></li>
        <li><img src="assets/file/kit.png" alt="KIT"></li>
        <li><img src="assets/file/maxxis.png" alt="Maxxis"></li>
        <li><img src="assets/file/shell.png" alt="Shell"></li>
        <li><img src="assets/file/traveloka.png" alt="Traveloka"></li>
        <li><img src="assets/file/pertamina.png" alt="Pertamina"></li>
    </ul>
</div>

<?php include "footer.php"; ?>
