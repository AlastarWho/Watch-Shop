-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2024 at 10:38 AM
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
-- Database: `watchshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `shipping_method` varchar(50) NOT NULL,
  `shipping_cost` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `address`, `phone`, `shipping_method`, `shipping_cost`, `total_price`, `created_at`) VALUES
(1, 'Ahmad fadhil', 'asdsa', '18y32', 'standard', 10.00, 10.00, '2024-07-15 14:22:39'),
(2, 'Ahmad fadhil', 'asdjsbad', '1283y21893', 'standard', 10.00, 10.00, '2024-07-15 14:23:47'),
(3, 'Ainan Hammal', 'ajasjdb', '21yywqe', 'standard', 10.00, 10.00, '2024-07-15 14:28:40'),
(4, 'Ahmad fadhil', 'asdjb', '018390', 'overnight', 30.00, 30.00, '2024-07-15 15:14:16'),
(5, 'Ahmad fadhil', 'AKJDJSAB', '91390218', 'standard', 10.00, 10.00, '2024-07-15 15:58:04'),
(6, 'Ahmad fadhil', 'asdm', '103i213', 'standard', 10.00, 10.00, '2024-07-15 16:57:07'),
(7, 'Ahmad fadhil', 'adasd', '123213', 'overnight', 30.00, 30.00, '2024-07-15 21:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 2, 1, 3),
(2, 3, 2, 1),
(3, 4, 2, 2),
(4, 4, 1, 2),
(5, 5, 4, 1),
(6, 5, 2, 1),
(7, 5, 1, 1),
(8, 5, 8, 1),
(9, 6, 1, 1),
(10, 7, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'DETIK VROLEX 0.3', 'Detik Vrolex 0.3 adalah jam tangan premium yang memadukan desain elegan dengan teknologi penunjuk waktu yang presisi. Dibuat dari bahan berkualitas tinggi seperti stainless steel dan kaca safir, jam tangan ini dirancang untuk ketahanan dan keanggunan yang abadi.\r\n\r\nFitur Utama:\r\nDesain Modern: Tampil dengan gaya yang elegan dan minimalis.\r\nKetahanan Air: Ideal untuk penggunaan sehari-hari maupun kegiatan outdoor.\r\nTeknologi Presisi: Dilengkapi dengan mesin jam tangan terbaik untuk akurasi waktu yang sempurna.\r\nBahan Premium: Terbuat dari stainless steel dan kaca safir yang tahan gores.\r\nDetik Vrolex 0.6 adalah pilihan sempurna bagi mereka yang menghargai kemewahan dan keandalan dalam setiap detik.', 553.00, 'jam1.png'),
(2, 'DETIK PINELPLE 45', 'Detik Pineapple adalah jam tangan pintar premium yang menggabungkan desain elegan dengan fitur-fitur canggih setara Apple Watch. Dirancang untuk memenuhi kebutuhan gaya hidup modern, Detik Pineapple menghadirkan kemewahan dan fungsionalitas dalam satu paket sempurna.\r\n\r\nFitur Utama:\r\nLayar Sentuh Retina: Tampilan jernih dan responsif dengan kualitas gambar yang tajam.\r\nPelacak Kesehatan: Monitor detak jantung, pengingat aktivitas, dan fitur pelacak tidur.\r\nGPS Terintegrasi: Navigasi yang akurat untuk aktivitas outdoor Anda.\r\nTahan Air: Desain tahan air hingga 50 meter, ideal untuk berenang dan kegiatan air lainnya.\r\nNotifikasi Cerdas: Terima panggilan, pesan, dan notifikasi langsung di pergelangan tangan Anda.\r\nAplikasi Kustom: Sinkronisasi dengan berbagai aplikasi kesehatan dan kebugaran.\r\nMengapa Memilih Detik Pineapple?\r\nDetik Pineapple menawarkan kombinasi sempurna antara gaya dan teknologi, memberikan Anda jam tangan yang tidak hanya indah tetapi juga fungsional. Nikmati kemewahan dan kenyamanan dengan setiap detik yang Anda habiskan bersama Detik Pineapple.\r\n\r\n', 125.00, 'apple watch.jpeg'),
(3, 'Detik Velocity 0.2', 'Detik Velocity adalah jam tangan premium yang dirancang untuk Anda yang mengutamakan ketepatan dan gaya hidup aktif. Menggabungkan teknologi canggih dengan desain yang sporty dan elegan, Detik Velocity siap menemani Anda dalam setiap momen berharga, baik di kantor, gym, atau saat berpetualang di alam terbuka.\r\n\r\nFitur Utama:\r\nDesain Sporty dan Elegan: Kombinasi sempurna antara keanggunan dan ketangguhan, dengan bahan stainless steel yang tahan lama dan tali karet yang nyaman.\r\nLayar Digital Multi-fungsi: Menampilkan waktu, tanggal, dan berbagai informasi lainnya dengan tampilan yang jernih dan mudah dibaca.\r\nKetepatan Tinggi: Dilengkapi dengan teknologi quartz yang menjamin akurasi waktu yang luar biasa.\r\nTahan Air hingga 100 Meter: Ideal untuk aktivitas sehari-hari maupun olahraga air.\r\nFitur Kronograf: Fungsi stopwatch untuk membantu mengukur waktu dengan presisi tinggi, sempurna untuk olahraga dan aktivitas lainnya.\r\nLampu Latar LED: Memungkinkan Anda untuk melihat waktu dengan jelas dalam kondisi cahaya rendah atau gelap.\r\nKeunggulan Detik Velocity:\r\nKualitas Terbaik: Terbuat dari material berkualitas tinggi yang memastikan daya tahan dan performa optimal.\r\nDesain Ergonomis: Nyaman dipakai sepanjang hari dengan desain yang sesuai dengan pergelangan tangan Anda.\r\nFleksibilitas dan Fungsionalitas: Cocok untuk berbagai kegiatan, baik formal maupun kasual.\r\nGaya yang Berkelas: Menambahkan sentuhan gaya dan elegan pada penampilan Anda.', 321.00, 'jam2.png'),
(4, 'Detik Eclipse V 1.2', 'Detik Eclipse adalah jam tangan premium yang dirancang untuk para pecinta keanggunan dan teknologi. Dengan kombinasi sempurna antara desain elegan dan fitur canggih, Detik Eclipse menghadirkan pengalaman baru dalam dunia horologi.\r\n\r\nFitur Utama:\r\nDesain Elegan: Menggabungkan estetika modern dengan sentuhan klasik, Detik Eclipse memancarkan kemewahan dalam setiap detailnya. Casing stainless steel yang dipoles dengan sempurna, dikombinasikan dengan tali kulit asli atau rantai logam premium.\r\nLayar Sentuh AMOLED: Tampilan yang jernih dan tajam dengan teknologi layar sentuh AMOLED, memberikan pengalaman visual yang luar biasa.\r\nPelacak Kesehatan Canggih: Monitor detak jantung, pengukur oksigen dalam darah, dan pelacak aktivitas harian yang membantu Anda menjaga kesehatan dengan mudah.\r\nGPS dan Navigasi: Fitur GPS terintegrasi yang memberikan navigasi akurat dan pelacakan aktivitas outdoor.\r\nTahan Air: Dengan ketahanan air hingga 50 meter, Detik Eclipse cocok untuk berbagai aktivitas air seperti berenang dan snorkeling.\r\nNotifikasi Pintar: Tetap terhubung dengan menerima notifikasi panggilan, pesan, dan aplikasi langsung di pergelangan tangan Anda.\r\nBaterai Tahan Lama: Baterai yang dirancang untuk bertahan hingga 7 hari dalam penggunaan normal, memastikan Anda tetap aktif tanpa perlu sering mengisi daya.', 223.00, 'jam3.png'),
(5, 'Detik Grandiose', 'Detik Grandiose adalah perwujudan tertinggi dari kemewahan dan presisi dalam dunia jam tangan. Dirancang untuk mereka yang menghargai keindahan dan keanggunan, Detik Grandiose menawarkan kombinasi sempurna antara desain yang megah dan teknologi terkini.\r\n\r\nFitur Utama:\r\nDesain Megah: Dengan casing yang dirancang dengan detail yang sangat teliti dari bahan-bahan premium seperti emas atau platinum, Detik Grandiose memberikan kesan kemewahan yang tak tertandingi.\r\nLayar Super AMOLED: Tampilan yang luar biasa dengan resolusi tinggi dan kecerahan yang intens, memberikan pengalaman visual yang mendalam.\r\nTeknologi Terkini: Fitur-fitur canggih seperti monitor detak jantung, pelacak kesehatan, dan aplikasi pelatihan fisik untuk mendukung gaya hidup aktif Anda.\r\nKeandalan Maksimal: Dilengkapi dengan teknologi penunjuk waktu yang presisi dan ketahanan terhadap guncangan untuk performa yang optimal dalam setiap kondisi.\r\nKenyamanan Sepanjang Hari: Tali jam yang nyaman dipakai, cocok untuk penggunaan sehari-hari tanpa mengorbankan gaya.', 655.00, 'jam4.png'),
(6, 'Detik Monarch 4.5', 'Detik Monarch adalah puncak dari kemewahan dan kekuatan dalam dunia jam tangan. Dirancang untuk mereka yang menghargai eksklusivitas dan keanggunan, Detik Monarch menggabungkan desain yang megah dengan teknologi mutakhir.\r\n\r\nFitur Utama:\r\nDesain Megah: Dengan casing yang dibuat dengan presisi dari material-material pilihan seperti titanium atau platinum, Detik Monarch memancarkan kemewahan yang tak tertandingi.\r\nLayar Super AMOLED: Tampilan yang brilian dengan resolusi tinggi dan kecerahan yang optimal, memberikan pengalaman visual yang luar biasa.\r\nTeknologi Tinggi: Fitur-fitur canggih seperti monitor detak jantung, pelacak kesehatan, dan aplikasi pelatihan fisik untuk mendukung gaya hidup aktif dan sehat.\r\nKetahanan Maksimal: Dilengkapi dengan teknologi tahan air dan debu serta tahan terhadap guncangan, Detik Monarch siap menemani Anda dalam setiap petualangan.\r\nKenyamanan Premium: Tali jam yang dirancang untuk kenyamanan maksimal, memastikan Anda dapat memakainya sepanjang hari tanpa merasa tidak nyaman.', 431.00, 'jam5.png'),
(7, 'Detik Prestige 8.7', 'Detik Prestige adalah pilihan utama bagi mereka yang mengutamakan kemewahan dan keunggulan dalam jam tangan. Dirancang dengan presisi dan perhatian terhadap detail, Detik Prestige menghadirkan kombinasi yang sempurna antara desain yang elegan dan teknologi tinggi.\r\n\r\nFitur Utama:\r\nDesain Elegan: Casing yang dirancang dengan teliti dari material-material premium seperti stainless steel atau titanium, dengan pilihan finishing yang eksklusif.\r\nLayar Sentuh Super AMOLED: Tampilan yang brilian dengan resolusi tinggi, memberikan pengalaman visual yang mendalam dan intuitif.\r\nFitur Kesehatan dan Kebugaran: Monitor detak jantung, pelacak aktivitas harian, dan aplikasi pelatihan untuk membantu Anda mencapai gaya hidup sehat.\r\nKonektivitas Mutakhir: Sinkronisasi dengan smartphone Anda untuk menerima notifikasi penting dan mengakses aplikasi yang Anda butuhkan.\r\nKetahanan Tinggi: Dilengkapi dengan teknologi tahan air dan debu, serta ketahanan terhadap guncangan, menjadikan Detik Prestige sebagai pilihan ideal untuk berbagai kondisi.', 499.00, 'jam6.png'),
(8, 'Detik Supreme V.1', 'Detik Supreme adalah simbol dari kemewahan yang tak tertandingi dan kecanggihan teknologi dalam dunia jam tangan. Dirancang untuk mereka yang menghargai eksklusivitas dan prestise, Detik Supreme menghadirkan kombinasi sempurna antara desain yang megah dan fitur-fitur tingkat tinggi.\r\n\r\nFitur Utama:\r\nDesain Megah dan Elegan: Casing yang dibuat dengan presisi dari material-material pilihan seperti emas putih atau platinum, dengan pilihan finishing yang eksklusif seperti penutup kaca safir.\r\nLayar Sentuh Super AMOLED: Tampilan yang brilian dengan resolusi tinggi dan kecerahan yang optimal, memberikan pengalaman visual yang sangat memuaskan.\r\nTeknologi Mutakhir: Fitur-fitur canggih seperti monitor detak jantung, pelacak kesehatan, dan aplikasi pelatihan untuk memantau dan meningkatkan kesehatan Anda.\r\nKonektivitas Luar Biasa: Sinkronisasi dengan smartphone Anda untuk menerima notifikasi penting, mengakses aplikasi, dan mengontrol fitur jam tangan dengan mudah.\r\nKetahanan Tinggi: Dilengkapi dengan teknologi tahan air hingga kedalaman tertentu dan tahan terhadap guncangan, menjadikan Detik Supreme cocok untuk penggunaan sehari-hari dan petualangan ekstrem.', 299.00, 'jam7.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'mahasiswa', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
