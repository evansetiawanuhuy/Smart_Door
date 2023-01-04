-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 12:22 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartdoorlock`
--

-- --------------------------------------------------------

--
-- Table structure for table `accepted`
--

CREATE TABLE `accepted` (
  `idacc` int(11) NOT NULL,
  `uid` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `namaruangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accepted`
--

INSERT INTO `accepted` (`idacc`, `uid`, `username`, `status`, `tanggal`, `namaruangan`) VALUES
(26, '19529173148', 'FIRMAN', 1, '2022-12-09 01:03:38', 'Ruangan Belajar'),
(27, '19529173148', 'FIRMAN', 1, '2022-12-09 01:03:47', 'Ruangan Belajar'),
(28, '19529173148', 'FIRMAN', 1, '2022-12-09 01:04:04', 'Ruangan Belajar'),
(29, '19529173148', 'FIRMAN', 1, '2022-12-09 01:56:34', 'Ruangan Belajar'),
(30, '19529173148', 'FIRMAN', 1, '2022-12-09 02:15:59', 'Ruangan Belajar');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomorhp` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `name`, `email`, `nomorhp`, `password`) VALUES
(1, 'Lola', 'admin@gmail.com', '081023987', '12345'),
(3, 'Rahma', 'admin2@gmail.com', '0891230432', '12345'),
(4, 'evan', 'adminevan@gmail.com', '08293839', '12345'),
(5, 'joko', 'joko@admin12.com', '082269602046', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `idd` int(11) NOT NULL,
  `namaruangan` varchar(25) NOT NULL,
  `namaperangkat` varchar(25) NOT NULL,
  `tipe` varchar(25) NOT NULL,
  `keypad_pass` int(25) NOT NULL,
  `durasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`idd`, `namaruangan`, `namaperangkat`, `tipe`, `keypad_pass`, `durasi`) VALUES
(11, 'Ruang Belajar', 'Wemos D1 R1', 'ESP 8266', 123, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `rejected`
--

CREATE TABLE `rejected` (
  `idrejec` int(11) NOT NULL,
  `uid` varchar(25) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `namaruangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rejected`
--

INSERT INTO `rejected` (`idrejec`, `uid`, `tanggal`, `namaruangan`) VALUES
(9, '163212130148', '2022-12-09 02:47:05', 'Ruang Tidur');

-- --------------------------------------------------------

--
-- Table structure for table `temporary`
--

CREATE TABLE `temporary` (
  `idtemp` int(11) NOT NULL,
  `uid` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temporary`
--

INSERT INTO `temporary` (`idtemp`, `uid`) VALUES
(2609, '19529173148');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `uid` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `uid`, `username`) VALUES
(8, '19529173148', 'FIRMAN'),
(9, '19529173148', 'cgfgh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted`
--
ALTER TABLE `accepted`
  ADD PRIMARY KEY (`idacc`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`idd`);

--
-- Indexes for table `rejected`
--
ALTER TABLE `rejected`
  ADD PRIMARY KEY (`idrejec`);

--
-- Indexes for table `temporary`
--
ALTER TABLE `temporary`
  ADD PRIMARY KEY (`idtemp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accepted`
--
ALTER TABLE `accepted`
  MODIFY `idacc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rejected`
--
ALTER TABLE `rejected`
  MODIFY `idrejec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `temporary`
--
ALTER TABLE `temporary`
  MODIFY `idtemp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2610;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
