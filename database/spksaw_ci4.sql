-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 03:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spksaw_ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alternative`
--

CREATE TABLE `tbl_alternative` (
  `id_alternative` int(11) NOT NULL,
  `kode_alternative` varchar(5) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `nama_alternative` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_alternative`
--

INSERT INTO `tbl_alternative` (`id_alternative`, `kode_alternative`, `id_mhs`, `nama_alternative`) VALUES
(24, '20165', 20, 'angga triawan1653833401'),
(25, '21165', 21, 'angga triawan'),
(26, '22165', 22, 'angga triawan20533251333'),
(27, '23165', 23, 'angga triawan2053325133355');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bobot`
--

CREATE TABLE `tbl_bobot` (
  `id_kriteria` int(11) NOT NULL,
  `id_sub_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bobot`
--

INSERT INTO `tbl_bobot` (`id_kriteria`, `id_sub_kriteria`) VALUES
(4, 22),
(5, 25),
(6, 30),
(7, 35);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasil`
--

CREATE TABLE `tbl_hasil` (
  `id_alternative` int(11) NOT NULL,
  `hasil` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hasil`
--

INSERT INTO `tbl_hasil` (`id_alternative`, `hasil`) VALUES
(24, 1.625),
(25, 1.375),
(26, 1.375),
(27, 1.375);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(5) NOT NULL,
  `judul_kriteria` varchar(255) NOT NULL,
  `sifat` enum('benefit','cost') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `kode_kriteria`, `judul_kriteria`, `sifat`) VALUES
(4, 'C1', 'IPK', 'benefit'),
(5, 'C2', 'KEAKTIFAN ORGANISASI', 'benefit'),
(6, 'C3', 'PRESTASI', 'benefit'),
(7, 'C4', 'PENGABDIAN MASYARAKAT', 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mhs`
--

CREATE TABLE `tbl_mhs` (
  `id_mhs` int(11) NOT NULL,
  `nim_mhs` varchar(100) NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan_mhs` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `ipk` varchar(100) NOT NULL,
  `file_ipk` varchar(100) DEFAULT NULL,
  `prestasi` varchar(100) DEFAULT NULL,
  `file_prestasi` varchar(100) DEFAULT NULL,
  `pengabdian_masyarakat` varchar(100) DEFAULT NULL,
  `file_pengabdian_masyarakat` varchar(100) DEFAULT NULL,
  `organisasi` varchar(100) DEFAULT NULL,
  `file_organisasi` int(100) DEFAULT NULL,
  `foto_mhs` varchar(100) DEFAULT NULL,
  `status` enum('Pending','Approve','Revision') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mhs`
--

INSERT INTO `tbl_mhs` (`id_mhs`, `nim_mhs`, `nama_mhs`, `tempat_lahir`, `tgl_lahir`, `email`, `jurusan_mhs`, `alamat`, `semester`, `ipk`, `file_ipk`, `prestasi`, `file_prestasi`, `pengabdian_masyarakat`, `file_pengabdian_masyarakat`, `organisasi`, `file_organisasi`, `foto_mhs`, `status`) VALUES
(20, '20533251', 'angga triawan', 'pacitan', '2022-05-12', 'anggatriawan@gmail.com', 'Teknik informatika', 'dada', '4', '4', '1653833401UMPO.png', NULL, '1653833401UMPO.png', NULL, '1653833401UMPO.png', NULL, 1653833401, '1653833401UMPO.png', 'Pending'),
(21, '20533251232', 'angga triawan', 'pacitan', '2022-05-27', 'anggatriawan@gmail.com', 'Teknik informatika', 'adaad', '4', '4', '1653833587UMPO.png', NULL, '1653833587UMPO.png', NULL, '1653833587UMPO.png', NULL, 1653833587, '1653833587UMPO.png', 'Pending'),
(22, '20533251333', 'angga triawan', 'pacitan', '2022-05-19', 'anggatriawan@gmail.com', 'Teknik informatika', 'adad', '4', '4', '1653833823UMPO.png', NULL, '1653833823UMPO.png', NULL, '1653833823UMPO.png', NULL, 1653833823, '1653833823UMPO.png', 'Pending'),
(23, '2053325133355', 'angga triawan', 'pacitan', '2022-05-19', 'anggatriawan@gmail.com', 'Teknik informatika', 'adad', '4', '4', '1653833923UMPO.png', NULL, '1653833923UMPO.png', NULL, '1653833923UMPO.png', NULL, 1653833923, '1653833923UMPO.png', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penilaian`
--

CREATE TABLE `tbl_penilaian` (
  `id_alternative` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_sub_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penilaian`
--

INSERT INTO `tbl_penilaian` (`id_alternative`, `id_kriteria`, `id_sub_kriteria`) VALUES
(24, 4, 21),
(24, 5, 26),
(24, 6, 30),
(24, 7, 34),
(25, 4, 21),
(25, 5, 26),
(25, 6, 29),
(25, 7, 34),
(26, 4, 21),
(26, 5, 25),
(26, 6, 29),
(26, 7, 33),
(27, 4, 21),
(27, 5, 25),
(27, 6, 29),
(27, 7, 33);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_kriteria`
--

CREATE TABLE `tbl_sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sub_kriteria`
--

INSERT INTO `tbl_sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `nilai`, `keterangan`) VALUES
(21, 4, 0.25, '≤ 3.00 '),
(22, 4, 0.5, '<3.24'),
(23, 4, 0.75, '<3.44'),
(24, 4, 1, '≥3.44'),
(25, 5, 0.25, 'KOMUNITAS'),
(26, 5, 0.5, 'PRODI'),
(27, 5, 0.75, 'FAKULTAS'),
(28, 5, 1, 'UNIVERSITAS'),
(29, 6, 0.25, 'LOKAL'),
(30, 6, 0.5, 'REGIONAL'),
(31, 6, 0.75, 'NASIONAL'),
(32, 6, 1, 'INTERNASIONAL'),
(33, 7, 1, 'INTERNASIONAL'),
(34, 7, 0.75, 'NASIONAL'),
(35, 7, 0.5, 'REGIONAL'),
(36, 7, 0.25, 'LOKAL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `fullname`, `password`, `role`) VALUES
(1, 'admin', 'Administrator', '$2y$08$FMeYhEo9DuFh/eUtmbNBfOqU9hGo/yhT1HJEMXmtbfsNR5nnbitEe', 'admin'),
(2, 'angga', 'angga triawanxx', '$2y$08$13cp7Axy29FxPpseQD7RaOw.jPNNYiHyMnpHHgFdZIcbWbpaVQ2Ee', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_mhs`
--

CREATE TABLE `tbl_user_mhs` (
  `id` int(11) NOT NULL,
  `username_mhs` varchar(100) NOT NULL,
  `password_mhs` varchar(100) NOT NULL,
  `id_mhs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_mhs`
--

INSERT INTO `tbl_user_mhs` (`id`, `username_mhs`, `password_mhs`, `id_mhs`) VALUES
(1, 'angga', '$2y$08$13cp7Axy29FxPpseQD7RaOw.jPNNYiHyMnpHHgFdZIcbWbpaVQ2Ee', '23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_alternative`
--
ALTER TABLE `tbl_alternative`
  ADD PRIMARY KEY (`id_alternative`);

--
-- Indexes for table `tbl_bobot`
--
ALTER TABLE `tbl_bobot`
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_sub_kriteria` (`id_sub_kriteria`);

--
-- Indexes for table `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  ADD KEY `id_alternative` (`id_alternative`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD KEY `id_alternatif` (`id_alternative`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_sub_kriteria` (`id_sub_kriteria`);

--
-- Indexes for table `tbl_sub_kriteria`
--
ALTER TABLE `tbl_sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_user_mhs`
--
ALTER TABLE `tbl_user_mhs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_alternative`
--
ALTER TABLE `tbl_alternative`
  MODIFY `id_alternative` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_sub_kriteria`
--
ALTER TABLE `tbl_sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user_mhs`
--
ALTER TABLE `tbl_user_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_bobot`
--
ALTER TABLE `tbl_bobot`
  ADD CONSTRAINT `tbl_bobot_ibfk_1` FOREIGN KEY (`id_sub_kriteria`) REFERENCES `tbl_sub_kriteria` (`id_sub_kriteria`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_bobot_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `tbl_kriteria` (`id_kriteria`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  ADD CONSTRAINT `tbl_hasil_ibfk_1` FOREIGN KEY (`id_alternative`) REFERENCES `tbl_alternative` (`id_alternative`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD CONSTRAINT `tbl_penilaian_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `tbl_kriteria` (`id_kriteria`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_penilaian_ibfk_3` FOREIGN KEY (`id_sub_kriteria`) REFERENCES `tbl_sub_kriteria` (`id_sub_kriteria`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_penilaian_ibfk_4` FOREIGN KEY (`id_alternative`) REFERENCES `tbl_alternative` (`id_alternative`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_sub_kriteria`
--
ALTER TABLE `tbl_sub_kriteria`
  ADD CONSTRAINT `tbl_sub_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `tbl_kriteria` (`id_kriteria`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
