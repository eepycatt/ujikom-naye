-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2025 at 06:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_uts`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username_admin` varchar(100) NOT NULL,
  `password_admin` varchar(100) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `foto_admin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password_admin`, `nama_admin`, `foto_admin`) VALUES
(1, 'admin1', 'admin1', 'nayi', '67f7d3cce5659_images_waifu2x_art_noise3_scale.png');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `nama_berita` varchar(255) NOT NULL,
  `keterangan_berita` text NOT NULL,
  `foto_berita` varchar(255) NOT NULL,
  `tanggal_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `nama_berita`, `keterangan_berita`, `foto_berita`, `tanggal_update`) VALUES
(8, 'Shijiro Sediakan Knalpot Racing Buat Yamaha Mio, Segini Harganya ', 'Shijiro ternyata jual knalpot racing buat Yamaha Mio. Produsen knalpot racing yang beken di kalangan pengguna Vespa matic saat ini sediakan juga knalpot buat motor matic berkode 5TL ini. Buat Yamaha Mio yang sudah lakukan upgrade performa seperti bore up, Shijiro siapkan tipe Kenochi. \"Tipe Kenochi sendiri ada tiga macam, yang paling dicari Kenochi black,\"  buka Yudi Kurniawan dari Tim Marketing Shijiro kepada GridOto pada Kamis (31/10).\r\nPerbedaan tipe knalpot besutan Shijiro ada pada ukuran leher maupun inlet. \"Yang tipe K1 P1 (ukuran lehernya) 26 mm, K2 28 mm sedangkan inletnya sama yaitu 38 mm,\" kata pria yang akrab dipanggil Maleha ini.', '20250415132309a.jpeg', '2025-04-15'),
(9, 'Yamalube “TURBO” Matic Resmi Hadir, Pilihan Oli Terbaik untuk Motor Matic Premium', 'Bogor – Setelah menutup tahun 2024 dengan meluncurkan produk baru AEROX ALPHA yang sukses menjadi perbincangan dan viral di jagad media sosial, PT Yamaha Indonesia Motor Mfg. kembali membuka awal tahun 2025 degan menghadirkan kejutan bagi para pecinta skutik premium di tanah air. Kali ini, kejutan tersebut tidak datang dari produk sepeda motor, melainkan dari produk oli Yamalube.\r\nBertepatan dengan event AEROX ALPHA Track Day yang di gelar pada Rabu (15/1), Yamaha secara resmi memperkenalkan varian oli terbaru, yaitu Yamalube “TURBO” Matic. Kehadiran oli baru ini selain menjadi pelengkap dari jajaran oli yang sudah ada di pasaran, juga menjadi bentuk komitmen Yamaha untuk senantiasa menghadirkan inovasi produk dalam rangka meningkatkan kualitas berkendara konsumen di level tertinggi.\r\n“Hari ini selain kegiatan test ride atau Track Day AEROX ALPHA, Yamaha juga ingin memperkenalkan produk baru kepada konsumen pecinta skutik premium. Namun ini bukan sepeda motor, melainkan varian oli baru dari Yamalube yang akan menjadi pelengkap dari line up oli-oli Yamalube yang sudah ada di market. Oli baru ini merupakan varian tertinggi atau flagship model yang dikhususkan untuk para konsumen pengguna skutik premium Yamaha. Formula dan spek dari oli baru ini mampu memberikan benefit yang lebih maksimal, baik dari segi proteksi, perfoma, maupun juga endurance dalam menjaga kondisi mesin motor tetap optimal.” Ungkap Sutarya, Senior Director Marketing, PT Yamaha Indonesia Motor Mfg. saat memberikan kata sambutan pada acara Launching oli baru Yamalube.\r\n\r\n \r\n\r\nYamalube “TURBO” Matic adalah oli mesin jenis Full Synthetic Premium yang dirancang khusus untuk motor matic Yamaha, terutama kategori MAXI. Dengan tingkat viskositas atau kekentalan SAE 10W-40 dan API Service di level SN, oli baru ini menawarkan performa luar biasa dalam berbagai kondisi berkendara dengan tiga keunggulan sebagai berikut.', '20250415132725c.jpeg', '2025-04-15'),
(10, 'Motor New Honda Scoopy Pakai Penerangan LED Crystal Block hingga Velg Terbaru 5 Palang  ', '\"Sistem pencahayaan yang semakin fokus kini menggunakan LED dengan desain teknologi crystal block yang unik dan modern, serta membantu visual pengendara di jalan raya,\" ujarnya, Rabu (20/11/2024).\r\n\r\nDesain terbaru pada area tata cahaya, selain menggunakan teknologi LED crystal block pada lampu depan, di bagian lampu belakang juga memiliki pembaruan desain yang turut menunjang keseluruhan desain New Honda Scoopy yang semakin total dengan tampilan unik dan bergaya.\r\n\r\nPada area kemudi, model ini memiliki tampilan yang semakin berbeda dengan desain Digital Panel Meter yang berkesan modern, area handle cover yang kini tertutup, serta USB Type-C Charger yang semakin mempermudah mobilitas harian penggunanya.', '20250415135614g.jpg', '2025-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `foto_galeri` varchar(255) NOT NULL,
  `judul` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `foto_galeri`, `judul`) VALUES
(8, '20250415134922g.jpeg', 'Touring to Banten'),
(9, '20250415134938f.jpg', 'Touring to Bali'),
(10, '20250415134947e.jpg', 'Pembagian Takjil Gratis'),
(11, '20250415134956c.jpeg', 'Event Yamalube'),
(12, '20250415140612h.jpg', 'Pembagian Takjil '),
(13, '20250415140630i.jpg', 'Event Nusantara');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `keterangan_kegiatan` text NOT NULL,
  `tanggal_acara` date DEFAULT NULL,
  `lokasi_acara` varchar(100) DEFAULT NULL,
  `foto_kegiatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `keterangan_kegiatan`, `tanggal_acara`, `lokasi_acara`, `foto_kegiatan`) VALUES
