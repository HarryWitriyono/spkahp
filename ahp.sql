-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 01:54 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahp`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `KodeAlternatif` int(11) NOT NULL,
  `NamaAlternatif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`KodeAlternatif`, `NamaAlternatif`) VALUES
(1, 'Andik Saputra'),
(2, 'Bagus Venanda'),
(3, 'Candra Pustpita Dewi'),
(4, 'Dia Primasari'),
(5, 'Eka Mulyani'),
(6, 'Faishol Azizi');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `KodeKriteria` int(11) NOT NULL,
  `NamaKriteria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`KodeKriteria`, `NamaKriteria`) VALUES
(1, 'Kemampuan Mengajar'),
(2, 'Sikap'),
(3, 'Jumlah Karya Ilmiah');

-- --------------------------------------------------------

--
-- Table structure for table `nilaikriteria`
--

CREATE TABLE `nilaikriteria` (
  `KodeKriteria1` int(11) NOT NULL,
  `KodeKriteria2` int(11) NOT NULL,
  `NilaiKriteria` double(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilaikriteria`
--

INSERT INTO `nilaikriteria` (`KodeKriteria1`, `KodeKriteria2`, `NilaiKriteria`) VALUES
(1, 1, 1.00);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `NamaPengguna` varchar(50) NOT NULL,
  `NamaLengkap` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `TanggalDaftar` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`NamaPengguna`, `NamaLengkap`, `Password`, `TanggalDaftar`) VALUES
('Admin', 'Admin SPK AHP', '1q2w3e4raz', '2022-06-16 08:54:34'),
('Harry', 'Harry Witriyono', '1qaz2ws', '2022-06-16 12:19:13'),
('Harry Witriyono', 'Harry Witriyono', '1qaz2wsx3edc', '2022-06-16 14:35:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`KodeAlternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`KodeKriteria`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`NamaPengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `KodeAlternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `KodeKriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
