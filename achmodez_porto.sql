-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2023 at 06:09 PM
-- Server version: 10.6.12-MariaDB-cll-lve
-- PHP Version: 8.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `achmodez_porto`
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
(1, 'hanif', '$2y$10$MwR7UXezIP7FS9xOeLIbBeoZkce06MjTpKiXakzPdPLtLBlp4/V3y'),
(2, 'sena', 'budoluwaw123'),
(5, 'sen', '123'),
(6, 'senax', 'joji1');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `email` text NOT NULL,
  `pesan` text NOT NULL,
  `ip_address` text NOT NULL,
  `last_request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'Screenshot_70.png', 'C++ Data Structure', 'Saya telah membuat berbagai macam program terminal dengan penerapan algoritma pemrograman dan data struktur, seperti Strategi Algoritma Decrease and Conquer dan Circular Single Linked List.', 'https://github.com/Habbatul/Selection-sort-dengan-Decrease-Conquer'),
(2, 'xx.png', 'Absurd Animation', 'Scene ini dibuat menggunakan blender. Animasi digenerate menggunakan Mixamo, sehingga model 3D bisa bergerak tanpa perlu melakukan rigging manual. Disini saya mengatur permukaan lingkungan dengan displacement mapping. Kemudian saya mengatur shaking camera dengan fitur noise untuk menambah kesan realistis.', 'https://www.instagram.com/p/CrYE_3dP5ow/?utm_source=ig_web_copy_link&amp;igshid=MzRlODBiNWFlZA=='),
(3, 'Screenshot_68.png', 'HqDoc', 'Contoh website anak kuliahan kebut 2 hari jadi. Website native JS, CSS, HTML, PHP. Tampilan tidak responsive dan hanya dapat berjalan dengan baik pada resolusi 1920x1080. Tidak menerapkan Patttern dan clean code. Yang ingin joki pembuatan website CRUD simple bisa melakukan chat ke instagram saya @hq.han, dan mohon maaf tidak selalu menerima jokian terutama diwaktu sibuk.', 'https://github.com/Habbatul/hqdoc'),
(4, 'Screenshot 2023-06-11 200607.png', 'AnimalAR', 'Aplikasi pembelajaran hewan berbasis android. Aplikasi ini dibangun menggunakan Unity. Fitur AR dibuat dengan Vuforia Engine. Cara kerja aplikasi adalah dengan menggunakan scan gambar yang sudah didaftarkan pada database vuforia yang sudah diintegrasikan dengan aplikasi, kemudian pengguna dapat berinteraksi dengan hewan yang berhasil discan.', 'https://github.com/Habbatul/PembelajaranHewan/releases/tag/Rilisan1'),
(5, 'cover mobile.jpg', 'Android InternalDB', 'penyimpanan internal dengan shared preference dan room presistence, serta penerapan fitur searching. Architecture yang digunakan dalam pembangunan aplikasi adalah dengan menggunakan mvvm dengan adapter.', 'https://github.com/Habbatul/AndroidNative_InternalDatabase'),
(6, 'huwaa.png', 'JavaFX Games', 'Game dengan tema arcade ini dibuat dengan bahasa java, tepatnya dengan library javaFX. JavaFX merupakan suatu library yang memungkinkan pembuatan aplikasi desktop atau gui. Pada pembangunan game ini saya menggunakan IDE IntelijIdea dengan plugin tambahan, yaitu SceneBuilder. SceneBuilder menggunakan bahasa FXML dan bisa digunakan dengan drag and drop. Selain itu untuk mempercantik tampilan juga bisa dengan menggunakan css dengan format penulisan untuk FXML. Saya juga menerapkan database untuk penyimpanan score menggunakan driver JDBC dan DBMS MySQL.', 'https://github.com/Habbatul/JavaFX_Game_ByHqHan'),
(7, 'Screenshot_69.png', '3D HeroSection', 'Konten 3D berbasis website dengan menggunakan library threeJS, TweenJS, dan bantuan Three post processing untuk hasil realistis. Konten website ini bisa ditaruh dimana saja dengan menggunakan tag canvas.', 'https://github.com/Habbatul/HeroSection-ThreeJS'),
(8, 'Screenshot_42.png', 'Volcano 3D', 'Real time rendering menggunakan unity URP dengan menerapkan post-processing dan particle. Disini saya membangun scene dengan terrain yang menggambarkan lingkungan gunung berapi ditengah lautan. Dengan menerapkan post-processing maka akan menghasilkan environtment yang lebih realistis pada Unity URP. Kemudian asap yang muncul pada gunung berapi menggunakan particle dan lamp, dimana particle dibuat menggunakan shader graph pada unity URP.', 'https://www.youtube.com/watch?v=FarFx6IyDqE&t=5s'),
(9, 'IMG_20230125_181312.jpg', 'Cinematic Unity', 'Cinematic 3D Scene bertemakan alam. Scene ini dibuat dalam bentuk aplikasi desktop (windows). Untuk membangun environtment yang realistis, disini menggunakan Unity HDRP. Untuk asset gratis saya download dari beberapa penyedia asset, yaitu texture PBR dari freepbr.com dan Asset model dari UnityHub. Untuk Pepohonan adalah modifikasi dari asset URP yang saya konfigurasikan agar mampu menjadi realistis dan dapat digunakan di Unity HDRP. Kemudian asset api adalah object particle yang saya buat sendiri menggunakan ShaderGraph.', 'https://www.youtube.com/watch?v=FarFx6IyDqE'),
(10, 'cc.png', 'Static Portofolio', 'Website portofolio yang responsive dan interaktif. Website ini dibangun dengan menggunakan Alpine JS, TailwindCSS, CSS native, JS native. Untuk konten 3D saya menerapkan proyek saya 3D heroSection. ', 'https://habbatul.github.io/'),
(11, 'Screenshot_73.png', 'Evil Panda', 'Game ini adalah game yang dibuat dengan menggunakan Unity 2019f1.40.1 dengan workspace 2D. Game ini memiliki 2 level (yang nantinya akan dilanjutkan di versi selanjutnya) dengan tema Pixel RPG. Cara bermain game ini adalah dengan membunuh semua musuh yang ada. Setelah itu player menuju portal untuk ke level selanjutnya. Disini saya bertugas sebagai Game Programmer dan Asset Coordinator/Manager. Tugas saya diantaranya adalah membuat penyimpanan level menggunakan MySQL, membuat Source code untuk perpindahan antar manu/scene, membuat source code untuk path finding, mengaplikasikan animasi 2D agar bisa berjalan (pada object game) dan menyerang (pada player). Contributor yang lain diantaranya ada Yoga Pradana Budiyanto sebagai Programmmer dan Game Designer,  Arkan Fathoni sebagai Tilemap/Terrain/Environtment maker, Taufiq Aditya Putra sebagai Asset Maker.', 'https://www.youtube.com/watch?v=x7y-fkqZ0Ng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `portolist`
--
ALTER TABLE `portolist`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
