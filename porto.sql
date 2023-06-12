-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 09:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `porto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'hanif', '$2a$12$7BZcR6fH5miVRzYB0lEdROqTNaU5D/WbtSLvRpQ35NH3rQHU9uW5W');

-- --------------------------------------------------------

--
-- Table structure for table `portolist`
--

CREATE TABLE `portolist` (
  `id` int(64) NOT NULL,
  `gambar` varchar(256) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portolist`
--

INSERT INTO `portolist` (`id`, `gambar`, `title`, `description`, `link`) VALUES
(2, 'huwaa.png', 'JavaFX Games', 'Game dengan tema arcade ini dibuat dengan bahasa java, tepatnya dengan library javaFX. JavaFX merupakan suatu library yang memungkinkan pembuatan aplikasi desktop atau gui. Pada pembangunan game ini saya menggunakan IDE IntelijIdea dengan plugin tambahan, yaitu SceneBuilder. SceneBuilder menggunakan bahasa FXML dan bisa digunakan dengan drag and drop. Selain itu untuk mempercantik tampilan juga bisa dengan menggunakan css dengan format penulisan untuk FXML.', 'https://github.com/Habbatul/JavaFX_Game_ByHqHan'),
(3, 'IMG_20230125_181312.jpg', 'Cinematic Unity', 'Cinematic 3D Scene bertemakan alam. Scene ini dibuat dalam bentuk aplikasi desktop (windows). Untuk membangun environtment yang realistis, disini menggunakan Unity HDRP. Untuk asset gratis saya download dari beberapa penyedia asset, yaitu texture PBR dari freepbr.com dan Asset model dari UnityHub. Untuk Pepohonan adalah modifikasi dari asset URP yang saya konfigurasikan agar mampu menjadi realistis dan dapat digunakan di Unity HDRP. Kemudian asset api adalah object particle yang saya buat sendiri menggunakan ShaderGraph.', 'https://www.youtube.com/watch?v=FarFx6IyDqE'),
(15, 'Screenshot 2023-06-11 200607.png', 'AnimalAR', 'Aplikasi pembelajaran hewan berbasis android. Aplikasi ini dibangun menggunakan Unity. Fitur AR dibuat dengan Vuforia Engine. Cara kerja aplikasi adalah dengan menggunakan scan gambar yang sudah didaftarkan pada database vuforia yang sudah diintegrasikan dengan aplikasi, kemudian pengguna dapat berinteraksi dengan hewan yang berhasil discan.', 'https://www.youtube.com/watch?v=wL41uHY7k_g&amp;t=7s');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portolist`
--
ALTER TABLE `portolist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portolist`
--
ALTER TABLE `portolist`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
