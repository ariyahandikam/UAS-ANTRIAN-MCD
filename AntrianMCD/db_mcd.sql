-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 03:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrian_mcd`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id` int(225) NOT NULL,
  `waktudatang` time NOT NULL,
  `selisihkedatangan` int(225) NOT NULL,
  `awalpelayanan` time NOT NULL,
  `selisihpelayanankasir` int(225) NOT NULL,
  `selesai` time NOT NULL,
  `selisihkeluarantrian` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id`, `waktudatang`, `selisihkedatangan`, `awalpelayanan`, `selisihpelayanankasir`, `selesai`, `selisihkeluarantrian`) VALUES
(2, '12:07:00', 0, '12:07:00', 1, '12:08:00', 1),
(3, '12:08:00', 1, '12:09:00', 2, '12:11:00', 2),
(4, '12:09:00', 0, '12:11:00', 3, '12:13:00', 4),
(5, '12:12:00', 3, '12:13:00', 1, '12:14:00', 2),
(6, '12:13:00', 1, '12:14:00', 1, '12:15:00', 2),
(7, '12:14:00', 1, '12:15:00', 1, '12:16:00', 2),
(8, '12:15:00', 1, '12:16:00', 1, '12:17:00', 2),
(9, '12:16:00', 1, '12:17:00', 1, '12:18:00', 2),
(10, '12:17:00', 1, '12:18:00', 1, '12:19:00', 2),
(11, '12:18:00', 1, '12:19:00', 1, '12:20:00', 2),
(12, '12:19:00', 1, '12:20:00', 1, '12:21:00', 2),
(13, '12:25:00', 6, '12:30:00', 5, '12:34:00', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