(11, 'Touring ', 'Bro & sis, kita bakal gas bareng ke Bromo!\r\nTouring ini kita adain buat ngilangin penat, nikmatin alam, dan makin nguatin solidaritas antar anggota.\r\nRencana riding santai tapi tetep tertib, enjoy pemandangan, dan pastinya sunrise di Penanjakan wajib gak boleh kelewat!', '2025-04-25', 'BROMO', ''),
(12, 'Touring To Banten', 'Bro & sis, kita bakal gas bareng ke Bromo!\r\nTouring ini kita adain buat ngilangin penat, nikmatin alam, dan makin nguatin solidaritas antar anggota.\r\nRencana riding santai tapi tetep tertib, enjoy pemandangan, dan pastinya sunrise di Penanjakan wajib gak boleh kelewat!', '2025-04-30', 'PANDEGLANG', '');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `link_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `nama_produk`, `harga_produk`, `gambar_produk`, `deskripsi_produk`, `metode_pembayaran`, `link_produk`) VALUES
(2, 'Bell Revolver Evo Modular ', 1000000, 'bell.jpeg', 'Helm modular dari Bell ini adalah salah satu yang terbaik di luar sana dengan harga yang terjangkau.', 'All Payment', ''),
(4, 'VND Velg Racing', 1700000, 'b.jpg', 'VELG VND BINTANG LAUT SPORT RIM SUPREM.\r\n1 Set (2 PCS)', 'All Payment', ''),
(5, 'Knalpot Standar Racing KENOCHI', 1300000, 'y.jpg', 'Kini hadir knalpot standar racing terbaru dari KENOCHI Racing untuk motor matic dengan :\r\n* type K\r\n* dan variasi pilihan type dan inlet:\r\n- K1 (untuk spek Standar/110 cc - 130 cc,\r\ndan inlet 38mm, P1 26mm luar)\r\n- K2 (untuk spek Bore up 140cc - 170cc, dan inlet\r\n38mm, P1 28mm luar)\r\n- K3 (untuk spek Bore up 180cc - keatas, dan inlet\r\n45mm, P1 30mm dalam)\r\n* dengan pilihan Cover:\r\n- Non Cover\r\n- Cover Stainless Steel\r\n* untuk motor matic:\r\n- Mio Karbu (Smile, Sporty dan Soul)\r\n- Mio J/Soul GT 115/X-Ride 115\r\n- Mio 125 /Mio M3/Gear125/Frego/FAZZIO/ Soul GT 125/FINO 125\r\n- Beat Karbu dan Scoopy Karbu\r\n- Beat Fi dan Scoopy Fi/Beat ESP (thn 2019 kebawah)\r\n- GENIO/New Beat 2020/New Scoopy fi 2021(thn 2020 keatas)\r\n- Xeon RC', 'All Payment', 'https://tokopedia.link/wfDyfTH3zSb'),
(6, 'Yamalube Turbo Matic 1 lt 10w', 110000, '20250415134123_d.jpg', 'Yamalube Turbo Matic 1 lt 10w - 40 Full Synthetic API service SN 90793-AJ911\r\nKode Part 90793AJ91100\r\nHarga tertera adalah Harga Satuan', 'All Payment', 'https://www.tokopedia.com/yamahagc/yamalube-turbo-matic-1-lt-10w-40-full-synthetic-api-service-sn-90793-aj911-1730808900313515388?utm_source=whatsapp&utm_medium=share&utm_campaign=pdp-haqv0c2wv9gj-16099064554-0');

-- --------------------------------------------------------

--
-- Table structure for table `tentang`
--

CREATE TABLE `tentang` (
  `id` int(11) NOT NULL,
  `tentang_kami` varchar(255) NOT NULL,
  `visi` varchar(255) NOT NULL,
  `misi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `tentang`
--
ALTER TABLE `tentang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tentang`
--
ALTER TABLE `tentang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
