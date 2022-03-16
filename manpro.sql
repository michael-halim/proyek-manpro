-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2022 at 02:33 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `alkitab`
--

CREATE TABLE `alkitab` (
  `id` int(11) NOT NULL,
  `ayat` int(11) NOT NULL,
  `renungan` int(11) NOT NULL,
  `tanggal_dikasih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_event`
--

CREATE TABLE `detail_event` (
  `id` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `absen` tinyint(1) NOT NULL,
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_group`
--

CREATE TABLE `detail_group` (
  `id` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_alkitab` int(11) NOT NULL,
  `sudah_baca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `tempat` varchar(30) NOT NULL,
  `link` varchar(50) NOT NULL,
  `tanggal_dibuat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `group_alkitab`
--

CREATE TABLE `group_alkitab` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `salt` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `lahir` date NOT NULL,
  `ketua` tinyint(1) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `salt`, `password`, `nama`, `hp`, `lahir`, `ketua`, `last_login`) VALUES
(1, 'admin@gmail.com', '1b481dad44c9d3d68db4f5b0070d583129fc4e71a73cd2eeb22a0cd9e3469cab46a2bc433b0c9d738b0fdf01244572ac41ffac9e6e93358bab0679b3d5a05236', '33fb077e32c86109ec21c64fe66ba84c06c38fc33aaf0cacb5d3267d26056c02dd3c43f1ae707e8fb5fbd22437f0028b4aed4a4d157670803b9a9006addca9d7', 'Admin Super', '0', '2022-03-14', 0, '2022-03-15 00:00:00'),
(2, 'michael@gmail.com', '759e11c61948ef41fb5c6575d3735eaac5898336c8320db67982ea6adc21c873d8cf9310f24035f73aacb70fe2db222460481cb3fa2cff102a58a09a91b234a5', 'fc7278e2743e4674b5e1e85dad5662d1d9231f83f9ec660fce53654be22973af2fc018dcb729ec03452e5d23744a0944879daceb130644daac3d89aa1f15e57a', 'Michael', '0021398712', '2022-03-17', 0, '2022-03-14 14:31:13'),
(3, 'user2@gmail.com', '7dcc4420d36808f1c676c72500d3fa83d72b9530841bdf5574058359a72a80759ff76289bc46e7aa4d8c357a8b060bebe4cf0ce5f05ef071eab2f1cf825efdd8', '0f65927b57cdbd6938801387643889148955bc87d8bd45e2d78c706a2634573247047cd186fb62761fcf494c6d5b5c4386cba94eea06375f6acdce6706153900', 'user2', '0021398712', '2022-01-10', 0, '2022-03-14 15:19:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alkitab`
--
ALTER TABLE `alkitab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_event`
--
ALTER TABLE `detail_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_alkitab`
--
ALTER TABLE `group_alkitab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alkitab`
--
ALTER TABLE `alkitab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_event`
--
ALTER TABLE `detail_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_alkitab`
--
ALTER TABLE `group_alkitab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
