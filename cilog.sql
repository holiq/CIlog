-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 03:23 PM
-- Server version: 8.4.0
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cilog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1, 'PHP', 'php'),
(2, 'MySQL', 'mysql'),
(3, 'Query Builder', 'query-builder'),
(4, 'Helper', 'helper');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `post_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `comment_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `view` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `user_id`, `category_id`, `content`, `view`, `created_at`) VALUES
(1, 'Tutorial Instalasi Codeigniter 4', 'tutorial-instalasi-codeigniter-4', 2, 1, '<p id=\"isPasted\">Codeigniter4 merupakan sebuah framework full-stack PHP yang ringan, cepat dan dapat diandalkan. Codeigniter4 ini merupakan sebuah kerangka pengembangan aplikasi atau toolkit, yang ditujukan untuk membuat Web menggunakan PHP.</p><p>Cara instal codeigniter 4:</p><h4>Download melalui web browser </h4><ul><li>Anda bebas menggunakan web browser apapun baik melalui google chrome atau firefox. Berikut link download codeigniter <a href=\"https://codeigniter.com/download\">https://</a><a href=\"https://codeigniter.com/download\">codeigniter.com/download</a></li></ul><p><img src=\"http://localhost:8080/uploads/1717485019_3f407ab7d9180f4aaba2.png\" style=\"width: 559px;\" class=\"fr-fic fr-dib\"></p><ul id=\"isPasted\"><li>Ekstrak CI4 menggunakan file ZIP ke dalam direktori web server anda, kemudian anda dapat membuka dan memulai pengaturan ci4. Selanjutnya salin folder tersebut ke dalam folder root anda. Yaitu di htdocs.</li><li>Selanjutnya melakukan konfigurasi base url yang terletak didalam folder <strong>application/config/config.php&nbsp;</strong>Buka file tersebut menggunakan teks editor pilihan anda.&nbsp;</li><li>Temukan bagian kode berikut <strong>$config[&#39;base_url&#39;] = &#39;&#39;;</strong> ubah menjadi <strong>$config[&#39;base_url&#39;] = &#39;http://localhost/blog&#39;;</strong>&nbsp;</li><li>Setelah semua selesai dan sudah dilakukan sesuai perintah atau step by step diatas, sekarang anda sudah bisa menjalankan project CI4</li></ul><p><br></p><h4>Install menggunakan composer</h4><p>Composer merupakan sebuah tools dependensi untuk manajemen bahasa pemrograman Php. Berikut cara untuk menginstall CI4 menggunakan composer:</p><ul><li>Download composer dan install composer di komputer kalian.</li><li>Link download composer <a href=\"https://getcomposer.org/Composer-Setup.exe\">https://</a><a href=\"https://getcomposer.org/Composer-Setup.exe\">getcomposer.org/Composer-Setup.exe</a></li><li>Jangan lupa wajib koneksi internet ya.</li><li>Jika sudah diinstal masukin file Php anda di composer jika sudah selesai akan muncul gambar seperti dibawah ini.</li></ul><p><img src=\"http://localhost:8080/uploads/1717485062_e7811ad63b8c550a3010.png\" style=\"width: 477px;\" class=\"fr-fic fr-dib\"></p><ul id=\"isPasted\"><li>Check versi composer, buka command/CMD ketik composer -v jika berhasil maka akan muncul seperti gambar dibawah ini.</li></ul><p><img src=\"http://localhost:8080/uploads/1717485088_06dfc5b3c988144e384f.png\" style=\"width: 520px;\" class=\"fr-fic fr-dib\"></p><ul id=\"isPasted\"><li id=\"isPasted\">Selanjutnya install codeigniter dengan composer&nbsp;</li><li>Ini seperti GIT, tekan tombol shift dan klik kanan pada file Codeigniter yang telah anda unduh, ubah nama codeigniter menjadi codeigniter4, pastikan bahwa url atau link yang digunakan dalam perintah dan di komputer sama.</li></ul><p><img src=\"http://localhost:8080/uploads/1717485120_8e9eedf2ae934297b444.png\" style=\"width: 538px;\" class=\"fr-fic fr-dib\"></p><ul id=\"isPasted\"><li>Selanjutnya ketik <strong>composer install</strong> di CMD tersebut, jika prosesnya sudah selesai selanjutnya ketik <strong>php spark serve</strong></li><li>Jika sudah selesai atau terbuka selanjutnya buka web browser dan ketik <strong>localhost:8080</strong> jika berhasil tampilan akan seperti gambar dibawah ini.</li></ul><p><img src=\"http://localhost:8080/uploads/1717485143_3eee68163fa5221545dc.jpg\" style=\"width: 550px;\" class=\"fr-fic fr-dib\"></p><p><br></p>', 2, '2024-06-04 13:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `role`, `password`) VALUES
(1, 'Holiq Ibrahim', 'holiq@gmail.com', 'holiq', 'Admin', '$2y$10$oSBOmk.2cuj1ImDucluFvuT4TXHKUxpSQ9qTsz9jk2sgtlRiqnAcm'),
(2, 'Mirna', 'mirna@gmail.com', 'mirna', 'Editor', '$2y$10$ZpELFBY.L5sKszNvX1vTmOcMCe6yHlXk3hQvY5HIY1z9V22gSOz3y'),
(3, 'Marnisah', 'marnisah@gmail.com', 'nisa', 'Editor', '$2y$10$/kWJTrN7NZ3W1bCgphARweRduEgw.7Avo6dv6brMqpinSlOkHsJtC'),
(4, 'Qonita', 'qonita@gmail.com', 'qonita', 'Editor', '$2y$10$NVUNAuwMz5xGPvE2hv0uMOGGHmFS5F9yJWfOF5OlwS39tuLy99cw6'),
(5, 'Firman', 'firman@gmail.com', 'firman', 'Editor', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
